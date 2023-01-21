<?php

namespace Modules\CrudGenerator\Commands\Publish;

use Exception;
use Illuminate\Support\Facades\App;
use Modules\CrudGenerator\Utils\FileUtil;
use Symfony\Component\Console\Input\InputOption;

class GeneratorPublishCommand extends PublishBaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes & init api routes, base controller, base test cases traits.';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->publishTestCases();
        $this->publishBaseController();
        $repositoryPattern = config('crudgenerator.options.repository_pattern', true);
        if ($repositoryPattern) {
            $this->publishBaseRepository();
        }
        if ($this->option('localized')) {
            $this->publishLocaleFiles();
        }
    }

    /**
     * Replaces dynamic variables of template.
     *
     * @param string $templateData`
     *
     * @return string
     */
    public function fillTemplate($templateData)
    {
        $apiVersion = config('crudgenerator.api_version', 'v1');
        $apiPrefix = config('crudgenerator.api_prefix', 'api');

        $templateData = str_replace('$API_VERSION$', $apiVersion, $templateData);
        $templateData = str_replace('$API_PREFIX$', $apiPrefix, $templateData);
        $appNamespace =\method_exists($this,"getLaravel") && $this->getLaravel() ? $this->getLaravel()->getNamespace():"App";
        $appNamespace = substr($appNamespace, 0, strlen($appNamespace) - 1);
        $templateData = str_replace('$NAMESPACE_APP$', $appNamespace, $templateData);

        return $templateData;
    }

    public function publishTestCases()
    {
        $testsPath = config('crudgenerator.path.tests', base_path('tests/'));
        $testsNameSpace = config('crudgenerator.namespace.tests', 'Tests');
        $createdAtField = config('crudgenerator.timestamps.created_at', 'created_at');
        $updatedAtField = config('crudgenerator.timestamps.updated_at', 'updated_at');

        $templateData = get_template('test.api_test_trait', 'CrudGenerator');

        $templateData = str_replace('$NAMESPACE_TESTS$', $testsNameSpace, $templateData);
        $templateData = str_replace('$TIMESTAMPS$', "['$createdAtField', '$updatedAtField']", $templateData);

        $fileName = 'ApiTestTrait.php';

        // try{
        //     if (file_exists($testsPath.$fileName)) {
        //         return;
        //     }
        // }catch(Exception $e){

        // }

        FileUtil::createFile($testsPath, $fileName, $templateData);
        $this->info('ApiTestTrait created');

        $testAPIsPath = config('crudgenerator.path.api_test', base_path('tests/APIs/'));
        if (!file_exists($testAPIsPath)) {
            FileUtil::createDirectoryIfNotExist($testAPIsPath);
            $this->info('APIs Tests directory created');
        }

        $testRepositoriesPath = config('crudgenerator.path.repository_test', base_path('tests/Repositories/'));
        if (!file_exists($testRepositoriesPath)) {
            FileUtil::createDirectoryIfNotExist($testRepositoriesPath);
            $this->info('Repositories Tests directory created');
        }
    }

    public function publishBaseController()
    {
        try{
            $templateData = get_template('app_base_controller', 'CrudGenerator');

            $templateData = $this->fillTemplate($templateData);

            $controllerPath = app_path('Http/Controllers/');

            $fileName = 'AppBaseController.php';

            // if (file_exists($controllerPath.$fileName) ) {
            //     return;
            // }
            FileUtil::createFile($controllerPath, $fileName, $templateData);
            // $this->info('AppBaseController created');
        }catch(Exception $e){

        }


    }

    public function publishBaseRepository()
    {
        $templateData = get_template('base_repository', 'CrudGenerator');

        $templateData = $this->fillTemplate($templateData);

        $repositoryPath = app_path('Repositories/');

        FileUtil::createDirectoryIfNotExist($repositoryPath);

        $fileName = 'BaseRepository.php';

        // try{
        //     // && !$this->confirmOverwrite($fileName)
        //     if (file_exists($repositoryPath.$fileName) ) {
        //         return;
        //     }
        // }catch(Exception $e){

        // }

        FileUtil::createFile($repositoryPath, $fileName, $templateData);

        // $this->info('BaseRepository created');
    }

    public function publishLocaleFiles()
    {
        $localesDir = __DIR__.'/../../../locale/';

        $this->publishDirectory($localesDir, resource_path('lang'), 'lang', true);

        $this->comment('Locale files published');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['localized', null, InputOption::VALUE_NONE, 'Localize files.'],
        ];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}

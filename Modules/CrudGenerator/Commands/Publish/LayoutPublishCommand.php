<?php

namespace Modules\CrudGenerator\Commands\Publish;

use Illuminate\Support\Str;
use Modules\CrudGenerator\Utils\FileUtil;
use Symfony\Component\Console\Input\InputOption;

class LayoutPublishCommand extends PublishBaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom.publish:layout';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publishes auth files';

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->copyView();
        $this->updateRoutes();
        $this->publishHomeController();
    }

    private function copyView()
    {
        $viewsPath = config('crudgenerator.path.views', resource_path('views/'));
        $templateType = config('crudgenerator.templates', 'adminlte-templates');

        $this->createDirectories($viewsPath);

        if ($this->option('localized')) {
            $files = $this->getLocaleViews();
        } else {
            $files = $this->getViews();
        }

        foreach ($files as $stub => $blade) {
            $sourceFile = get_template_file_path('scaffold/'.$stub, $templateType);
            $destinationFile = $viewsPath.$blade;
            $this->publishFile($sourceFile, $destinationFile, $blade);
        }
    }

    private function createDirectories($viewsPath)
    {
        FileUtil::createDirectoryIfNotExist($viewsPath.'layouts');
        FileUtil::createDirectoryIfNotExist($viewsPath.'auth');

        FileUtil::createDirectoryIfNotExist($viewsPath.'auth/passwords');
        FileUtil::createDirectoryIfNotExist($viewsPath.'auth/emails');
    }

    private function getViews()
    {
        $views = [
            'layouts/app'               => 'layouts/app.blade.php',
            'layouts/sidebar'           => 'layouts/sidebar.blade.php',
            'layouts/datatables_css'    => 'layouts/datatables_css.blade.php',
            'layouts/datatables_js'     => 'layouts/datatables_js.blade.php',
            'layouts/menu'              => 'layouts/menu.blade.php',
            'layouts/home'              => 'home.blade.php',
            'auth/login'                => 'auth/login.blade.php',
            'auth/register'             => 'auth/register.blade.php',
            'auth/email'                => 'auth/passwords/email.blade.php',
            'auth/reset'                => 'auth/passwords/reset.blade.php',
            'emails/password'           => 'auth/emails/password.blade.php',
        ];

        $version = $this->getApplication()->getVersion();
        if (Str::contains($version, '6.')) {
            $verifyView = [
                'auth/verify_6' => 'auth/verify.blade.php',
            ];
        } else {
            $verifyView = [
                'auth/verify' => 'auth/verify.blade.php',
            ];
        }

        $views = array_merge($views, $verifyView);

        return $views;
    }

    private function getLocaleViews()
    {
        return [
            'layouts/app_locale'        => 'layouts/app.blade.php',
            'layouts/sidebar_locale'    => 'layouts/sidebar.blade.php',
            'layouts/datatables_css'    => 'layouts/datatables_css.blade.php',
            'layouts/datatables_js'     => 'layouts/datatables_js.blade.php',
            'layouts/menu'              => 'layouts/menu.blade.php',
            'layouts/home'              => 'home.blade.php',
            'auth/login_locale'         => 'auth/login.blade.php',
            'auth/register_locale'      => 'auth/register.blade.php',
            'auth/email_locale'         => 'auth/passwords/email.blade.php',
            'auth/reset_locale'         => 'auth/passwords/reset.blade.php',
            'emails/password_locale'    => 'auth/emails/password.blade.php',
        ];
    }

    private function updateRoutes()
    {
        $path = config('crudgenerator.path.routes', base_path('routes/web.php'));

        $prompt = 'Existing routes web.php file detected. Should we add standard auth routes? (y|N) :';
        if (file_exists($path) && !$this->confirmOverwrite($path, $prompt)) {
            return;
        }

        $routeContents = file_get_contents($path);

        $routesTemplate = get_template('routes.auth', 'CrudGenerator');

        $routeContents .= "\n\n".$routesTemplate;

        file_put_contents($path, $routeContents);
        $this->comment("\nRoutes added");
    }

    private function publishHomeController()
    {
        $templateData = get_template('home_controller', 'CrudGenerator');

        $templateData = $this->fillTemplate($templateData);

        $controllerPath = config('crudgenerator.path.controller', app_path('Http/Controllers/'));

        $fileName = 'HomeController.php';

        if (file_exists($controllerPath.$fileName) && !$this->confirmOverwrite($fileName)) {
            return;
        }

        FileUtil::createFile($controllerPath, $fileName, $templateData);

        $this->info('HomeController created');
    }

    /**
     * Replaces dynamic variables of template.
     *
     * @param string $templateData
     *
     * @return string
     */
    private function fillTemplate($templateData)
    {
        $templateData = str_replace(
            '$NAMESPACE_CONTROLLER$',
            config('crudgenerator.namespace.controller'),
            $templateData
        );

        $templateData = str_replace(
            '$NAMESPACE_REQUEST$',
            config('crudgenerator.namespace.request'),
            $templateData
        );

        return $templateData;
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

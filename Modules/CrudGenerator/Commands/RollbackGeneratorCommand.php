<?php

namespace Modules\CrudGenerator\Commands;

use Illuminate\Console\Command;
use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Generators\API\APIControllerGenerator;
use Modules\CrudGenerator\Generators\API\APIRequestGenerator;
use Modules\CrudGenerator\Generators\API\APIRoutesGenerator;
use Modules\CrudGenerator\Generators\API\APITestGenerator;
use Modules\CrudGenerator\Generators\FactoryGenerator;
use Modules\CrudGenerator\Generators\MigrationGenerator;
use Modules\CrudGenerator\Generators\ModelGenerator;
use Modules\CrudGenerator\Generators\RepositoryGenerator;
use Modules\CrudGenerator\Generators\RepositoryTestGenerator;
use Modules\CrudGenerator\Generators\Scaffold\ControllerGenerator;
use Modules\CrudGenerator\Generators\Scaffold\MenuGenerator;
use Modules\CrudGenerator\Generators\Scaffold\RequestGenerator;
use Modules\CrudGenerator\Generators\Scaffold\RoutesGenerator;
use Modules\CrudGenerator\Generators\Scaffold\ViewGenerator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RollbackGeneratorCommand extends Command
{
    /**
     * The command Data.
     *
     * @var CommandData
     */
    public $commandData;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom:rollback';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback a full CRUD API and Scaffold for given model';

    /**
     * @var Composer
     */
    public $composer;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->composer = app()['composer'];
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        if (!in_array($this->argument('type'), [
            CommandData::$COMMAND_TYPE_API,
            CommandData::$COMMAND_TYPE_SCAFFOLD,
            CommandData::$COMMAND_TYPE_API_SCAFFOLD,
        ])) {
            $this->error('invalid rollback type');
        }

        $this->commandData = new CommandData($this, $this->argument('type'));
        $this->commandData->config->mName = $this->commandData->modelName = $this->argument('model');

        $this->commandData->config->init($this->commandData, ['tableName', 'prefix', 'plural', 'views']);

        $views = $this->commandData->getOption('views');
        if (!empty($views)) {
            $views = explode(',', $views);
            $viewGenerator = new ViewGenerator($this->commandData);
            $viewGenerator->rollback($views);

            $this->info('Generating autoload files');
            $this->composer->dumpOptimized();

            return;
        }

        $migrationGenerator = new MigrationGenerator($this->commandData);
        $migrationGenerator->rollback();

        $modelGenerator = new ModelGenerator($this->commandData);
        $modelGenerator->rollback();

        $repositoryGenerator = new RepositoryGenerator($this->commandData);
        $repositoryGenerator->rollback();

        $requestGenerator = new APIRequestGenerator($this->commandData);
        $requestGenerator->rollback();

        $controllerGenerator = new APIControllerGenerator($this->commandData);
        $controllerGenerator->rollback();

        $routesGenerator = new APIRoutesGenerator($this->commandData);
        $routesGenerator->rollback();

        $requestGenerator = new RequestGenerator($this->commandData);
        $requestGenerator->rollback();

        $controllerGenerator = new ControllerGenerator($this->commandData);
        $controllerGenerator->rollback();

        $viewGenerator = new ViewGenerator($this->commandData);
        $viewGenerator->rollback();

        $routeGenerator = new RoutesGenerator($this->commandData);
        $routeGenerator->rollback();

        if ($this->commandData->getAddOn('tests')) {
            $repositoryTestGenerator = new RepositoryTestGenerator($this->commandData);
            $repositoryTestGenerator->rollback();

            $apiTestGenerator = new APITestGenerator($this->commandData);
            $apiTestGenerator->rollback();
        }

        $factoryGenerator = new FactoryGenerator($this->commandData);
        $factoryGenerator->rollback();

        // if ($this->commandData->config->getAddOn('menu.enabled')) {
        //     $menuGenerator = new MenuGenerator($this->commandData);
        //     $menuGenerator->rollback();
        // }

        $this->info('Generating autoload files');
        $this->composer->dumpOptimized();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return [
            ['tableName', null, InputOption::VALUE_REQUIRED, 'Table Name'],
            ['prefix', null, InputOption::VALUE_REQUIRED, 'Prefix for all files'],
            ['plural', null, InputOption::VALUE_REQUIRED, 'Plural Model name'],
            ['views', null, InputOption::VALUE_REQUIRED, 'Views to rollback'],
        ];
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'Singular Model name'],
            ['type', InputArgument::REQUIRED, 'Rollback type: (api / scaffold / api_scaffold)'],
        ];
    }
}

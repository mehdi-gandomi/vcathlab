<?php

namespace Modules\CrudGenerator\Commands\Common;

use Modules\CrudGenerator\Commands\BaseCommand;
use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Generators\AlterMigrationGenerator;
use Modules\CrudGenerator\Generators\MigrationGenerator;
use Symfony\Component\Console\Input\InputOption;
class MigrationGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom:migration';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migration command';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->commandData = new CommandData($this, CommandData::$COMMAND_TYPE_API);
    }



    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();

        if ($this->commandData->getOption('fromTable')) {
            $this->error('fromTable option is not allowed to use with migration generator');

            return;
        }

        if($this->option("alter")){
            $migrationGenerator = new AlterMigrationGenerator($this->commandData);
        }else{
            $migrationGenerator = new MigrationGenerator($this->commandData);
        }
        $migrationGenerator->generate();

        $this->performPostActionsWithMigration();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['alter', null, InputOption::VALUE_NONE, 'Create Alter Migration'],
            ['extend-model', null, InputOption::VALUE_OPTIONAL, 'Model Extend Class'],
        ]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(), []);
    }
}

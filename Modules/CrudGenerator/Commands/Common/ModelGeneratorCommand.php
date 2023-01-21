<?php

namespace Modules\CrudGenerator\Commands\Common;

use Modules\CrudGenerator\Commands\BaseCommand;
use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Generators\ModelGenerator;
use Symfony\Component\Console\Input\InputOption;

class ModelGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create model command';

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

        $modelGenerator = new ModelGenerator($this->commandData);
        $modelGenerator->generate();

        $this->performPostActions();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    public function getOptions()
    {
        return array_merge(parent::getOptions(), [
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

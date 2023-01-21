<?php

namespace Modules\CrudGenerator\Commands\API;

use Modules\CrudGenerator\Commands\BaseCommand;
use Modules\CrudGenerator\Common\CommandData;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
class APIGeneratorCommand extends BaseCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'infyom:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a full CRUD API for given model';

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
        // dd($this->commandData);
        $this->commandData->dynamicVars['$PASSWORD_TRAIT_IMPORT$']=";";
        $this->commandData->dynamicVars['$PASSWORD_TRAIT$']="";
        if($this->option("authenticatable")){
            $this->commandData->dynamicVars['$SANCTOM_TRAIT_IMPORT$']="use Laravel\Sanctum\HasApiTokens;";
            $this->commandData->dynamicVars['$SANCTUM_TRAIT$']="use HasApiTokens;";
            $this->commandData->dynamicVars['$NAMESPACE_MODEL_EXTEND$']='Illuminate\Foundation\Auth\User';
        }else{
            $this->commandData->dynamicVars['$SANCTOM_TRAIT_IMPORT$']="";
            $this->commandData->dynamicVars['$SANCTUM_TRAIT$']="";
            $this->commandData->dynamicVars['$NAMESPACE_MODEL_EXTEND$']='Illuminate\Database\Eloquent\Model';
        }
        $this->commandData->dynamicVars['$TITLE_FIELD$']="id";
        if($this->option("title-field")){
            $this->commandData->dynamicVars['$TITLE_FIELD$']=$this->option("title-field");
        }
        if($this->argument("extend-model")){
            $extendModel=$this->argument("extend-model");
            if($extendModel != config("crudgenerator.model_extend_class")){
                $this->commandData->dynamicVars['$NAMESPACE_MODEL_EXTEND$']=$extendModel;
            }

        }
        $this->generateCommonItems();

        $this->generateAPIItems();

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
            ['authenticatable', null, InputOption::VALUE_NONE, 'Is model authenticatable?'],
            ['no-timestamp', null, InputOption::VALUE_NONE, 'no timestamp for model'],
            ['extend-model', null, InputOption::VALUE_OPTIONAL, 'Model Extend Class'],
            ['module', null, InputOption::VALUE_OPTIONAL, 'Module'],
            ['title-field', null, InputOption::VALUE_OPTIONAL, 'Model Title Field'],
            ['filter', null, InputArgument::OPTIONAL, 'Generate Filter'],
        ]);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array_merge(parent::getArguments(),[
            ['extend-model', null, InputArgument::OPTIONAL, 'Model Extend Class'],
            ['menuId', null, InputArgument::OPTIONAL, 'Menu Id']
        ]);
    }

}

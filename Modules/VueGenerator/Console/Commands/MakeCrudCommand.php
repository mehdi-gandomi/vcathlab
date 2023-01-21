<?php

namespace Modules\VueGenerator\Console\Commands;

use Exception;
use Illuminate\Filesystem\Filesystem;
use DB;

class MakeCrudCommand extends VueGeneratorsCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'iracode:vuecrud {model} {--base-api-route= : base path for api crud oprations} {--base-route-path= : base path for vue path} {--base-model-namespace= : base namespace for model} {--module= : module name} {--filter= : Generate filters} {--createView= : Create View} {--updateView= : Update View} {--indexView= : Index View} {--detailView= : Details View} {--noBaseNamespace= : No base namespace} {--menuId= : Menu id for accesslevel}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Vue crud js component file.';

    protected $infyomGeneratorService;
    /**
     * Execute the console command.
     */


    public function handle()
    {
        $modelName=$this->argument('model');
        // dd($modelName,$this->option("base-model-namespace"));
        if($this->option("noBaseNamespace")){
            $fullNamespace=$modelName;
        }else{
            $modelBaseNamespace=$this->option("base-model-namespace") ? $this->option("base-model-namespace"):config("vuegenerator.model_namespace");
            $fullNamespace=$modelBaseNamespace."\\".$modelName;
        }
        if(!class_exists($fullNamespace)) throw new Exception("model does not exist");
        $model=new $fullNamespace();
        $generator=new \Modules\VueGenerator\Entities\Services\CrudGenerator($model,$this->option("base-api-route"),$this->option("module"),$this->option("base-route-path"),$this->options());
        $generator->generate($this->option("filter"));
        $this->info("{$modelName} CRUD created succesfully.");
    }

    /**
     * Get and return stub.
     *
     * @param Filesystem $filesystem
     *
     * @return string
     */
    protected function getStub(Filesystem $filesystem)
    {
        $fileName = $this->option('empty') ? 'EmptyComponent' : 'Component';

        return $filesystem->get(__DIR__.'/../Stubs/'.$fileName.'.vue');
    }
}

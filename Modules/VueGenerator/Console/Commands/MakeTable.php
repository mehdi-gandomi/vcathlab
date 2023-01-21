<?php

namespace Modules\VueGenerator\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
class MakeTable extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'vuegenerator:make-table {model} {--base-api-route= : base path for api crud oprations} {--base-route-path= : base path for vue path} {--base-model-namespace= : base namespace for model} {--module= : module name} {--noBaseNamespace= : No base namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modelName=$this->argument('model');
        // dd($modelName,$this->option("base-model-namespace"));
        $fullNamespace="Modules\\".$this->option("module")."\\Models\\".$modelName;
        if(!class_exists($fullNamespace)) throw new Exception("model does not exist");
        $model=new $fullNamespace();
        $module = $this->option("module");
        $infyomGeneratorService = app()->make('\Modules\GeneratorBuilder\Services\GeneratorService');
        $fillable = $model->getFillable();
        // $columns=array_filter($fillable,function())
        $columns = $infyomGeneratorService->getTableColumns($model->getTable(), null, $fillable);
        $modelTitle = basename(get_class($model));
        $baseRoutePath= \Str::snake(\Str::plural($modelTitle));
        $baseApiPath = $this->option("base-api-route") ? $this->option("base-api-route"):$model::$api_route;

        // ,$this->option("module"),$this->option("base-route-path"),$this->options()
        $html = view("vuegenerator::templates.table",
         [
         'columns' => $columns,
         'baseRoutePath' => $baseRoutePath,'modelPlural'=>$baseRoutePath,
         'baseApiPath' => $baseApiPath,
         'model' => $model,
         'title'=>\Str::title(str_replace("_","",$baseRoutePath)),
         'module'=>$module
         ])->render();
        //create vuejs files path for crud
        if($this->option("module")){
            $basePath = module_path($this->option("module"),"Resources/js");
        }else{
            $basePath=resource_path("js");
        }

        $basePath = $basePath."/tables";
        if (!File::exists($basePath)) {
            File::makeDirectory($basePath, 0777, true, true);
        }
        $viewPath = $basePath."/".\Str::title($baseRoutePath).".vue";

        file_put_contents($viewPath,$html);
        $prettifyCommand="npx prettier --write ".$viewPath;
        shell_exec($prettifyCommand);
    }

}

<?php

namespace Modules\CrudGenerator\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MakeFilter extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a filter';

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
        $template=file_get_contents(module_path("CrudGenerator","Stubs/filters/".$this->option("type").".stub"));
        $filtersPath=$this->option("module") ? module_path($this->option("module"),"Filters"):config("filter.path");
        $filtersNs=$this->option("module") ? "Modules\\".$this->option("module")."\\Filters":config("filter.namespace");
        if($this->option("model")){
            $filtersPath.="/".$this->option("model");
            $filtersNs.="\\".$this->option("model");
        }
        if($this->option("is_common")){
            $filtersPath.="/Common";
            $filtersNs.="\\Common";
        }
        if(!File::exists($filtersPath)) File::makeDirectory($filtersPath,0755,true);
        $values=$this->option("values") ? json_decode($this->option("values"),true):[];
        $template=str_replace('$CLASS_NAME$',$this->argument("name"),$template);
        $template=str_replace('$NAMESPACE$',$filtersNs,$template);
        $template=str_replace('$VALUES$',$this->generateValues($values),$template);
        file_put_contents($filtersPath."/".$this->argument("name").".php",$template);
        $this->info("filter created successfully in ".$filtersPath." path");
    }
    public function generateValues($values){
        $fields=[];
        if(count($values) < 1) return "[]";
        if($this->option("type") == "set"){
            foreach($values as $key=>$value){
                $fields[]= "'{$value}'";
            }
            if(count($fields) < 1) return "[]";
            return "[\n'".implode("','".infy_nl_tab(1, 2), $fields)."'\n]";

        }else{
            foreach($values as $key=>$value){
                $fields[]= "[
                    'value'=>'{$key}',
                    'label'=>'{$value}'
                ]";
            }
            if(count($fields) < 1) return "[]";
            return "[\n".implode(','.infy_nl_tab(1, 2), $fields)."\n]";

        }



    }
    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'name of the filter class'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['column', null, InputOption::VALUE_OPTIONAL, 'name of the column', null],
            ['module', null, InputOption::VALUE_OPTIONAL, 'name of the module', null],
            ['model', null, InputOption::VALUE_OPTIONAL, 'model', null],
            ['type', null, InputOption::VALUE_REQUIRED, 'filter type', null],
            ['is_common', null, InputOption::VALUE_NONE, 'is filter common', null],
            ['values', null, InputOption::VALUE_OPTIONAL, 'values', null],
        ];
    }
}

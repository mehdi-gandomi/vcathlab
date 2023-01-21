<?php

namespace Modules\GeneratorBuilder\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Modules\GeneratorBuilder\Http\Requests\BuilderGenerateRequest;
use Request;
use Response;
use DB;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Container\Container;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Schema;
use Modules\GeneratorBuilder\Services\GeneratorService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Modules\AccessLevel\Models\Base\Menu;
use Modules\Panel\Iracode;
use Nwidart\Modules\Facades\Module;

class GeneratorBuilderController extends Controller
{
    protected $generator;
    protected $composer;
    public function __construct(GeneratorService $generator,Composer $composer)
    {
        $this->generator=$generator;
        $this->composer=$composer;
        Config::set("database.default","mysql");
    }
    public function getModels()
    {
        $models = collect(File::allFiles(app_path("Models")))
        ->map(function ($item) {
            $path = $item->getRelativePathName();
            $class = sprintf('\App\Models\%s',
                strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));
            return [
                'namespace'=>$class,
                'name'=>\basename($class)
            ];
        })
        ->filter(function ($class) {
            $valid = false;

            if (class_exists($class['namespace'])) {
                $reflection = new \ReflectionClass($class['namespace']);
                $valid = $reflection->isSubclassOf(Model::class) &&
                    !$reflection->isAbstract();
            }

            return $valid;
        });
        return $models->toArray();
    }
    public function getEnums()
    {
        $enums=[];
        foreach(Module::all() as $moduleName=>$module){
            $enumsPath=module_path($moduleName,"Enums");
            if(File::exists($enumsPath)){
                foreach(File::allFiles($enumsPath) as $item){
                    $path = $item->getRelativePathName();
                    $class = sprintf('\Modules\%s\Enums\%s',$module->getName(),strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                    if (class_exists($class)) {
                        $reflection = new \ReflectionClass($class);
                        if($reflection->isSubclassOf(\BenSampo\Enum\Enum::class) && !$reflection->isAbstract()){
                            array_push($enums,[
                                'namespace'=>$class,
                                'name'=>basename($class)
                            ]);
                        }
                    }
                }
            }
        }
        return $enums;
    }
    public function getModuleModels()
    {
        $models=[];
        foreach(Module::all() as $moduleName=>$module){
            $modelsPath=module_path($moduleName,"Models");
            if(File::exists($modelsPath)){
                foreach(File::allFiles($modelsPath) as $item){
                    $path = $item->getRelativePathName();
                    $class = sprintf('\Modules\%s\Models\%s',$module->getName(),strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));

                    if (class_exists($class)) {
                        $reflection = new \ReflectionClass($class);
                        if($reflection->isSubclassOf(Model::class) && !$reflection->isAbstract()){
                            array_push($models,[
                                'namespace'=>$class,
                                'name'=>basename($class)
                            ]);
                        }
                    }
                }
            }
        }
        return $models;
    }
    public function builder()
    {
        Config::set("app.locale","fa");
        $currentTables=$this->generator->getDatabaseTables();
        $enums=$this->getEnums();
        // if(Module::exists())
        $Menus=[];
        if(Module::isActive("AccessLevel")){
            $_Menus = collect(\Modules\AccessLevel\Models\Base\Menu::whereNull('menu_id')->get())->sortBy('ordering');
			foreach ($_Menus as $_Menu) {

				$Menu = [
					'label' => $_Menu->title,
					'id' => $_Menu->id
				];
				if ($_Menu->children) {
					$IMenus = [];
					foreach ($_Menu->children as $_IMenu) {
						$_menu_id = $_IMenu->id;

						$IMenu = [
							'label' => $_IMenu->title,
							'id' => $_IMenu->id
						];

						$IMenus[] = $IMenu;
					}
					if (count($IMenus)) {
						usort($IMenus, function ($item1, $item2) {
							if ($item1['ordering'] == $item2['ordering']) return 0;
							return ($item1['ordering'] < $item2['ordering']) ? -1 : 1;
						});
						$Menu['children'] = $IMenus;
					}
				}
				$Menus[] = $Menu;
				// $_counter++;
            }
            usort($Menus, function ($a, $b){
                return (int)!array_key_exists('children', $a);
             });
            // $menus=\Modules\AccessLevel\Models\Base\Menu::all();
            $showMenus=true;
        }else{
            $showMenus=false;
        }
        // $models=$this->getModels();
        // $models=$models->merge($this->getModels());
        return view(config('generatorbuilder.views.builder'),compact("currentTables","Menus","showMenus","enums"));
    }
    public function getEnumValues()
    {
        $class=request()->get("namespace");
        abort_unless(class_exists($class),404);
        $options=$class::asSelectArray();
        return response()->json([
            'ok'=>true,
            'data'=>$options
        ]);
    }
    public function fieldTemplate()
    {
        return view(config('generatorbuilder.views.field-template'));
    }

    public function relationFieldTemplate()
    {
        // dd(request()->all());
        return view(config('generatorbuilder.views.relation-field-template'));
    }
    public function getOldAlterMigration($tablename)
    {
        $fileName = 'alter_'.$tablename.'_table.php';
        $path=config('crudgenerator.path.migration', database_path('migrations/'));
        /** @var SplFileInfo $allFiles */
        $allFiles = File::allFiles($path);

        $files = [];

        foreach ($allFiles as $file) {
            $files[] = $file->getFilename();
        }

        $files = array_reverse($files);

        foreach ($files as $file) {
            if (Str::contains($file, $fileName)) {
                return "database/migrations/".$file;
                break;
            }
        }
    }
    public function getModulePathFromNamespace($namespace)
    {
        return str_replace("\\","/",config("modules.paths.modules")."/".$namespace)."/";
        // return preg_replace('"/\\/"',"/",config("modules.paths.modules")."/".$namespace);
    }
    public function generate(BuilderGenerateRequest $request)
    {
        $data = $request->all();
        if(isset($data['menuId'])){
            $menu=Menu::find($data['menuId']);
            $modelPlural=\Str::snake(\Str::plural($data['modelName']));
            $module=strtolower($data['moduleOptions']['name']);
            $route="/".$module."/".$modelPlural;
            $menu->route=$route;
            $menu->save();
        }
        // if($data['menuId'] && Module::isActive("AccessLevel")){
        //     \Modules\AccessLevel\Models\Base\Menu::make([
        //         'title' => \Str::title(\Str::plural($data['modelName'])),
        //         'icon_class' => 'fa',
        //         'subsystem_id' => $data['sybsystemId'],
        //         'route' =>"/".strtolower(\Str::plural($data['modelName']))
        //     ]);
        // }

        if(isset($data['moduleOptions']) && $data['moduleOptions']['name']){
            if(!Module::has($data['moduleOptions']['name'])){
                Artisan::call("module:make ".$data['moduleOptions']['name']);
            }
            $modelsPath=$this->getModulePathFromNamespace($data['moduleOptions']['modelNamespace']);
            if(!File::exists($modelsPath)){
                File::makeDirectory($modelsPath);
            }
            $apiRequestsPath=$this->getModulePathFromNamespace($data['moduleOptions']['requestNamespace']);
            if(!File::exists($apiRequestsPath)){
                File::makeDirectory($apiRequestsPath);
            }
            $repositoriesPath=$this->getModulePathFromNamespace($data['moduleOptions']['repositoryNamespace']);
            if(!File::exists($repositoriesPath)){
                File::makeDirectory($repositoriesPath);
            }
            config([
                // 'crudgenerator.namespace.app'=>"Modules\\".$data['moduleOptions']['name'],
                'crudgenerator.path.model'=>$modelsPath,
                'crudgenerator.path.repository'=>$repositoriesPath,
                'crudgenerator.path.api_request'=>$apiRequestsPath,
                'crudgenerator.path.api_controller'=>$this->getModulePathFromNamespace($data['moduleOptions']['controllerNamespace']),
                'crudgenerator.path.migration'=>module_path($data['moduleOptions']['name'],"Database/Migrations")."/",
                'crudgenerator.path.api_routes'=>module_path($data['moduleOptions']['name'],"Routes/api.php"),
                'crudgenerator.path.seeder'=>module_path($data['moduleOptions']['name'],"Database/Seeders")."/",
                'crudgenerator.path.factory'=>module_path($data['moduleOptions']['name'],"Database/factories")."/",
                'crudgenerator.namespace.model'=>config("modules.namespace")."\\".$data['moduleOptions']['modelNamespace'],
                'crudgenerator.namespace.repository'=>config("modules.namespace")."\\".$data['moduleOptions']['repositoryNamespace'],
                'crudgenerator.namespace.api_request'=>config("modules.namespace")."\\".$data['moduleOptions']['requestNamespace'],
                'crudgenerator.namespace.api_controller'=>config("modules.namespace")."\\".$data['moduleOptions']['controllerNamespace']
            ]);
        }
        // Validate fields
        if (isset($data['fields'])) {
            $this->validateFields($data['fields']);

            // prepare foreign key
            // $isAnyForeignKey =  collect($data['fields'])->filter(function ($field) {
            //     return $field['isForeign'] == true;
            // });
            // if (count($isAnyForeignKey)) {
            //     $data['fields'] = $this->prepareForeignKeyData($data['fields']);
            // }
        }

        // prepare relationship
        if (isset($data['fields']) && !empty($data['relations'])) {
            $data = $this->prepareRelationshipData($data);
        }

        if($data['tableType'] == "existing") {
            $cmdParams['--skip']="migration";
            $data['options']['forceMigrate']=false;
            // $newColumns=[];

            //check if selected columns exist in table, if not, create a migration for them
            // foreach($data['fields'] as $field){
            //     if(!Schema::hasColumn($data['tableName'],$field['name'])) {
            //         $newColumns[]=$field;
            //     }
            // }
            // if(count($newColumns)){
            //     //delete and rollbnack old alter migrations
            //     $oldAlterMigration=$this->getOldAlterMigration($data['tableName']);
            //     if ($oldAlterMigration && file_exists(base_path($oldAlterMigration))) {

            //         Artisan::call("migrate:rollback", ['--path'=>$oldAlterMigration]);
            //         gc_collect_cycles();
            //         unlink(base_path($oldAlterMigration));
            //         $this->composer->dumpAutoloads();
            //     }
            //     $data['fields']=$newColumns;
            //     $data['commandType']="infyom:migration";
            //     $data['migrate']=true;
            //     $cmdParams=[
            //         'model'         => $data['modelName'],
            //         '--jsonFromGUI' => json_encode($data),
            //         '--alter'=>true,
            //         '--forceMigrate'=>true,
            //     ];
            //     $res = Artisan::call("infyom:migration", $cmdParams);
            //     Artisan::call("migrate");
            //     // dd($res);
            // }
        }

        $cmdParams=array_merge($cmdParams,[
            'model'         => $data['modelName'],
            'extend-model'=>$data['modelExtendClass'],
            '--jsonFromGUI' => json_encode($data),
            '--module'=>$data['moduleOptions']['name']
            // '--filter'=>$data['options']['generateFilters']
        ]);
        if($data['options']['authenticatable']){
            $cmdParams['--authenticatable']=true;
        }
        if(isset($data['menuId']) && $data['menuId']){
            $cmdParams['menuId']=$data['menuId'];
        }
    if($data['options']['titleField']){
            $cmdParams['--title-field']=$data['options']['titleField'];
        }
        if($data['options']['notTimestamp']){
            $cmdParams['--no-timestamp']=true;
        }

        unset($data['tableType']);
        $res = Artisan::call($data['commandType'], $cmdParams);
        $baseApiPath=(isset($data['moduleOptions']['name']) && $data['moduleOptions']['name']) ? "/".Module::find($data['moduleOptions']['name'])->getLowerName()."/api":"/api";
        if($data['options']['vueCrud']){
            if($data['moduleOptions']['name']){
                $baseModelNamespace="Modules\\".$data['moduleOptions']['name']."\\Models";
            }else{
                $baseModelNamespace="App\\Models";
            }
            $vueParams=[
                'model'=>$data['modelName'],
                '--base-api-route'=>$baseApiPath,
                '--base-model-namespace'  => $baseModelNamespace,
                '--module'=>$data['moduleOptions']['name'],
                '--createView'=>$data['options']['createView'],
                '--updateView'=>$data['options']['updateView'],
                '--indexView'=>$data['options']['indexView'],
                '--detailView'=>$data['options']['detailView']
                // '--filter'=>$data['options']['generateFilters']
            ];
            if(isset($data['menuId'])){
                $vueParams['--menuId']=$data['menuId'];
            }
            Artisan::call("iracode:vuecrud", $vueParams);


        }
        return Response::json(Iracode::t("generatorbuilder.Files created successfully"));
    }

    public function rollback()
    {
        $data = Request::all();
        if(isset($data['module']) && $data['module']){
            config([
                'crudgenerator.path.model'=>module_path($data['module'],"Models")."/",
                'crudgenerator.path.repository'=>module_path($data['module'],"Repositories")."/",
                'crudgenerator.path.api_request'=>module_path($data['module'],"Http/Requests/API")."/",
                'crudgenerator.path.api_controller'=>module_path($data['module'],"Http/Controllers/API")."/",
                'crudgenerator.path.migration'=>module_path($data['module'],"Database/Migrations")."/",
                'crudgenerator.path.api_routes'=>module_path($data['module'],"Routes/api.php"),
                'crudgenerator.path.seeder'=>module_path($data['module'],"Database/Seeders")."/",
                'crudgenerator.path.factory'=>module_path($data['module'],"Database/factories")."/",
                'crudgenerator.namespace.model'=>config("modules.namespace")."\\Models",
                'crudgenerator.namespace.repository'=>config("modules.namespace")."\\Repositories",
                'crudgenerator.namespace.api_request'=>config("modules.namespace")."\\Http\\Requests\\API",
                'crudgenerator.namespace.api_controller'=>config("modules.namespace")."\\Http\\Controllers\\API"
            ]);
        }
        $input = [
            'model' => $data['modelName'],
            'type'  => $data['commandType'],
        ];

        if (!empty($data['prefix'])) {
            $input['--prefix'] = $data['prefix'];
        }

        Artisan::call('infyom:rollback', $input);

        return Response::json(['message' => 'Files rollback successfully'], 200);
    }
    public function generateVueCrud()
    {
        $data = Request::all();
        $input = [
            'model' => $data['model'],
            '--module' => $data['module'],
            '--base-api-route'=>"/".Module::find($data['module'])->getLowerName()."/api",
            '--detailView'=>true,
            '--indexView'=>true,
            '--updateView'=>true,
            '--createView'=>true,
            '--noBaseNamespace'=>true
        ];

        Artisan::call('iracode:vuecrud', $input);

        return Response::json(['message' => 'Crud Files Created successfully'], 200);
    }

    public function generateFromFile()
    {
        $data = Request::all();

        /** @var UploadedFile $file */
        $file = $data['schemaFile'];
        $filePath = $file->getRealPath();
        $extension = $file->getClientOriginalExtension(); // getting file extension
        if ($extension != 'json') {
            throw new \Exception('Schema file must be Json');
        }

        Artisan::call($data['commandType'], [
            'model'        => $data['modelName'],
            '--fieldsFile' => $filePath,
        ]);

        return Response::json(['message' => 'Files created successfully'], 200);
    }

    private function validateFields($fields)
    {
        $fieldsGroupBy = collect($fields)->groupBy(function ($item) {
            return strtolower($item['name']);
        });

        $duplicateFields = $fieldsGroupBy->filter(function (Collection $groups) {
            return $groups->count() > 1;
        });
        if (count($duplicateFields)) {
            throw new \Exception('Duplicate fields are not allowed');
        }

        return true;
    }

    private function prepareRelationshipData($inputData)
    {
        foreach ($inputData['relations'] as $inputRelation) {
            $relationType = $inputRelation['relationType'];
            $relation = $relationType;
            if (isset($inputRelation['foreignModel'])) {
                $relation .= ','.$inputRelation['foreignModel'];
            }
            if ($relationType == 'mtm') {
                if (isset($inputRelation['foreignTable'])) {
                    $relation .= ','.$inputRelation['foreignTable'];
                } else {
                    $relation .= ',';
                }
            }
            if (isset($inputRelation['foreignKey'])) {
                $relation .= ','.$inputRelation['foreignKey'];
            }else{
                if(class_exists($inputRelation['foreignModel'])){
                    $instance=new $inputRelation['foreignModel'];
                    $relation .= ','.(Str::snake($inputRelation['foreignModel']).'_'.$instance->getKeyName());
                }
            }
            if (isset($inputRelation['localKey'])) {
                $relation .= ','.$inputRelation['localKey'];
            }else{
                $relation .= ','."id";
            }
            if (isset($inputRelation['inIndex'])) {
                $relation .= ','.($inputRelation['inIndex'] ? "true":"false");
            }
            if (isset($inputRelation['inForm'])) {
                $relation .= ','.($inputRelation['inForm'] ? "true":"false");
            }
            $inputData['fields'][] = [
                'type'     => 'relation',
                'relation' => $relation,
            ];
        }
        unset($inputData['relations']);

        return $inputData;
    }

    private function prepareForeignKeyData($fields)
    {
        $updatedFields = [];
        foreach ($fields as $field) {
            if ($field['isForeign'] == true) {
                if (empty($field['foreignTable'])) {
                    throw new Exception('Foreign table required');
                }
                $inputs = explode(',', $field['foreignTable']);
                $foreignTableName = array_shift($inputs);
                // prepare dbType
                $dbType = $field['dbType'];
                $dbType .= ':unsigned:foreign';
                $dbType .= ','.$foreignTableName;
                if (!empty($inputs)) {
                    $dbType .= ','.$inputs['0'];
                } else {
                    $dbType .= ',id';
                }
                $field['dbType'] = $dbType;
            }
            $updatedFields[] = $field;
        }

        return $updatedFields;
    }
    public function getTableFields(Request $request)
    {
        $tablename=request()->get("tablename");
        $columns=$this->generator->getTableColumns($tablename);
        return [
            'ok'=>true,
            'columns'=>$columns
        ];
    }
    public function generateCommonFilter()
    {
        Artisan::call("make:filter",[
            'name'=>request()->get("filter_name"),
            '--type'=>request()->get("filter_type"),
            '--module'=>request()->get("module"),
            '--values'=>request()->get("options"),
            '--is_common'=>true
        ]);
        return Response::json(['message' => 'Common filter Created successfully in '.request()->get("module")." module"], 200);
    }
    public function getAllFilters(){
        $filters=[];
        foreach(Module::all() as $moduleName=>$module){
            $filtersPath=module_path($moduleName,"Filters");
            if(File::exists($filtersPath)){
                foreach(File::allFiles($filtersPath) as $item){
                    $path = $item->getRelativePathName();
                    $class = sprintf('\Modules\%s\Filters\%s',$module->getName(),strtr(substr($path, 0, strrpos($path, '.')), '/', '\\'));
                    if (class_exists($class)) {
                        array_push($filters,[
                            'namespace'=>$class,
                            'name'=>basename($class)
                        ]);
                    }
                }
            }
        }
        return $filters;
    }
//    public function availableSchema()
//    {
//        $schemaFolder = config('crudgenerator.path.schema_files', base_path('resources/model_schemas/'));
//
//        if (!File::exists($schemaFolder)) {
//            return [];
//        }
//
//        $files = File::allFiles($schemaFolder);
//
//        $modelNames = [];
//
//        foreach ($files as $file) {
//            if(File::extension($file) == "json") {
//                $modelNames[] = File::name($file);
//            }
//        }
//
//        return Response::json($modelNames);
//    }
//
//    public function retrieveSchema($schema)
//    {
//        $schemaFolder = config('crudgenerator.path.schema_files', base_path('resources/model_schemas/'));
//
//        $filePath = $schemaFolder . $schema . ".json";
//
//        if (!File::exists($filePath)) {
//            return Response::json('not found', 402);
//        }
//
//        return Response::json(json_decode(File::get($filePath)));
//    }
}

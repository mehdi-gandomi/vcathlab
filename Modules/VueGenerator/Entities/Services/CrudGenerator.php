<?php
namespace Modules\VueGenerator\Entities\Services;
use Nwidart\Modules\Facades\Module;
use Illuminate\Database\Eloquent\Model as Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class CrudGenerator
{
    protected $modelTitle;
    protected $model;
    protected $baseRoutePath;
    protected $baseApiPath;
    protected $columns;
    protected $relations;
    protected $module;
    protected $commandOptions;
    public function __construct(Model $model, $baseApiPath, $module,$baseRoutePath,$commandOptions)
    {
        $this->module = $module;
        $this->model = $model;
        $this->baseRoutePath = $baseRoutePath;
        $this->baseApiPath = $baseApiPath;
        $this->relations = $this->getModelRelations();
        $this->commandOptions=$commandOptions;
    }
    public function getVueCrudTemplateFilePath($templateName)
    {
        $templateName = str_replace('.', '/', $templateName);

        $templatesPath = config(
            'vuegenerator.templates_dir',
            resource_path('iracode/vuecrud-generator-templates/')
        );

        $path = $templatesPath . $templateName . '.stub';

        if (file_exists($path)) {
            return $path;
        }

        return base_path('Modules/VueGenerator/templates/' . $templateName . '.stub');
    }
    public function getVueCrudTemplate($templateName)
    {
        $path = $this->getVueCrudTemplateFilePath($templateName);

        return file_get_contents($path);
    }
    public function getClassTitle(Model $model)
    {
        return \Str::title(basename(get_class($model)));
    }
    public function getModelPluralName(Model $model)
    {
        $modelTitle = basename(get_class($model));
        return \Str::snake(\Str::plural($modelTitle));
    }
    public function getViewsPath()
    {
        if($this->module){
            $basePath = module_path($this->module,"Resources/js");
        }else{
            $basePath=resource_path("js");
        }
        $modelPath = $this->getModelPluralName($this->model);

        return $basePath . DIRECTORY_SEPARATOR . $modelPath;
    }
    public function createViewPathIfNotExists()
    {
        $fullPath = $this->getViewsPath();
        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0777, true, true);
        }
        return $fullPath;
    }
    public function getCreateViewPath()
    {
        $crudPath = $this->createViewPathIfNotExists();
        return $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.create");
    }
    public function getPrintPath()
    {
        $crudPath = $this->createViewPathIfNotExists();
        return $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.print");
    }
    public function getIndexViewPath()
    {
        $crudPath = $this->createViewPathIfNotExists();
        return $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.index");
    }
    public function getUpdateViewPath()
    {
        $crudPath = $this->createViewPathIfNotExists();
        return $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.update");
    }
    public function generateCreateView()
    {
        $scriptHtml = view("vuegenerator::templates.create.scripts", ['columns' => $this->columns, 'baseRoutePath' => $this->baseRoutePath,'modelPlural'=>$this->getModelPluralName($this->model), 'baseApiPath' => $this->baseApiPath, 'model' => $this->model, 'relations' => $this->relations])->render();
        $formHtml = view("vuegenerator::templates.create.form", ['columns' => $this->columns, 'model' => $this->model, 'relations' => $this->relations])->render();
        $html = $this->getVueCrudTemplate("crud.create");
        $html = str_replace('$FORMFIELDS$', $formHtml, $html);
        $html = str_replace('$SCRIPTS$', $scriptHtml, $html);
        $html = str_replace('$TABLE_NAME_TITLE$', $this->modelTitle, $html);
        $basePath = "/" . $this->baseRoutePath;
        $html = str_replace('$BASE_PATH$', $basePath, $html);
        //create vuejs files path for crud
        $viewPath = $this->getCreateViewPath();
        if (file_exists($viewPath)) {
            unlink($viewPath);
        }

        file_put_contents($viewPath, $html);
    }
    public function generatePrintView()
    {
        $html = view("vuegenerator::templates.print", ['columns' => $this->columns, 'baseRoutePath' => $this->baseRoutePath,'modelPlural'=>$this->getModelPluralName($this->model), 'baseApiPath' => $this->baseApiPath, 'model' => $this->model, 'relations' => $this->relations,'title'=>\Str::title(str_replace("_", "", $this->getModelPluralName($this->model))),'module'=>$this->module])->render();
        //create vuejs files path for crud
        $viewPath = $this->getPrintPath();
        if (file_exists($viewPath)) {
            unlink($viewPath);
        }

        file_put_contents($viewPath, $html);
    }
    public function generateFilters()
    {
        return "";
    }
    public function getModelRelations()
    {
        $relations = [];
        $fields = $this->model::$fields;
        foreach ($fields as $field) {
            if ($field['htmlType'] == "relation") {
                $relation = $this->model->{$field['functionName']}();
                if ($field['htmlType'] == "relation") {
                    $foreignKey = $relation->getForeignKeyName();
                    $relations["$foreignKey"] = [
                        'foreign_key' => $foreignKey,
                        'function_name' => $field['functionName'],
                        'related_class' => get_class($relation->getRelated()),
                        'relation_type' => $field['relationType'],
                        'in_index' => $field['inIndex'],
                        'in_form' => $field['inForm'],
                        'name' => $field['functionName'],
                        'label' => $field['functionName'],
                    ];
                }

            }
        }
        return $relations;
    }
    public function generateIndexView()
    {
        $scriptHtml = view("vuegenerator::templates.index.scripts", ['columns' => $this->columns, "modelTitle" => $this->modelTitle, "model" => $this->model, 'modelPlural' => $this->getModelPluralName($this->model), 'baseRoutePath' => $this->baseRoutePath,'modelPlural'=>$this->getModelPluralName($this->model), 'baseApiPath' => $this->baseApiPath, 'relations' => $this->relations,'module'=>$this->module,'showCreateButton'=>$this->commandOptions['createView'],'showEditButton'=>$this->commandOptions['updateView'],'showDetailButton'=>$this->commandOptions['detailView']])->render();
        $html = $this->getVueCrudTemplate("crud.index");
        $html = str_replace('$SCRIPTS$', $scriptHtml, $html);
        $html = str_replace('$FILTERS_CARD$', $this->generateFilters(), $html);
        $html = str_replace('$TABLE_NAME_TITLE$', $this->modelTitle, $html);
        $createPath = $this->baseRoutePath . "/create";
        $html = str_replace('$CREATE_PATH$', $createPath, $html);
        //create vuejs files path for crud
        $crudPath = $this->createViewPathIfNotExists();
        $indexPath = $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.index");
        if (file_exists($indexPath)) {
            unlink($indexPath);
        }

        file_put_contents($indexPath, $html);
    }
    public function generateDetailView()
    {
        $html = view("vuegenerator::templates.detail.main", ['columns' => $this->columns,'module'=>$this->module, 'baseRoutePath' => $this->baseRoutePath,'modelPlural'=>$this->getModelPluralName($this->model), 'baseApiPath' => $this->baseApiPath, "model" => $this->model, 'relations' => $this->relations])->render();
        //create vuejs files path for crud
        $crudPath = $this->createViewPathIfNotExists();
        $detailsPath = $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.detail");
        if (file_exists($detailsPath)) {
            unlink($detailsPath);
        }

        file_put_contents($detailsPath, $html);
    }
    public function generateUpdateView()
    {
        $scriptHtml = view("vuegenerator::templates.update.scripts", ['columns' => $this->columns, 'baseRoutePath' => $this->baseRoutePath,'modelPlural'=>$this->getModelPluralName($this->model), 'baseApiPath' => $this->baseApiPath, 'model' => $this->model, 'relations' => $this->relations])->render();
        $formHtml = view("vuegenerator::templates.create.form", ['columns' => $this->columns, 'model' => $this->model, 'relations' => $this->relations])->render();
        $html = $this->getVueCrudTemplate("crud.update");
        $html = str_replace('$FORMFIELDS$', $formHtml, $html);
        $html = str_replace('$SCRIPTS$', $scriptHtml, $html);
        $html = str_replace('$TABLE_NAME_TITLE$', $this->modelTitle, $html);
        $basePath = "/" . $this->baseRoutePath;
        $html = str_replace('$BASE_PATH$', $basePath, $html);
        //create vuejs files path for crud

        $crudPath = $this->createViewPathIfNotExists();
        $updatePath = $crudPath . DIRECTORY_SEPARATOR . config("vuegenerator.crud.update");
        if (file_exists($updatePath)) {
            unlink($updatePath);
        }

        file_put_contents($updatePath, $html);
    }

    //get current registererd vue routes in routes.json
    public function getCurrentRoutes()
    {
        $routeFile = config("vuegenerator.crud.routes_path");
        $routeFile = base_path($routeFile);
        if (!File::exists($routeFile)) {
            return [];
        }

        $routes = file_get_contents($routeFile);
        return json_decode($routes, true);
    }
    public function getAllPathsAsArray($currentRoutes)
    {
        $paths = [];
        foreach ($currentRoutes as $_module) {
            if (isset($_module['path']) && strlen($_module['path'])) {
                $paths[] = $_module['path'];
            }

            if (isset($_module['children']) && count($_module['children'])) {
                foreach ($_module['children'] as $__module) {
                    if (isset($__module['path']) && strlen($__module['path'])) {
                        $paths[] = $__module['path'];
                    }
                }
            }

        }
        return $paths;
    }
    public function generateRoutes()
    {
        $currentRoutes = [];
        // $paths=$this->getAllPathsAsArray($currentRoutes);
        $createPath = $this->baseRoutePath . "/create";
        $indexPath = $this->baseRoutePath;
        $updatePath = $this->baseRoutePath . "/:id/edit";
        $detailsPath = $this->baseRoutePath . "/:id";
        $printPath = $this->baseRoutePath . "/print";
        $pluralTitle = str_replace("_", "", $this->getModelPluralName($this->model));
        // $relativeBasePath = config("vuegenerator.modules_relative_base_path");
        $modelPath = $this->getModelPluralName($this->model);
        $baseName=$this->module ? \Str::snake($this->module)."-":"";
        // if ($this->module) {
        //     $relativeBasePath = "./" . $this->module;
        // }
        // $relativeBasePath=$relativeBasePath. "/" . $modelPath;
        $currentRoutes = [];
        $route=[
            "path" => $printPath,
            "name" => $baseName.$this->getModelPluralName($this->model) . "-print",
            "component" => "./" . config("vuegenerator.crud.print"),
            'meta' => [
                "isCrud"=>true,
                "crudOperation"=>"Download",
                "basePath"=>"/".$this->baseRoutePath,
                'breadcrumb' => [
                    [
                        "title" => "Home",
                        "url" => "/",
                    ],
                    [
                        "title" => \Str::title($pluralTitle),
                        "url" => "/" . $this->baseRoutePath,
                    ],
                    [
                        "title" => "Print",
                        // "url" => "/" . $this->baseRoutePath,
                        "active" => true,
                    ],
                ],
                'pageTitle' =>"Print ".$this->getModelPluralName($this->model),
            ],
        ];
        if(Module::isActive("AccessLevel")){
            $route['meta']['middleware']=["acl"];
        }
        if(isset($this->commandOptions['menuId'])){
            $route['meta']['menuId']=$this->commandOptions['menuId'];
        }
        $currentRoutes[]=$route;
        if($this->commandOptions['createView']){
            $route=[
                "path" => $createPath,
                "name" => $baseName.$this->getModelPluralName($this->model) . "-create-form",
                "component" => "./" . config("vuegenerator.crud.create"),
                'meta' => [
                    "isCrud"=>true,
                    "crudOperation"=>"Create",
                    "basePath"=>"/".$this->baseRoutePath,
                    'breadcrumb' => [
                        [
                            "title" => "Home",
                            "url" => "/",
                        ],
                        [
                            "title" => \Str::title($pluralTitle),
                            "url" => "/" . $this->baseRoutePath,
                        ],
                        [
                            "title" => "Create " . $this->modelTitle,
                            "active" => true,
                        ],
                    ],
                    'pageTitle' => "Create " . $this->modelTitle,
                ],
            ];
            if(Module::isActive("AccessLevel")){
                $route['meta']['middleware']=["acl"];
            }
            if(isset($this->commandOptions['menuId'])){
                $route['meta']['menuId']=$this->commandOptions['menuId'];
            }
            $currentRoutes[]=$route;
        }
        if($this->commandOptions['indexView']){
            $route=[
                "path" => $indexPath,
                "name" => $baseName.$this->getModelPluralName($this->model) . "-index",
                "component" => "./" . config("vuegenerator.crud.index"),
                'meta' => [
                    "isCrud"=>true,
                    "crudOperation"=>"View",
                    "basePath"=>"/".$this->baseRoutePath,
                    'breadcrumb' => [
                        [
                            "title" => "Home",
                            "url" => "/",
                        ],
                        [
                            "title" => \Str::title($pluralTitle),
                            "active" => true,
                        ],
                    ],
                    'pageTitle' => \Str::title($pluralTitle),
                ],
            ];
            if(Module::isActive("AccessLevel")){
                $route['meta']['middleware']=["acl"];
            }
            if(isset($this->commandOptions['menuId'])){
                $route['meta']['menuId']=$this->commandOptions['menuId'];
            }
            $currentRoutes[]=$route;
        }
        if($this->commandOptions['updateView']){
            $route=[
                "path" => $updatePath,
                "name" => $baseName.$this->getModelPluralName($this->model) . "-update-form",
                "component" => "./" . config("vuegenerator.crud.update"),
                'meta' => [
                    "isCrud"=>true,
                    "crudOperation"=>"Update",
                    "basePath"=>"/".$this->baseRoutePath,
                    'breadcrumb' => [
                        [
                            "title" => "Home",
                            "url" => "/",
                        ],
                        [
                            "title" => \Str::title($pluralTitle),
                            "url" => "/" . $this->baseRoutePath,
                        ],
                        [
                            "routeParam" => "id",
                            "resourceTitleField"=>$this->model::$title,
                            "active" => true,
                        ],
                    ],
                    'pageTitle' => "Update " . $this->modelTitle,
                ],
            ];
            if(Module::isActive("AccessLevel")){
                $route['meta']['middleware']=["acl"];
            }
            if(isset($this->commandOptions['menuId'])){
                $route['meta']['menuId']=$this->commandOptions['menuId'];
            }
            $currentRoutes[]=$route;
        }
        if($this->commandOptions['detailView']){
            $route=[
                "path" => $detailsPath,
                "name" => $baseName.$this->getModelPluralName($this->model) . "-detail",
                "component" => "./" . config("vuegenerator.crud.detail"),
                'meta' => [
                    "isCrud"=>true,
                    "crudOperation"=>"View",
                    "basePath"=>"/".$this->baseRoutePath,
                    'breadcrumb' => [
                        [
                            "title" => "Home",
                            "url" => "/",
                        ],
                        [
                            "title" => \Str::title($pluralTitle),
                            "url" => "/" . $this->baseRoutePath,
                        ],
                        [
                            "routeParam" => "id",
                            "resourceTitleField"=>$this->model::$title,
                            "active" => true,
                        ],
                    ],
                    'pageTitle' => $this->modelTitle . " Details",
                ],
            ];
            if(Module::isActive("AccessLevel")){
                $route['meta']['middleware']=["acl"];
            }
            if(isset($this->commandOptions['menuId'])){
                $route['meta']['menuId']=$this->commandOptions['menuId'];
            }
            $currentRoutes[]=$route;
        }

        $modulePath=$this->createViewPathIfNotExists();
        $html = view("vuegenerator::templates.routes", ['routes' => $currentRoutes])->render();
        // $routeJsonFile = $modulePath."/routes.json";
        $routeJsFile = $modulePath."/routes.js";
        // file_put_contents($routeJsonFile,json_encode($currentRoutes));
        file_put_contents($routeJsFile, $html);
    }
    public function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if($pos !== false)
        {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }
    public function generate($generateFilters)
    {
        $this->modelTitle = $this->getClassTitle($this->model);
        $this->baseRoutePath = $this->baseRoutePath ? $this->baseRoutePath : $this->getModelPluralName($this->model);
        if($this->module) $this->baseRoutePath=Module::find($this->module)->getLowerName()."/".$this->baseRoutePath;
        // $this->baseRoutePath=config("panel.path_prefix")."/".$this->baseRoutePath;
        $infyomGeneratorService = app()->make('\Modules\GeneratorBuilder\Services\GeneratorService');
        $fillable = $this->model->getFillable();
        // $columns=array_filter($fillable,function())
        $this->columns = $infyomGeneratorService->getTableColumns($this->model->getTable(), null, $fillable);
        $this->generatePrintView();
        if($this->commandOptions['createView']){
            $this->generateCreateView();
        }
        if($this->commandOptions['updateView']){
            $this->generateUpdateView();
        }
        if($this->commandOptions['indexView']){
            $this->generateIndexView();
        }
        if($this->commandOptions['detailView']){
            $this->generateDetailView();
        }
        $this->generateRoutes();
        if($this->module){
            $modulePath = "@external_modules/".$this->module."/Resources/js/".$this->getModelPluralName($this->model)."/routes.js";
        }else{
            $modulePath = "@base_resources/".$this->getModelPluralName($this->model)."/routes.js";
        }
        $prettifyCommand="npx prettier --write ".$this->getViewsPath() . "/*.{css,js,vue}";
        shell_exec($prettifyCommand);
        $routeJsContents=file_get_contents(config("vuegenerator.modulesjs-file"));
        // $routeJsContents=preg_replace("export default [\n","",$routeJsContents);
        // $routeJsContents=str_replace("export default [\n","",$routeJsContents);
        if (!\Str::contains($routeJsContents, "...require('".$modulePath."').default")) {
            $routeJsContents=str_replace("\n];","",$routeJsContents);
            $routeJsContents=$this->str_lreplace("\n","",$routeJsContents);
            // $routeJsContents.=",";
            $routeJsContents.="\n\t...require('".$modulePath."').default,";
            $routeJsContents.="\n];";
        }
        file_put_contents(config("vuegenerator.modulesjs-file"),$routeJsContents);
        // shell_exec("gulp");
        // Artisan::call("prettify:js", [
        //     '--path' => ,
        // ]);
        // Artisan::call("prettify:js", [
        //     '--path' => "resources/js/src/routes.js",
        // ]);

    }
}

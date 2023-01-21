<?php

namespace Modules\CrudGenerator\Generators;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Modules\CrudGenerator\Common\CommandData;
use Modules\CrudGenerator\Common\GeneratorFieldRelation;
use Modules\CrudGenerator\Utils\FileUtil;
use Modules\CrudGenerator\Utils\TableFieldsGenerator;
use Nwidart\Modules\Facades\Module;

class ModelGenerator extends BaseGenerator
{
    /**
     * Fields not included in the generator by default.
     *
     * @var array
     */
    protected $excluded_fields = [
        'created_at',
        'updated_at',
    ];
    protected $dates=[];
    /** @var CommandData */
    private $commandData;
    private $defaultDateFormat='Y-m-d H:i';
    /** @var string */
    private $path;
    private $fileName;
    private $table;
    protected $hasPassword;
    protected $hasUpload;
    /**
     * ModelGenerator constructor.
     *
     * @param CommandData $commandData
     */
    public function __construct(CommandData $commandData)
    {
        $this->commandData = $commandData;
        $this->path = $commandData->config->pathModel;
        $this->fileName = $this->commandData->modelName.'.php';
        $this->table = $this->commandData->dynamicVars['$TABLE_NAME$'];
    }
    public function createOptionsText($options)
    {
        $output="";
        foreach($options as $key=>$option){
          if(is_bool($option)){
            $option=$option == true ? "true":"false";
            $output.="
                '$key'=>$option,
            ";
          }else{
            $output.="
                '$key'=>'$option',
            ";
          }
        }
        return $output;
    }
    protected function addFields($templateData){
        $fields=[];
        $fileFields=[];
        $imageFields=[];
        $withFields=[];
        $relations=collect($this->commandData->relations)->keyBy("foreignKey");
        // $jsobFromGUI=collect(json_decode($this->commandData->config->options['jsonFromGUI']));
        foreach($this->commandData->fields as $field){
          if(!isset($relations[$field->name])){
            if($field->htmlType == "password") $this->hasPassword=true;
            if($field->htmlType == "date") {
                $this->dates[]=$field->name;
                //add date formats
            }
            if($field->htmlType == "datetime") {
                $this->dates[]=$field->name;
                //add date formats
            }
            $inIndex=$field->inIndex ? 1:0;
            $inForm=$field->inForm ? 1:0;
            // $label=$field->comment ? $field->comment:Str::of($field->name)->snake()->replace('_', ' ')->title();
            $label=$field->label ? $field->label:Str::of($field->name)->snake()->replace('_', ' ')->title();
            $fieldText="'{$field->name}'=>[
                'htmlType'=>'{$field->htmlType}',
                'inIndex'=>{$inIndex},
                'inForm'=>{$inForm},
                'title'=>'{$label}',
                'name'=>'{$field->name}',
            ";
            if(count($field->filepondOptions)){
                $optionsText=$this->createOptionsText($field->filepondOptions);
                $fieldText.="
                    'filepond_options'=>[
                        $optionsText
                    ],
                ";
            }
            if(count($field->htmlValues) && $field->htmlType != "selectTable"){
                $optionsText=$this->createOptionsText($field->htmlValues);
                $fieldText.="
                    'options'=>[
                        $optionsText
                    ],
                ";
            }
            if(count($field->htmlValues) && $field->htmlType == "selectTable"){
                $optionsText=$this->createOptionsText($field->htmlValues);
                $fieldText.="
                'select_table_options'=>[
                        $optionsText
                    ],
                ";
            }
            $fieldText.="
                ]
            ";
            $fields[]=$fieldText;
            if(in_array($field->htmlType,['file','filepond'])){
                $this->hasUpload=true;
                $fileFields[]="'{$field->name}'=>[]";
            }else if($field->htmlType == "filepond_image"){
                $this->hasUpload=true;
                $imageFields[]="'{$field->name}'=>[]";
            }
          }
        }
        foreach($relations as $relation){
            $inIndex=$relation->inIndex ? 1:0;
            $inForm=$relation->inForm ? 1:0;
            $fieldText="'{$relation->functionName}'=>[
                'htmlType'=>'relation',
                'relationType'=>'{$relation->type}',
                'functionName'=>'{$relation->functionName}',
                'name'=>'{$relation->functionName}',
                'title'=>'{$relation->functionName}',
                'inIndex'=>{$inIndex},
                'inForm'=>{$inForm},
                'foreignKey'=>'{$relation->foreignKey}',
                'relatedClass'=>'{$relation->relatedClass}',
            ]
            ";
            $fields[]=$fieldText;
            $withFields[]="'{$relation->functionName}'";
        }
        $templateData=str_replace('$WITH_RELATIONSHIPS$',implode(','.infy_nl_tab(1, 2), $withFields),$templateData);
        $templateData=str_replace('$IMAGES_FIELDS$',implode(','.infy_nl_tab(1, 2), $imageFields),$templateData);
        $templateData=str_replace('$FILES_FIELDS$',implode(','.infy_nl_tab(1, 2), $fileFields),$templateData);
        return str_replace('$CRUD_FIELDS$',implode(','.infy_nl_tab(1, 2), $fields),$templateData);
    }
    public function addModelTitleField($templateData)
    {
        return str_replace('$TITLE_FIELD$',$this->commandData->dynamicVars['$TITLE_FIELD$'],$templateData);
    }
    public function generate()
    {
        $templateData = get_template('model.model', 'CrudGenerator');
        $templateData=$this->fillAllowedFilters($templateData);
        $templateData=$this->fillAllowedIncludes($templateData);
        $templateData=$this->fillAllowedSorts($templateData);
        $templateData=$this->addFields($templateData);
        $templateData=$this->addModelTitleField($templateData);
        if($this->hasUpload){
            $templateData=str_replace('$IMAGE_UPLOAD_TRAIT_NAMESPACE$',"use Modules\AjaxUpload\Entities\Traits\HasImageUploads;",$templateData);
            $templateData=str_replace('$IMAGE_UPLOAD_TRAIT$',"use HasImageUploads;",$templateData);
        }else{
            $templateData=str_replace('$IMAGE_UPLOAD_TRAIT_NAMESPACE$',"",$templateData);
            $templateData=str_replace('$IMAGE_UPLOAD_TRAIT$',"",$templateData);
        }
        if($this->hasPassword) {
            $this->commandData->dynamicVars['$PASSWORD_TRAIT_IMPORT$']="use Modules\Panel\Traits\HasPassword;";
            $this->commandData->dynamicVars['$PASSWORD_TRAIT$']="use HasPassword;";
        }
        // $apiRoute=config('crudgenerator.api_prefix', 'api')."/";
        // if (!empty($this->commandData->config->prefixes['route'])) {
        //     $apiRoute.=$this->commandData->config->prefixes['route'];
        // }
        // $apiRoute.=$this->commandData->config->mSnakePlural;
        $apiRoute="/api/".$this->commandData->config->mSnakePlural;
        if($this->commandData->commandObj->option("module")){
            $apiRoute="/".Module::find($this->commandData->commandObj->option("module"))->getLowerName().$apiRoute;
        }
        $templateData=str_replace('$API_ROUTE$',$apiRoute,$templateData);
        $templateData = $this->fillTemplate($templateData);

        FileUtil::createFile($this->path, $this->fileName, $templateData);

        $this->commandData->commandComment("\nModel created: ");
        $this->commandData->commandInfo($this->fileName);
    }
    public function fillAllowedFilters($templateData)
    {
        $fields=[];
        $module=$this->commandData->commandObj->option("module");
        foreach($this->commandData->fields as $field){
            if($field->isSearchable){
                $filter=explode("_",$field->filter);
                if(count($filter) < 2) continue;
                $filterType=$filter[1];
                $filterUse=$filter[0];
                if($filterUse == "existing"){
                    $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterType)";
                }else if($filterUse == "new"){
                    if($filterType == "number"){
                        $fields[]="'{$field->name}'=>AllowedFilter::exact('{$field->name}')";
                    }else if($filterType == "date"){
                        // $fields[]="'{}'";
                        Artisan::call("make:filter",[
                            'name'=>str_replace("_","",\Str::title($field->name)),
                            '--column'=>$field->name,
                            '--type'=>$filterType,
                            '--module'=>$module,
                            '--model'=>$this->commandData->modelName
                        ]);
                        $filterClassName="\\Modules\\".$module."\\Filters\\".$this->commandData->modelName."\\".str_replace("_","",\Str::title($field->name));
                        $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterClassName)";
                    }else if($filterType == "checkbox"){
                        Artisan::call("make:filter",[
                            'name'=>str_replace("_","",\Str::title($field->name)),
                            '--column'=>$field->name,
                            '--type'=>$filterType,
                            '--module'=>$module,
                            '--model'=>$this->commandData->modelName
                        ]);
                        $filterClassName="\\Modules\\".$module."\\Filters\\".$this->commandData->modelName."\\".str_replace("_","",\Str::title($field->name));
                        $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterClassName)";
                    }else if($filterType == "select"){

                        Artisan::call("make:filter",[
                            'name'=>str_replace("_","",\Str::title($field->name)),
                            '--column'=>$field->name,
                            '--type'=>$filterType,
                            '--module'=>$module,
                            '--model'=>$this->commandData->modelName,
                            '--values'=>json_encode($field->filterOptions)
                        ]);
                        $filterClassName="\\Modules\\".$module."\\Filters\\".$this->commandData->modelName."\\".str_replace("_","",\Str::title($field->name));
                        $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterClassName)";
                    }else if($filterType == "multiselect"){
                        Artisan::call("make:filter",[
                            'name'=>str_replace("_","",\Str::title($field->name)),
                            '--column'=>$field->name,
                            '--type'=>$filterType,
                            '--module'=>$module,
                            '--values'=>json_encode($field->filterOptions),
                            '--model'=>$this->commandData->modelName
                        ]);
                        $filterClassName="\\Modules\\".$module."\\Filters\\".$this->commandData->modelName."\\".str_replace("_","",\Str::title($field->name));
                        $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterClassName)";
                    }else if($filterType == "set"){
                        Artisan::call("make:filter",[
                            'name'=>str_replace("_","",\Str::title($field->name)),
                            '--column'=>$field->name,
                            '--type'=>$filterType,
                            '--module'=>$module,
                            '--values'=>json_encode($field->filterOptions),
                            '--model'=>$this->commandData->modelName
                        ]);
                        $filterClassName="\\Modules\\".$module."\\Filters\\".$this->commandData->modelName."\\".str_replace("_","",\Str::title($field->name));
                        $fields[]="'{$field->name}'=>AllowedFilter::custom('{$field->name}',new $filterClassName)";
                    }else{
                        $fields[]="'{$field->name}'=>'{$field->name}'";
                    }
                }


            }
        }
        return str_replace('$ALLOWED_FILTERS$',implode(','.infy_nl_tab(1, 2), $fields),$templateData);
    }
    public function fillAllowedIncludes($templateData)
    {
        $fields=[];
        foreach($this->commandData->relations as $relation){
            $fields[]="'{$relation->functionName}'";
        }

        return str_replace('$ALLOWED_INCLUDES$',implode(','.infy_nl_tab(1, 2), $fields),$templateData);
    }
    public function fillAllowedSorts($templateData)
    {
        $fields=[];
        foreach($this->commandData->fields as $field){
            // if($field->isSearchable){

            // }
            $fields[]="'$field->name'";
        }
        return str_replace('$ALLOWED_SORTS$',implode(",".infy_nl_tab(1, 2), $fields),$templateData);
    }

    private function fillTemplate($templateData)
    {

        $rules = $this->generateRules();
        $templateData = fill_template($this->commandData->dynamicVars, $templateData);

        $templateData = $this->fillSoftDeletes($templateData);
        if(count($this->dates)){
            $dateFormats=[];
            foreach($this->dates as $date){
                $dateFormats[]="
                    '{$date}'=>'{$this->defaultDateFormat}'
                ";
            }
            $templateData = str_replace('$DATE_FORMATS$',implode(','.infy_nl_tab(1, 1),$dateFormats),$templateData);
        }else{
            $templateData = str_replace('$DATE_FORMATS$', '', $templateData);
        }
        $fillables = [];
        $primaryKey = 'id';

        foreach ($this->commandData->fields as $field) {
            if ($field->isFillable) {
                $fillables[] = "'".$field->name."'";
            }
            if ($field->isPrimary) {
                $primaryKey = $field->name;
            }
        }

        $templateData = $this->fillDocs($templateData);
        if($this->commandData->commandObj->option("no-timestamp")){
            $templateData = str_replace('$TIMESTAMPS$',infy_nl_tab()."public \$timestamps = false;\n",$templateData);
        }else{
            $templateData = $this->fillTimestamps($templateData);
        }


        if ($this->commandData->getOption('primary')) {
            $primary = infy_tab()."protected \$primaryKey = '".$this->commandData->getOption('primary')."';\n";
        } else {
            $primary = '';
            if ($this->commandData->getOption('fieldsFile') && $primaryKey != 'id') {
                $primary = infy_tab()."protected \$primaryKey = '".$primaryKey."';\n";
            }
        }

        $templateData = str_replace('$PRIMARY$', $primary, $templateData);

        $templateData = str_replace('$FIELDS$', implode(','.infy_nl_tab(1, 2), $fillables), $templateData);

        $templateData = str_replace('$RULES$', implode(','.infy_nl_tab(1, 2), $rules), $templateData);

        $templateData = str_replace('$CAST$', implode(','.infy_nl_tab(1, 2), $this->generateCasts()), $templateData);

        $templateData = str_replace(
            '$RELATIONS$',
            fill_template($this->commandData->dynamicVars, implode(PHP_EOL.infy_nl_tab(1, 1), $this->generateRelations())),
            $templateData
        );

        $templateData = str_replace('$GENERATE_DATE$', date('F j, Y, g:i a T'), $templateData);

        return $templateData;
    }

    private function fillSoftDeletes($templateData)
    {
        if (!$this->commandData->getOption('softDelete')) {
            $templateData = str_replace('$SOFT_DELETE_IMPORT$', '', $templateData);
            $templateData = str_replace('$SOFT_DELETE$', '', $templateData);
            if(count($this->dates)){
                $templateData = str_replace('$SOFT_DELETE_DATES$', infy_nl_tab()."protected \$dates = ['".implode("','", $this->dates)."'];\n", $templateData);
            }else{
                $templateData = str_replace('$SOFT_DELETE_DATES$', '', $templateData);
            }
        } else {
            $templateData = str_replace(
                '$SOFT_DELETE_IMPORT$',
                "use Illuminate\\Database\\Eloquent\\SoftDeletes;\n",
                $templateData
            );
            $templateData = str_replace('$SOFT_DELETE$', infy_tab()."use SoftDeletes;\n", $templateData);
            $deletedAtTimestamp = config('crudgenerator.timestamps.deleted_at', 'deleted_at');
            $templateData = str_replace(
                '$SOFT_DELETE_DATES$',
                infy_nl_tab()."protected \$dates = ['".$deletedAtTimestamp."'];\n",
                $templateData
            );
        }

        return $templateData;
    }

    private function fillDocs($templateData)
    {
        if ($this->commandData->getAddOn('swagger')) {
            $templateData = $this->generateSwagger($templateData);
        }

        $docsTemplate = get_template('docs.model', 'CrudGenerator');
        $docsTemplate = fill_template($this->commandData->dynamicVars, $docsTemplate);

        $fillables = '';
        $fieldsArr = [];
        $count = 1;
        foreach ($this->commandData->relations as $relation) {
            $field = $relationText = (isset($relation->inputs[0])) ? $relation->inputs[0] : null;
            if (in_array($field, $fieldsArr)) {
                $relationText = $relationText.'_'.$count;
                $count++;
            }

            $fillables .= ' * @property '.$this->getPHPDocType($relation->type, $relation, $relationText).PHP_EOL;
            $fieldsArr[] = $field;
        }

        foreach ($this->commandData->fields as $field) {
            if ($field->isFillable) {
                $fillables .= ' * @property '.$this->getPHPDocType($field->fieldType).' $'.$field->name.PHP_EOL;
            }
        }
        $docsTemplate = str_replace('$GENERATE_DATE$', date('F j, Y, g:i a T'), $docsTemplate);
        $docsTemplate = str_replace('$PHPDOC$', $fillables, $docsTemplate);

        $templateData = str_replace('$DOCS$', $docsTemplate, $templateData);

        return $templateData;
    }

    /**
     * @param $db_type
     * @param GeneratorFieldRelation|null $relation
     * @param string|null                 $relationText
     *
     * @return string
     */
    private function getPHPDocType($db_type, $relation = null, $relationText = null)
    {
        $relationText = (!empty($relationText)) ? $relationText : null;

        switch ($db_type) {
            case 'datetime':
                return 'string|\Carbon\Carbon';
            case '1t1':
                return '\\'.$this->commandData->config->nsModel.'\\'.$relation->inputs[0].' $'.Str::camel($relationText);
            case 'mt1':
                if (isset($relation->inputs[1])) {
                    $relationName = str_replace('_id', '', strtolower($relation->inputs[1]));
                } else {
                    $relationName = $relationText;
                }

                return '\\'.$this->commandData->config->nsModel.'\\'.$relation->inputs[0].' $'.Str::camel($relationName);
            case '1tm':
            case 'mtm':
            case 'hmt':
                return '\Illuminate\Database\Eloquent\Collection $'.Str::camel(Str::plural($relationText));
            default:
                $fieldData = SwaggerGenerator::getFieldType($db_type);
                if (!empty($fieldData['fieldType'])) {
                    return $fieldData['fieldType'];
                }

                return $db_type;
        }
    }

    public function generateSwagger($templateData)
    {
        $fieldTypes = SwaggerGenerator::generateTypes($this->commandData->fields);

        $template = get_template('model_docs.model', 'swagger-generator');

        $template = fill_template($this->commandData->dynamicVars, $template);

        $template = str_replace(
            '$REQUIRED_FIELDS$',
            '"'.implode('"'.', '.'"', $this->generateRequiredFields()).'"',
            $template
        );

        $propertyTemplate = get_template('model_docs.property', 'swagger-generator');

        $properties = SwaggerGenerator::preparePropertyFields($propertyTemplate, $fieldTypes);

        $template = str_replace('$PROPERTIES$', implode(",\n", $properties), $template);

        $templateData = str_replace('$DOCS$', $template, $templateData);

        return $templateData;
    }

    private function generateRequiredFields()
    {
        $requiredFields = [];

        foreach ($this->commandData->fields as $field) {
            if (!empty($field->validations)) {
                if (Str::contains($field->validations, 'required')) {
                    $requiredFields[] = $field->name;
                }
            }
        }

        return $requiredFields;
    }

    private function fillTimestamps($templateData)
    {
        $timestamps = TableFieldsGenerator::getTimestampFieldNames();

        $replace = '';
        if (empty($timestamps)) {
            $replace = infy_nl_tab()."public \$timestamps = false;\n";
        }

        if ($this->commandData->getOption('fromTable') && !empty($timestamps)) {
            list($created_at, $updated_at) = collect($timestamps)->map(function ($field) {
                return !empty($field) ? "'$field'" : 'null';
            });

            $replace .= infy_nl_tab()."const CREATED_AT = $created_at;";
            $replace .= infy_nl_tab()."const UPDATED_AT = $updated_at;\n";
        }

        return str_replace('$TIMESTAMPS$', $replace, $templateData);
    }

    private function generateRules()
    {
        $dont_require_fields = config('crudgenerator.options.hidden_fields', [])
                + config('crudgenerator.options.excluded_fields', []);

        $rules = [];

        foreach ($this->commandData->fields as $field) {
            if(!$field->inForm) continue;
            if (!$field->isPrimary && $field->isNotNull && empty($field->validations) &&
                !in_array($field->name, $dont_require_fields)) {
                $field->validations = 'required';
            }

            if (!empty($field->validations)) {
                if (Str::contains($field->validations, 'unique:')) {
                    $rule = explode('|', $field->validations);
                    // move unique rule to last
                    usort($rule, function ($record) {
                        return (Str::contains($record, 'unique:')) ? 1 : 0;
                    });
                    $field->validations = implode('|', $rule);
                }
                $rule = "'".$field->name."' => '".$field->validations."'";
                $rules[] = $rule;
            }
        }

        return $rules;
    }

    public function generateUniqueRules()
    {
        $tableNameSingular = Str::singular($this->commandData->config->tableName);
        $uniqueRules = '';
        foreach ($this->generateRules() as $rule) {
            if (Str::contains($rule, 'unique:')) {
                $rule = explode('=>', $rule);
                $string = '$rules['.trim($rule[0]).'].","';

                $uniqueRules .= '$rules['.trim($rule[0]).'] = '.$string.'.$this->route("'.$tableNameSingular.'");';
            }
        }

        return $uniqueRules;
    }

    public function generateCasts()
    {
        $casts = [];

        $timestamps = TableFieldsGenerator::getTimestampFieldNames();

        foreach ($this->commandData->fields as $field) {
            if (in_array($field->name, $timestamps)) {
                continue;
            }

            $rule = "'".$field->name."' => ";
            if(in_array($field->htmlType,['file','filepond'])){
                if($field->filepondOptions['allow-multiple']){
                    $rule .= "'array'";
                }else{
                    $rule ='';
                }
            }else if($field->htmlType == "multi_select"){
                $rule .= "'array'";
            }else{
                switch (strtolower($field->fieldType)) {
                    case 'integer':
                    case 'increments':
                    case 'smallinteger':
                    case 'tinyinteger':
                    case 'long':
                    case 'biginteger':
                        $rule .= "'integer'";
                        break;
                    case 'double':
                        $rule .= "'double'";
                        break;
                    case 'decimal':
                        $rule .= sprintf("'decimal:%d'", $field->numberDecimalPoints);
                        break;
                    case 'float':
                        $rule .= "'float'";
                        break;
                    // case 'boolean':
                    //     $rule .= "'boolean'";
                    //     break;
                    case 'datetime':
                    case 'datetimetz':
                        $rule .= "'datetime'";
                        break;
                    case 'date':
                        $rule .= "'date'";
                        break;
                    case 'enum':
                    case 'string':
                    case 'char':
                    case 'text':
                        $rule .= "'string'";
                        break;
                    default:
                        $rule = '';
                        break;
                }
            }

            if (!empty($rule)) {
                $casts[] = $rule;
            }
        }

        return $casts;
    }

    private function generateRelations()
    {
        $relations = [];

        $count = 1;
        $fieldsArr = [];
        foreach ($this->commandData->relations as $relation) {

            $field = (isset($relation->inputs[0])) ? $relation->inputs[0] : null;

            $relationShipText = $field;
            if (in_array($field, $fieldsArr)) {
                $relationShipText = $relationShipText.'_'.$count;
                $count++;
            }

            $relationText = $relation->getRelationFunctionText($relationShipText);

            if (!empty($relationText)) {
                $fieldsArr[] = $field;
                $relations[] = $relationText;
            }
        }

        return $relations;
    }

    public function rollback()
    {
        if ($this->rollbackFile($this->path, $this->fileName)) {
            $this->commandData->commandComment('Model file deleted: '.$this->fileName);
        }
    }
}

<?php

namespace Modules\CrudGenerator\Common;

use Illuminate\Support\Str;

class GeneratorFieldRelation
{
    /** @var string */
    public $type;
    public $inputs;
    public $relationName;
    public $functionName;
    public $foreignKey;
    public $relatedClass;
    public $inForm = true;
    public $inIndex = true;
    public static function parseRelation($relationInput)
    {
        $inputs = explode(',', $relationInput);
        $relation = new self();
        $relation->type = array_shift($inputs);
        $modelWithRelation = explode(':', array_shift($inputs)); //e.g ModelName:relationName
        if (count($modelWithRelation) == 2) {
            $relation->relationName = $modelWithRelation[1];
            unset($modelWithRelation[1]);
        }
        $relation->inputs = array_merge($modelWithRelation, $inputs);
        if(count($relation->inputs) == 5){
            $relation->foreignKey =$relation->inputs[1];
            $relation->relatedClass =$relation->inputs[0];
            if(isset($relation->inputs[3])){
                $relation->inIndex=json_decode($relation->inputs[3]);
            }
            if(isset($relation->inputs[4])){
                $relation->inForm=json_decode($relation->inputs[4]);
            }
        }else if(count($relation->inputs) == 3){
            if(isset($relation->inputs[1])){
                $relation->inIndex=json_decode($relation->inputs[1]);
            }
            if(isset($relation->inputs[2])){
                $relation->inForm=json_decode($relation->inputs[2]);
            }
        }
        $relationText = (isset($relation->inputs[0])) ? $relation->inputs[0] : null;
        $relation->generateFunctionName($relationText);
        return $relation;
    }
    public function generateFunctionName($relationText)
    {
        $singularRelation = (!empty($this->relationName)) ? $this->relationName : Str::camel($relationText);
        $singularRelation=Str::camel(basename($singularRelation));
        $pluralRelation = (!empty($this->relationName)) ? $this->relationName : Str::camel(Str::plural($relationText));
        $pluralRelation=Str::camel(basename($pluralRelation));
        switch ($this->type) {
            case '1t1':
                $this->functionName = $singularRelation;
                break;
            case '1tm':
                $this->functionName = $pluralRelation;
                break;
            case 'mt1':
                if (!empty($this->relationName)) {
                    $this->functionName = $this->relationName;
                } elseif (isset($this->inputs[1])) {
                    $this->functionName = Str::camel(str_replace('_id', '', strtolower($this->inputs[1])));
                }
                break;
            case 'mtm':
                $this->functionName = $pluralRelation;
                break;
            case 'hmt':
                $this->functionName = $pluralRelation;
                break;
            default:
                $this->functionName = '';
                break;
        }

    }
    public function getRelationFunctionText($relationText = null)
    {
        switch ($this->type) {
            case '1t1':
                $relation = 'hasOne';
                $relationClass = 'HasOne';
                break;
            case '1tm':
                $relation = 'hasMany';
                $relationClass = 'HasMany';
                break;
            case 'mt1':
                $relation = 'belongsTo';
                $relationClass = 'BelongsTo';
                break;
            case 'mtm':
                $relation = 'belongsToMany';
                $relationClass = 'BelongsToMany';
                break;
            case 'hmt':
                $relation = 'hasManyThrough';
                $relationClass = 'HasManyThrough';
                break;
            default:
                $relation = '';
                $relationClass = '';
                break;
        }

        if (!empty($this->functionName) and !empty($relation)) {
            return $this->generateRelation($this->functionName, $relation, $relationClass);
        }

        return '';
    }

    private function generateRelation($functionName, $relation, $relationClass)
    {

        $inputs = $this->inputs;
        $modelName = array_shift($inputs);

        $template = get_template('model.relationship', 'CrudGenerator');

        $template = str_replace('$RELATIONSHIP_CLASS$', $relationClass, $template);
        $template = str_replace('$FUNCTION_NAME$', $functionName, $template);
        $template = str_replace('$RELATION$', $relation, $template);
        $template = str_replace('$RELATION_MODEL_NAME$', $modelName, $template);
        if($this->type != "mtm") $inputs=array_slice($inputs,0,2);
        if (count($inputs) > 0) {
            $inputFields = implode("', '", $inputs);
            $inputFields = ", '".$inputFields."'";
        } else {
            $inputFields = '';
        }

        $template = str_replace('$INPUT_FIELDS$', $inputFields, $template);

        return $template;
    }
}

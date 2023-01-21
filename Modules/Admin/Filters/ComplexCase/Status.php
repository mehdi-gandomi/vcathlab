<?php
namespace Modules\Admin\Filters\ComplexCase;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Status implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'0',
                    'label'=>'Init'
                ],
        [
                    'value'=>'1',
                    'label'=>'Active'
                ],
        [
                    'value'=>'2',
                    'label'=>'Deactive'
                ]
];
    }
    public static function getType(){
        return "select";
    }
    public static function getComponent(){
        return "agSelectColumnFilter";
    }
}

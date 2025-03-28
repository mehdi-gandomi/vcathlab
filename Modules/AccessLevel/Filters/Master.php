<?php
namespace Modules\AccessLevel\Filters;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Master implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'Active',
                    'label'=>'1'
                ],
        [
                    'value'=>'InActive',
                    'label'=>'0'
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

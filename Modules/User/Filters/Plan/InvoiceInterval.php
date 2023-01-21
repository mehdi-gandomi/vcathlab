<?php
namespace Modules\User\Filters\Plan;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class InvoiceInterval implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'month',
                    'label'=>'Month'
                ],
        [
                    'value'=>'year',
                    'label'=>'Year'
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

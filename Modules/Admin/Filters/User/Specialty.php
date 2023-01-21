<?php
namespace Modules\Admin\Filters\User;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Specialty implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'1',
                    'label'=>'General cardiologist'
                ],
        [
                    'value'=>'2',
                    'label'=>'Interventional cardiologist'
                ],
        [
                    'value'=>'3',
                    'label'=>'Interventional radilogist'
                ],
        [
                    'value'=>'4',
                    'label'=>'Interventionalelectrophysiologist'
                ],
        [
                    'value'=>'5',
                    'label'=>'Other'
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

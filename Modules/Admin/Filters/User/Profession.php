<?php
namespace Modules\Admin\Filters\User;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class Profession implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'1',
                    'label'=>'Fellow'
                ],
        [
                    'value'=>'2',
                    'label'=>'Medical student'
                ],
        [
                    'value'=>'3',
                    'label'=>'Physician'
                ],
        [
                    'value'=>'4',
                    'label'=>'Physician assistant'
                ],
        [
                    'value'=>'5',
                    'label'=>'Resident'
                ],
        [
                    'value'=>'6',
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

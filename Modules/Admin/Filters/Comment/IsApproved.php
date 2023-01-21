<?php
namespace Modules\Admin\Filters\Comment;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class IsApproved implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [
[
                    'value'=>'0',
                    'label'=>'not approved'
                ],
        [
                    'value'=>'1',
                    'label'=>'approved'
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

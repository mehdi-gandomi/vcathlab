<?php
namespace Modules\User\Filters\NIFFRCase;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class CreatedAt implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->whereBetween($property,$value);
    }
    public static function getValues(){
        return [];
    }
    public static function getType(){
        return "date";
    }
    public static function getComponent(){
        return "agDateColumnFilter";
    }
}

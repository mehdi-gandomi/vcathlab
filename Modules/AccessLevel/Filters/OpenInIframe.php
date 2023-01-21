<?php
namespace Modules\AccessLevel\Filters;
use Spatie\QueryBuilder\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class OpenInIframe implements Filter
{
    public function __invoke(Builder $query, $value, string $property)
    {
        return $query->where($property,$value);
    }
    public static function getValues(){
        return [];
    }
    public static function getType(){
        return "checkbox";
    }
    public static function getComponent(){
        return "agCheckboxColumnFilter";
    }

}

<?php
namespace Modules\CrudGenerator\Filters;
use Spatie\QueryBuilder\AllowedFilter as BaseFilter;
class AllowedFilter extends BaseFilter{
    public function getFilterClass()
    {
        return $this->filterClass;
    }
}

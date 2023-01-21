<?php

namespace Modules\Panel\Http\Controllers\API;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FilterController extends Controller
{
    public function getModelFilters(Request $request)
    {
        $model=$request->get("model");
        abort_unless(class_exists($model),404);
        dd($model::allowedFilter());
    }
    public function getFilterValues(Request $request)
    {
        $model=$request->get("model");
        $model="Modules\\".$request->get("module")."\\Models\\".$model;
        abort_unless(class_exists($model),404);
        $column=$request->get("column");
        $allowedFilters=$model::allowedFilters();
        if(isset($allowedFilters[$column])){
            $expression=$allowedFilters[$column];
            if(is_object($expression)){
                $expression=$expression->getFilterClass();
                return method_exists($expression,"getValues") ? $expression::getValues():[];
            }
        }
        return [];
    }
}

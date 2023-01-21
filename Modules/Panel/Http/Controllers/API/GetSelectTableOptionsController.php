<?php

namespace Modules\Panel\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class GetSelectTableOptionsController extends Controller
{
  public function __invoke(Request $request){
    $table=$request->get("table");
    $labelColumn=$request->get("labelColumn");
    $valueColumn=$request->get("valueColumn");
    $search=$request->get("search");
    $data=DB::table($table)->select($labelColumn,$valueColumn)->where($labelColumn,"LIKE","%{$search}%")->get();
    $data=$data->map(function($item)use($labelColumn,$valueColumn){
        return [
            'label'=>$item->$labelColumn,
            'value'=>$item->$valueColumn
        ];
    });
    return [
        'ok'=>true,
        'data'=>$data
    ];
  }
}

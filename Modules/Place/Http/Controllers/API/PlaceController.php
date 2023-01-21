<?php

namespace Modules\Place\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Place\Models\City;
use Modules\Place\Models\Province;

class PlaceController extends Controller
{
    public function province(Request $request)
    {
        $provinces=Province::query();
        if($request->has("q")){
            $provinces=$provinces->where("name","LIKE","%".$request->get("q")."%");
        }
        $province=$provinces->orderBy("en_name");
        $provinces=$provinces->get();
        // $provinces=$provinces->map(function($province){
        //     return [
        //         'label'=>$province->en_name,
        //         'value'=>$province->id
        //     ];
        // });
        return response()->json([
            'ok'=>true,
            'data'=>$provinces
        ]);
    }
    public function city(Request $request)
    {
        $cities=City::query();
        if($request->has("q")){
            $cities=$cities->where("name","LIKE","%".$request->get("q")."%");
        }
        if($request->has("province_id")){
            $cities->where("province_id",$request->get("province_id"));
        }
        $cities=$cities->get();
        // $cities=$cities->map(function($city){
        //     return [
        //         'label'=>$city->en_name,
        //         'value'=>$city->id
        //     ];
        // });
        return response()->json([
            'ok'=>true,
            'data'=>$cities
        ]);
    }
}

<?php

namespace Modules\Panel\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetModelFieldsController extends Controller
{
    public function __invoke(Request $request)
    {
        $model=$request->get("model");
        $module=$request->get("module");
        $modelClass="Modules\\".$module."\\Models\\".$model;
        abort_unless(class_exists($modelClass),404);
        if(isset($modelClass::$fields)){
            $fields=$modelClass::$fields;
            foreach($fields as $field=>$item){
                if(isset($item['options'])){
                    $options=[];
                    foreach($item['options'] as $key=>$op){
                        $options[]=[
                            'label'=>$op,
                            'value'=>$key
                        ];
                    }
                    $item['options']=$options;
                    $fields[$field]=$item;
                }
            }
            return response()->json([
                'ok'=>true,
                'data'=>$fields
            ]);
        }
        $model=new $modelClass;
        $fields=[];
        $casts=$model->getCasts();
        foreach($casts as $field=>$cast){
            if(class_exists($cast)){

                $options=[];
                foreach($cast::asSelectArray() as $key=>$op){
                    $options[]=[
                        'label'=>$op,
                        'value'=>$key
                    ];
                }
                $fields[$field]=[
                    'name'=>$field,
                    'options'=>$options,
                    'htmlType'=>'select',
                ];
            }
        }
        return response()->json([
            'ok'=>true,
            'data'=>$fields
        ]);
    }

}

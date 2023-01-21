<?php
namespace Modules\User\Exports;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Panel\Entities\ExportExcel;

class EchoExport extends ExportExcel{
    public function map($item): array
    {
        $row=[];
        //
        foreach($this->fields as $name=>$field){
            $value=isset($item->{$name}) ? $item->{$name}:"";
            if($value instanceof Model){
                $value=$value->{$value::$title};
            }
            if(in_array($field['htmlType'],["select","multi_select","radio"])){
                if(isset($field['options'])){
                    $value=isset($field['options'][$value]) ? $field['options'][$value]:$value;
                }
            }
            if($value instanceof Carbon){
                $value=verta($value)->formatJalaliDatetime();
            }
            $row[]=$value;
        }
        return $row;
    }
    public function query()
    {
        $query=$this->repo->allQuery();
        if(!auth()->user()->master){
            $query=$query->where("user_id",auth()->user()->id);
        }
        return $query;
    }
}

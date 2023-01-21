<?php
namespace Modules\Panel\Traits;

use Illuminate\Support\Facades\Hash;

trait HasPassword{
    public static function boot()
    {
        parent::boot();

        static::saving(function($model)
        {
            $fillables=$model->getFillable();

            foreach($fillables as $fillable){
                if(
                    isset(self::$fields[$fillable]) &&
                    isset(self::$fields[$fillable]['htmlType']) &&
                    self::$fields[$fillable]['htmlType'] == "password"
                    && isset($model->$fillable)
                ) {
                    $model->$fillable=Hash::make($model->$fillable);
                }
            }
        });
    }
}

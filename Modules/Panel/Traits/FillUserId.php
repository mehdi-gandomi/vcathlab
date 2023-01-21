<?php
namespace Modules\Panel\Traits;

use Illuminate\Support\Facades\Hash;

trait FillUserId{
    public static $userIdField="user_id";
    public static $fillUserIdOnUpdate=true;
    public static $fillUserIdOnCreate=true;
    public static function bootFillUserId()
    {
        static::creating(function($model)
        {
            if(auth()->check() && self::fillUserIdOnCreate()){
                $userIdField=self::getUserIdField();
                $model->{$userIdField}=auth()->user()->id;
            }
        });
        static::updating(function($model)
        {
            if(auth()->check() && self::fillUserIdOnUpdate()){
                $userIdField=self::getUserIdField();
                $model->{$userIdField}=auth()->user()->id;
            }
        });
    }
    public static function fillUserIdOnCreate()
    {
        return self::$fillUserIdOnCreate;
    }
    public static function fillUserIdOnUpdate()
    {
        return self::$fillUserIdOnUpdate;
    }
    public static function getUserIdField()
    {
        return self::$userIdField;
    }
}

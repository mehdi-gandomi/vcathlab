<?php

namespace Modules\AccessLevel\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Modules\AccessLevel\Models\Base\UserActivity as Model;



;
/**
 * Class UserActivity
 * @package Modules\AccessLevel\Models
 * @version October 13, 2020, 11:22 am UTC
 *
 * @property string $log_name
 * @property string $description
 * @property integer $subject_id
 * @property string $subject_type
 * @property integer $causer_id
 * @property string $causer_type
 * @property string $system_ip
 * @property string $properties
 * @property string $created_at
 */
class UserActivity extends Model
{
    use FormatesDates;
    use HasRelationships;
    

    public $table = 'activity_log';
    
    
    

    protected $dates = ['created_at'];



    public $fillable = [
        'log_name',
        'description',
        'subject_id',
        'subject_type',
        'causer_id',
        'causer_type',
        'system_ip',
        'properties',
        'created_at'
    ];
    public $with = [
        
    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'log_name' => 'string',
        'description' => 'string',
        'subject_id' => 'integer',
        'subject_type' => 'string',
        'causer_id' => 'integer',
        'causer_type' => 'string',
        'system_ip' => 'string',
        'properties' => 'string'
    ];

   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/accesslevel/api/user_activities';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'log_name' => 'nullable',
        'description' => 'required',
        'subject_id' => 'nullable',
        'subject_type' => 'nullable',
        'causer_id' => 'nullable',
        'causer_type' => 'nullable',
        'system_ip' => 'required',
        'properties' => 'nullable',
        'created_at' => 'nullable'
    ];


    /**
    * All the images fields for model
    *
    * @var array
    */
    public static $imageFields = [
        
    ];

    /**
     * All the file fields for model
     *
     * @var array
     */
    public static $fileFields = [
        
    ];

    /**
     * Flag to disable auto upload
     *
     * @var bool
     */
    public static $disableAutoUpload = true;

    /**
     * Fields
     *
     * @var array
     */
    public static $fields = [
        'log_name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'description'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'subject_id'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'subject_type'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'causer_id'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'causer_type'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'system_ip'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'properties'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            
    ];

    public static $title="description";

    

    public static function allowedFilters(){
        return [
            'log_name'=>'log_name',
        'description'=>'description',
        'subject_id'=>AllowedFilter::exact('subject_id'),
        'subject_type'=>'subject_type',
        'causer_id'=>AllowedFilter::exact('causer_id'),
        'causer_type'=>'causer_type',
        'system_ip'=>'system_ip',
        'properties'=>'properties',
        'created_at'=>'created_at'
        ];
    }
}

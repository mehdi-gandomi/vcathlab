<?php

namespace Modules\AccessLevel\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Modules\AccessLevel\Models\Base\Role as Model;



;
/**
 * Class Role
 * @package Modules\AccessLevel\Models
 * @version October 15, 2020, 8:06 am UTC
 *
 * @property string $name
 * @property string $title
 */
class Role extends Model
{
    use FormatesDates;
    use HasRelationships;
    

    public $table = 'roles';
    
    
    



    public $fillable = [
        'name',
        'title'
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
        'name' => 'string',
        'title' => 'string'
    ];

   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/accesslevel/api/roles';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'nullable'
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
        'name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            ,
        'title'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
            
                ]
            
    ];

    public static $title="title";

    

    public static function allowedFilters(){
        return [
            'name'=>'name',
        'title'=>'title'
        ];
    }
}

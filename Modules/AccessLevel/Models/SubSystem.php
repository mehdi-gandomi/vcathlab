<?php

namespace Modules\AccessLevel\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Modules\AccessLevel\Models\Base\SubSystem as Model;



;
/**
 * Class SubSystem
 * @package Modules\AccessLevel\Models
 * @version October 15, 2020, 8:40 am UTC
 *
 * @property string $title
 * @property string $route
 * @property string $icon_class
 * @property string $header_title
 * @property integer $ordering
 * @property boolean $state
 */
class SubSystem extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'subsystems';






    public $fillable = [
        'title',
        'route',
        'icon_class',
        'header_title',
        'ordering',
        'state'
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
        'title' => 'string',
        'route' => 'string',
        'icon_class' => 'string',
        'header_title' => 'string',
        'ordering' => 'integer',
        'state' => 'boolean'
    ];

   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/accesslevel/api/subsystems';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'route' => 'nullable',
        'icon_class' => 'nullable',
        'header_title' => 'nullable',
        'ordering' => 'required',
        'state' => 'required'
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
        'title'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'route'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'icon_class'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'header_title'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'ordering'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'state'=>[
                'htmlType'=>'checkbox',
                'inIndex'=>1,
                'inForm'=>1,

                ]

    ];

    public static $title="title";



    public static function allowedFilters(){
        return [
            'title'=>'title',
        'route'=>'route',
        'icon_class'=>'icon_class',
        'header_title'=>'header_title',
        'ordering'=>AllowedFilter::exact('ordering'),
        'state'=>AllowedFilter::custom('state',new \Modules\AccessLevel\Filters\State)
        ];
    }
}

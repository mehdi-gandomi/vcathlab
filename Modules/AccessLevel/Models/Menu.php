<?php

namespace Modules\AccessLevel\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Modules\AccessLevel\Models\Base\Menu as Model;



;
/**
 * Class Menu
 * @package Modules\AccessLevel\Models
 * @version October 15, 2020, 8:22 am UTC
 *
 * @property \Modules\AccessLevel\Models\\Modules\AccessLevel\Models\SubSystem $subsystem
 * @property \Modules\AccessLevel\Models\\Modules\AccessLevel\Models\Menu $\Modules\AccessLevel\Models\Menu
 * @property integer $subsystem_id
 * @property integer $menu_id
 * @property string $title
 * @property string $icon_class
 * @property string $route
 * @property integer $ordering
 * @property boolean $open_in_blank
 * @property boolean $open_in_iframe
 * @property string $description
 * @property boolean $state
 */
class Menu extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'menus';






    public $fillable = [
        'subsystem_id',
        'menu_id',
        'title',
        'icon_class',
        'route',
        'ordering',
        'open_in_blank',
        'open_in_iframe',
        'description',
        'state'
    ];
    public $with = [
        'subsystem',
        'menu'
    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'subsystem_id' => 'integer',
        'menu_id' => 'integer',
        'title' => 'string',
        'icon_class' => 'string',
        'route' => 'string',
        'ordering' => 'integer',
        'open_in_blank' => 'boolean',
        'open_in_iframe' => 'boolean',
        'description' => 'string',
        'state' => 'boolean'
    ];

   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/accesslevel/api/menus';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subsystem_id' => 'required',
        'menu_id' => 'nullable',
        'title' => 'required',
        'icon_class' => 'nullable',
        'route' => 'nullable',
        'ordering' => 'required',
        'open_in_blank' => 'required',
        'open_in_iframe' => 'required',
        'description' => 'nullable',
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
        'route'=>[
                'htmlType'=>'text',
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
        'open_in_blank'=>[
                'htmlType'=>'checkbox',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'open_in_iframe'=>[
                'htmlType'=>'checkbox',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'description'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'state'=>[
                'htmlType'=>'checkbox',
                'inIndex'=>1,
                'inForm'=>1,

                ]
            ,
        'subsystem'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'subsystem',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'subsystem_id',
                'relatedClass'=>'\Modules\AccessLevel\Models\SubSystem',
            ]
            ,
        'menu'=>[
                'htmlType'=>'relation',
                'relationType'=>'1t1',
                'functionName'=>'menu',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'menu_id',
                'relatedClass'=>'\Modules\AccessLevel\Models\Menu',
            ]

    ];

    public static $title="title";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subsystem()
    {
        return $this->belongsTo(\Modules\AccessLevel\Models\SubSystem::class, 'subsystem_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function menu()
    {
        return $this->hasOne(\Modules\AccessLevel\Models\Menu::class, 'menu_id', 'id');
    }


    public static function allowedFilters(){
        return [
            'subsystem_id'=>AllowedFilter::exact('subsystem_id'),
        'menu_id'=>AllowedFilter::exact('menu_id'),
        'title'=>'title',
        'icon_class'=>'icon_class',
        'route'=>'route',
        'ordering'=>AllowedFilter::exact('ordering'),
        'open_in_blank'=>AllowedFilter::custom('open_in_blank',new \Modules\AccessLevel\Filters\OpenInBlank),
        'open_in_iframe'=>AllowedFilter::custom('open_in_iframe',new \Modules\AccessLevel\Filters\OpenInIframe),
        'description'=>'description',
        'state'=>AllowedFilter::custom('state',new \Modules\AccessLevel\Filters\State)
        ];
    }
}

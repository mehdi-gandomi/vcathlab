<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class ComplexCaseCategory
 * @package Modules\User\Models
 * @version November 23, 2020, 9:20 pm UTC
 *
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class ComplexCaseCategory extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'complex_case_categories';



    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'name',
        'parent_id',
        'created_at',
        'updated_at'
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
        'name' => 'string'
    ];
    public static $dateFormats = [

                    'created_at'=>'Y-m-d H:i'
                ,

                    'updated_at'=>'Y-m-d H:i'

    ];
   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/user/api/complex_case_categories';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
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
                'title'=>'Name',

                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Created At',

                ]
            ,
        'updated_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Updated At',

                ]

    ];

    public static $title="name";



    public static function allowedFilters(){
        return [
            'name'=>'name',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public function parent()
    {
        return $this->belongsTo(ComplexCaseCategory::class,"parent_id");
    }
    public function children()
    {
        return $this->hasMany(ComplexCaseCategory::class,"parent_id");
    }
}

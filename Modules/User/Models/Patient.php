<?php

namespace Modules\User\Models;

use App\Models\User;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\User\Enums\Sex;

;
/**
 * Class Patient
 * @package Modules\User\Models
 * @version November 23, 2020, 8:23 pm UTC
 *
 * @property string $name
 * @property integer $age
 * @property tinyInteger $sex
 * @property string $hospital
 * @property string $created_at
 * @property string $updated_at
 */
class Patient extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'patients';






    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'name',
        'age',
        'sex',
        'user_id',
        'phone_verified',
        'phone',
        'hospital',
        'created_at',
        'updated_at'
    ];
    public $with = [

    ];
    public $appends = [
        "computed_sex"
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'age' => 'integer',
        'sex' => 'integer',
        'hospital' => 'string'
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
    public static $api_route = '/user/api/patients';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'age' => 'required',
        'sex' => 'required',
        'hospital' => 'nullable'
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
        'age'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Age',

                ]
            ,
        'sex'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Sex',

                    'options'=>[

                '1'=>'Male',

                '2'=>'Female',

                    ],

                ]
            ,
        'hospital'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hospital',

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
        'age'=>AllowedFilter::exact('age'),
        'sex'=>AllowedFilter::custom('sex',new \Modules\User\Filters\Patient\Sex),
        'hospital'=>'hospital',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public function getComputedSexAttribute()
    {
        return Sex::getDescription($this->attributes['sex']);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

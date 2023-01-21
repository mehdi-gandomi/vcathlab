<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class ComputationCenter
 * @package Modules\User\Models
 * @version October 14, 2022, 11:13 am +0330
 *
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property \Modules\User\Models\\App\Models\User $user
 * @property integer $user_id
 * @property integer $patient_id
 * @property string $name
 * @property string $physician
 * @property string $hospital
 * @property integer $age
 * @property tinyInteger $sex
 * @property string $mobile
 * @property string $created_at
 * @property string $updated_at
 */
class ComputationCenter extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'computation_center';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'user_id',
        'patient_id',
        // 'name',
        // 'physician',
        // 'hospital',
        // 'age',
        // 'sex',
        'patient_procedure',
        'physician',
        'created_at',
        'updated_at'
    ];
    public $with = [
        'patient',
        'user'
    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'patient_id' => 'integer',
        'name' => 'string',
        'physician' => 'string',
        'hospital' => 'string',
        'age' => 'integer',
        'sex' => 'integer',
        'mobile' => 'string'
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
    public static $api_route = '/user/api/computation_centers';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'name' => 'required',
        // 'physician' => 'required',
        // 'hospital' => 'required',
        // 'age' => 'required',
        // 'sex' => 'nullable',
        // 'mobile' => 'required'
        'patient_procedure'=>'required',
        'patient_id'=>'required'
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
                'name'=>'name',

                ]
            ,
        'physician'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Physician',
                'name'=>'physician',

                ]
            ,
        'hospital'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hospital',
                'name'=>'hospital',

                ]
            ,
        'age'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Age',
                'name'=>'age',

                ]
            ,
        'sex'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Sex',
                'name'=>'sex',

                ]
            ,
        'mobile'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Mobile',
                'name'=>'mobile',

                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Created At',
                'name'=>'created_at',

                ]
            ,
        'updated_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Updated At',
                'name'=>'updated_at',

                ]
            ,
        'patient'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'patient',
                'name'=>'patient',
                'title'=>'patient',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'patient_id',
                'relatedClass'=>'\Modules\User\Models\Patient',
            ]
            ,
        'user'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'user',
                'name'=>'user',
                'title'=>'user',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'user_id',
                'relatedClass'=>'\App\Models\User',
            ]

    ];

    public static $title="id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\Modules\User\Models\Patient::class, 'patient_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


    public static function allowedFilters(){
        return [
            'user_id'=>AllowedFilter::exact('user_id'),
        'patient_id'=>AllowedFilter::exact('patient_id'),
        'name'=>'name',
        'physician'=>'physician',
        'hospital'=>'hospital',
        'age'=>AllowedFilter::exact('age'),
        'sex'=>AllowedFilter::custom('sex',new \Modules\User\Filters\ComputationCenter\Sex),
        'mobile'=>'mobile',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            'patient',
        'user'
        ];
    }
    public static function allowedSorts(){
        return [
            'user_id',
        'patient_id',
        'name',
        'physician',
        'hospital',
        'age',
        'sex',
        'mobile',
        'created_at',
        'updated_at'
        ];
    }
    // public function getComputedProcedureAttribute()
    // {
    //     // patient_procedure
    // }
}

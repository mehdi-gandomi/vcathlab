<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class MaceAssesment
 * @package Modules\User\Models
 * @version December 15, 2021, 8:19 pm +0330
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property integer $patient_id
 * @property integer $user_id
 * @property string $HbA1C
 * @property string $LDL_cholesterol
 * @property string $HDL_cholesterol
 * @property tinyInteger $Age
 * @property string $SBP
 * @property string $Triglycerides
 * @property string $DBP
 * @property string $LeftAnklebrachialIndex
 * @property string $RightAnklebrachialIndex
 * @property string $Heigth
 * @property string $Weigth
 * @property tinyInteger $Sex
 * @property string $Smoker
 * @property string $TBP
 * @property string $MI
 * @property string $Diabetes
 * @property string $FH
 * @property string $THL
 * @property string $created_at
 * @property string $updated_at
 */
class MaceAssesment extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'mace_assesments';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'patient_id',
        'user_id',
        'HbA1C',
        'LDL_cholesterol',
        'HDL_cholesterol',
        'Age',
        'SBP',
        'Triglycerides',
        'DBP',
        'LeftAnklebrachialIndex',
        'RightAnklebrachialIndex',
        'LeftAnklePressure',
        'RightAnklePressure',
        'Heigth',
        'Weigth',
        'Sex',
        'Smoker',
        'TBP',
        'MI',
        'Diabetes',
        'FH',
        'THL',
        'risk_factors',
        'history',
        'physical_activity',
        'drug_information',
        'symptom',
        'ptp_of_cad_clicked',
        'abi_clicked',
        'screening_test_clicked',
        'total_clicked',
        'Parental_hypertension',
        'created_at',
        'updated_at'
    ];
    public $with = [
        'user',
        'patient'
    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'patient_id' => 'integer',
        'user_id' => 'integer',
        'HbA1C' => 'string',
        'LDL_cholesterol' => 'string',
        'HDL_cholesterol' => 'string',
        'Age' => 'integer',
        'SBP' => 'string',
        'Triglycerides' => 'string',
        'DBP' => 'string',
        'LeftAnklebrachialIndex' => 'string',
        'RightAnklebrachialIndex' => 'string',
        'Heigth' => 'string',
        'Weigth' => 'string',
        'Sex' => 'integer',
        'Smoker' => 'string',
        'TBP' => 'string',
        'MI' => 'string',
        'Diabetes' => 'string',
        'FH' => 'string',
        'THL' => 'string',
        'risk_factors'=>'array',
        'history'=>'array',
        'physical_activity'=>'array',
        'drug_information'=>'array',
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
    public static $api_route = '/user/api/mace_assesments';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'HbA1C' => 'required',
        'LDL_cholesterol' => 'required',
        'HDL_cholesterol' => 'required',
        'Age' => 'required',
        'SBP' => 'required',
        'Triglycerides' => 'required',
        'DBP' => 'required',
        'LeftAnklebrachialIndex' => 'required',
        'RightAnklebrachialIndex' => 'required',
        'Heigth' => 'required',
        'Weigth' => 'required',
        'Sex' => 'required',
        'Smoker' => 'required',
        'TBP' => 'required',
        'MI' => 'required',
        'Diabetes' => 'required',
        'FH' => 'required',
        'THL' => 'required'
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
        'HbA1C'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hb A1 C',
                'name'=>'HbA1C',

                ]
            ,
        'LDL_cholesterol'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L D L Cholesterol',
                'name'=>'LDL_cholesterol',

                ]
            ,
        'HDL_cholesterol'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'H D L Cholesterol',
                'name'=>'HDL_cholesterol',

                ]
            ,
        'Age'=>[
                'htmlType'=>'number',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Age',
                'name'=>'Age',

                ]
            ,
        'SBP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'S B P',
                'name'=>'SBP',

                ]
            ,
        'Triglycerides'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Triglycerides',
                'name'=>'Triglycerides',

                ]
            ,
        'DBP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'D B P',
                'name'=>'DBP',

                ]
            ,
        'LeftAnklebrachialIndex'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Left Anklebrachial Index',
                'name'=>'LeftAnklebrachialIndex',

                ]
            ,
        'RightAnklebrachialIndex'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Right Anklebrachial Index',
                'name'=>'RightAnklebrachialIndex',

                ]
            ,
        'Heigth'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Heigth',
                'name'=>'Heigth',

                ]
            ,
        'Weigth'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Weigth',
                'name'=>'Weigth',

                ]
            ,
        'Sex'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Sex',
                'name'=>'Sex',

                ]
            ,
        'Smoker'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Smoker',
                'name'=>'Smoker',

                ]
            ,
        'TBP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'T B P',
                'name'=>'TBP',

                ]
            ,
        'MI'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'M I',
                'name'=>'MI',

                ]
            ,
        'Diabetes'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Diabetes',
                'name'=>'Diabetes',

                ]
            ,
        'FH'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'F H',
                'name'=>'FH',

                ]
            ,
        'THL'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'T H L',
                'name'=>'THL',

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

    ];

    public static $title="id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\Modules\User\Models\Patient::class, 'patient_id', 'id');
    }


    public static function allowedFilters(){
        return [
            'patient_id'=>AllowedFilter::exact('patient_id'),
        'user_id'=>AllowedFilter::exact('user_id'),
        'HbA1C'=>'HbA1C',
        'LDL_cholesterol'=>'LDL_cholesterol',
        'HDL_cholesterol'=>'HDL_cholesterol',
        'Age'=>AllowedFilter::exact('Age'),
        'SBP'=>'SBP',
        'Triglycerides'=>'Triglycerides',
        'DBP'=>'DBP',
        'LeftAnklebrachialIndex'=>'LeftAnklebrachialIndex',
        'RightAnklebrachialIndex'=>'RightAnklebrachialIndex',
        'Heigth'=>'Heigth',
        'Weigth'=>'Weigth',
        'Sex'=>AllowedFilter::custom('Sex',new \Modules\User\Filters\MaceAssesment\Sex),
        'Smoker'=>'Smoker',
        'TBP'=>'TBP',
        'MI'=>'MI',
        'Diabetes'=>'Diabetes',
        'FH'=>'FH',
        'THL'=>'THL',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            'user',
        'patient'
        ];
    }
    public static function allowedSorts(){
        return [
            'patient_id',
        'user_id',
        'HbA1C',
        'LDL_cholesterol',
        'HDL_cholesterol',
        'Age',
        'SBP',
        'Triglycerides',
        'DBP',
        'LeftAnklebrachialIndex',
        'RightAnklebrachialIndex',
        'Heigth',
        'Weigth',
        'Sex',
        'Smoker',
        'TBP',
        'MI',
        'Diabetes',
        'FH',
        'THL',
        'created_at',
        'updated_at'
        ];
    }
}

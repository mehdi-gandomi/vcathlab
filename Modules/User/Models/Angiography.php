<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class Angiography
 * @package Modules\User\Models
 * @version October 13, 2022, 9:35 pm +0330
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property string $Cr
 * @property string $Ht
 * @property string $LVEF
 * @property string $HR
 * @property string $Contrast
 * @property string $Hb
 * @property string $PTP
 * @property string $CAVI
 * @property string $WBC
 * @property string $PriorCABG
 * @property string $PriorPCI
 * @property string $HbA1C
 * @property string $patient_id
 * @property integer $user_id
 * @property string $Age
 * @property string $SBP
 * @property string $DBP
 * @property string $Height
 * @property string $Weight
 * @property tinyInteger $Sex
 * @property string $pribleed
 * @property string $Hypotension
 * @property string $heart_failure
 * @property string $Diabet
 * @property string $Acute_MI
 * @property string $IABP
 * @property string $Smoker
 * @property string $created_at
 * @property string $updated_at
 */
class Angiography extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'angiographies';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'Cr',
        'Ht',
        'LVEF',
        'HR',
        'Contrast',
        'Hb',
        'PTP',
        'CAVI',
        'WBC',
        'PriorCABG',
        'PriorPCI',
        'HbA1C',
        'patient_id',
        'user_id',
        'Age',
        'SBP',
        'DBP',
        'Height',
        'Weight',
        'Sex',
        'pribleed',
        'Hypotension',
        'heart_failure',
        'Diabet',
        'Acute_MI',
        'IABP',
        'Smoker',
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
        'Cr' => 'string',
        'Ht' => 'string',
        'LVEF' => 'string',
        'HR' => 'string',
        'Contrast' => 'string',
        'Hb' => 'string',
        'PTP' => 'string',
        'CAVI' => 'string',
        'WBC' => 'string',
        'PriorCABG' => 'string',
        'PriorPCI' => 'string',
        'HbA1C' => 'string',
        'patient_id' => 'string',
        'user_id' => 'integer',
        'Age' => 'string',
        'SBP' => 'string',
        'DBP' => 'string',
        'Height' => 'string',
        'Weight' => 'string',
        'Sex' => 'integer',
        'pribleed' => 'string',
        'Hypotension' => 'string',
        'heart_failure' => 'string',
        'Diabet' => 'string',
        'Acute_MI' => 'string',
        'IABP' => 'string',
        'Smoker' => 'string'
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
    public static $api_route = '/user/api/angiographies';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Cr' => 'required',
        'Ht' => 'required',
        'LVEF' => 'required',
        'HR' => 'required',
        'Contrast' => 'required',
        'Hb' => 'required',
        'PTP' => 'required',
        'CAVI' => 'required',
        'WBC' => 'required',
        'PriorCABG' => 'required',
        'PriorPCI' => 'required',
        'HbA1C' => 'required',
        'patient_id' => 'required',
        'user_id' => 'nullable',
        'Age' => 'required',
        'SBP' => 'required',
        'DBP' => 'required',
        'Height' => 'required',
        'Weight' => 'required',
        'Sex' => 'required',
        'pribleed' => 'required',
        'Hypotension' => 'required',
        'heart_failure' => 'required',
        'Diabet' => 'required',
        'Acute_MI' => 'required',
        'IABP' => 'required',
        'Smoker' => 'required'
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
        'Cr'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Cr',
                'name'=>'Cr',

                ]
            ,
        'Ht'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Ht',
                'name'=>'Ht',

                ]
            ,
        'LVEF'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L V E F',
                'name'=>'LVEF',

                ]
            ,
        'HR'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'H R',
                'name'=>'HR',

                ]
            ,
        'Contrast'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Contrast',
                'name'=>'Contrast',

                ]
            ,
        'Hb'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hb',
                'name'=>'Hb',

                ]
            ,
        'PTP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'P T P',
                'name'=>'PTP',

                ]
            ,
        'CAVI'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'C A V I',
                'name'=>'CAVI',

                ]
            ,
        'WBC'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'W B C',
                'name'=>'WBC',

                ]
            ,
        'PriorCABG'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Prior C A B G',
                'name'=>'PriorCABG',

                ]
            ,
        'PriorPCI'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Prior P C I',
                'name'=>'PriorPCI',

                ]
            ,
        'HbA1C'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hb A1 C',
                'name'=>'HbA1C',

                ]
            ,
        'Age'=>[
                'htmlType'=>'text',
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
        'DBP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'D B P',
                'name'=>'DBP',

                ]
            ,
        'Height'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Height',
                'name'=>'Height',

                ]
            ,
        'Weight'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Weight',
                'name'=>'Weight',

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
        'pribleed'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Pribleed',
                'name'=>'pribleed',

                ]
            ,
        'Hypotension'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hypotension',
                'name'=>'Hypotension',

                ]
            ,
        'heart_failure'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Heart Failure',
                'name'=>'heart_failure',

                ]
            ,
        'Diabet'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Diabet',
                'name'=>'Diabet',

                ]
            ,
        'Acute_MI'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Acute  M I',
                'name'=>'Acute_MI',

                ]
            ,
        'IABP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'I A B P',
                'name'=>'IABP',

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
            'Cr'=>'Cr',
        'Ht'=>'Ht',
        'LVEF'=>'LVEF',
        'HR'=>'HR',
        'Contrast'=>'Contrast',
        'Hb'=>'Hb',
        'PTP'=>'PTP',
        'CAVI'=>'CAVI',
        'WBC'=>'WBC',
        'PriorCABG'=>'PriorCABG',
        'PriorPCI'=>'PriorPCI',
        'HbA1C'=>'HbA1C',
        'patient_id'=>'patient_id',
        'user_id'=>AllowedFilter::exact('user_id'),
        'Age'=>'Age',
        'SBP'=>'SBP',
        'DBP'=>'DBP',
        'Height'=>'Height',
        'Weight'=>'Weight',
        'Sex'=>AllowedFilter::custom('Sex',new \Modules\User\Filters\Angiography\Sex),
        'pribleed'=>'pribleed',
        'Hypotension'=>'Hypotension',
        'heart_failure'=>'heart_failure',
        'Diabet'=>'Diabet',
        'Acute_MI'=>'Acute_MI',
        'IABP'=>'IABP',
        'Smoker'=>'Smoker',
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
            'Cr',
        'Ht',
        'LVEF',
        'HR',
        'Contrast',
        'Hb',
        'PTP',
        'CAVI',
        'WBC',
        'PriorCABG',
        'PriorPCI',
        'HbA1C',
        'patient_id',
        'user_id',
        'Age',
        'SBP',
        'DBP',
        'Height',
        'Weight',
        'Sex',
        'pribleed',
        'Hypotension',
        'heart_failure',
        'Diabet',
        'Acute_MI',
        'IABP',
        'Smoker',
        'created_at',
        'updated_at'
        ];
    }
}

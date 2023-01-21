<?php

namespace Modules\User\Models;

use App\Models\User;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\Panel\Traits\FillUserId;
use Modules\User\Filters\NIFFRCase\CreatedAt;

/**
 * Class NIFFRCase
 * @package Modules\User\Models
 * @version November 25, 2020, 5:53 pm UTC
 *
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property integer $patient_id
 * @property string $file
 * @property string $created_at
 * @property string $updated_at
 * @property string $patient.name
 * @property string $patient.age
 * @property string $patient.hospital
 */
class NIFFRCase extends Model
{
    use FormatesDates;
    use HasRelationships;
    use FillUserId;

    public static function fillUserIdOnUpdate()
    {
        return false;
    }

    public $table = 'niffr_cases';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'patient_id',
        'user_id',
        "physician"
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
        'patient_id' => 'integer',
        'file' => 'string',
        'result'=>'array'
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
    public static $api_route = '/user/api/niffr_cases';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'patient_id'=>'required',
        // 'map'=>'required',
        // 'points'=>'required|array'
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
        'result_file'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'File',
                'name'=>'file',

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
        'patient.name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Patient',
                'name'=>'patient.name',

                ]
            ,
        'patient.age'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Age',
                'name'=>'patient.age',

                ]
            ,
        'patient.hospital'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hospital',
                'name'=>'patient.hospital',

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
    public function patient()
    {
        return $this->belongsTo(\Modules\User\Models\Patient::class, 'patient_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function points()
    {
        return $this->hasMany(NIFFRCaseData::class,'niffr_case_id',"id");
    }
    public static function allowedFilters(){
        return [
        'patient_id'=>AllowedFilter::exact('patient_id'),
        'file'=>'file',
        'created_at'=>AllowedFilter::custom("created_at",new CreatedAt),
        'updated_at'=>'updated_at',
        'patient.name'=>'patient.name',
        'user.name'=>'user.name',
        'patient.age'=>'patient.age',
        'patient.hospital'=>'patient.hospital'
        ];
    }
    public static function allowedSorts(){
        return [
        'patient_id',
        'file',
        'created_at',
        'updated_at',
        'patient.name',
        'user.name',
        'patient.age',
        'patient.hospital'
        ];
    }
}

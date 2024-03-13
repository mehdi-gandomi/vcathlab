<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class ImtCalculation
 * @package Modules\User\Models
 * @version June 4, 2023, 1:59 pm +0330
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property integer $user_id
 * @property integer $patient_id
 * @property string $LCIMT
 * @property string $RCIMT
 * @property string $created_at
 * @property string $updated_at
 */
class ImtCalculation extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'imt_calculations';




    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'user_id',
        'patient_id',
        'LCIMT',
        'RCIMT',
        'created_at',
        'updated_at',
        'RICA',
        'RECA',
        'RCCA',
        'LICA',
        'LECA',
        'LCCA'
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
        'user_id' => 'integer',
        'patient_id' => 'integer',
        'LCIMT' => 'string',
        'RCIMT' => 'string'
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
    public static $api_route = '/user/api/imt_calculations';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'LCIMT' => 'required',
        // 'RCIMT' => 'required'
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
        'LCIMT'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L C I M T',
                'name'=>'LCIMT',

                ]
            ,
        'RCIMT'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'R C I M T',
                'name'=>'RCIMT',

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
            'user_id'=>AllowedFilter::exact('user_id'),
        'patient_id'=>AllowedFilter::exact('patient_id'),
        'LCIMT'=>'LCIMT',
        'RCIMT'=>'RCIMT',
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
            'user_id',
        'patient_id',
        'LCIMT',
        'RCIMT',
        'created_at',
        'updated_at'
        ];
    }
}

<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class BodyComposition
 * @package Modules\User\Models
 * @version December 30, 2022, 3:59 pm +0330
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property \Modules\User\Models\\Modules\User\Models\Patient $patient
 * @property integer $patient_id
 * @property integer $user_id
 * @property string $Age
 * @property tinyInteger $Sex
 * @property string $Waist
 * @property string $SMM
 * @property string $VFP
 * @property string $Height
 * @property string $Weight
 * @property string $Hip
 * @property string $BFMP
 * @property string $created_at
 * @property string $updated_at
 */
class BodyComposition extends Model
{
    use FormatesDates;
    use HasRelationships;
    

    public $table = 'body_compositions';
    
    
    

    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'patient_id',
        'user_id',
        'Age',
        'Sex',
        'Waist',
        'SMM',
        'VFP',
        'Height',
        'Weight',
        'Hip',
        'BFMP',
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
        'Age' => 'string',
        'Sex' => 'integer',
        'Waist' => 'string',
        'SMM' => 'string',
        'VFP' => 'string',
        'Height' => 'string',
        'Weight' => 'string',
        'Hip' => 'string',
        'BFMP' => 'string'
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
    public static $api_route = '/user/api/body_compositions';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Age' => 'required',
        'Sex' => 'required',
        'Waist' => 'nullable',
        'SMM' => 'nullable',
        'VFP' => 'nullable',
        'Height' => 'nullable',
        'Weight' => 'nullable',
        'Hip' => 'nullable',
        'BFMP' => 'nullable'
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
        'Age'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Age',
                'name'=>'Age',
            
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
        'Waist'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Waist',
                'name'=>'Waist',
            
                ]
            ,
        'SMM'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'S M M',
                'name'=>'SMM',
            
                ]
            ,
        'VFP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'V F P',
                'name'=>'VFP',
            
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
        'Hip'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Hip',
                'name'=>'Hip',
            
                ]
            ,
        'BFMP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'B F M P',
                'name'=>'BFMP',
            
                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Created At',
                'name'=>'created_at',
            
                ]
            ,
        'updated_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>0,
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
        'Age'=>'Age',
        'Sex'=>AllowedFilter::custom('Sex',new \Modules\User\Filters\BodyComposition\Sex),
        'Waist'=>'Waist',
        'SMM'=>'SMM',
        'VFP'=>'VFP',
        'Height'=>'Height',
        'Weight'=>'Weight',
        'Hip'=>'Hip',
        'BFMP'=>'BFMP',
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
        'Age',
        'Sex',
        'Waist',
        'SMM',
        'VFP',
        'Height',
        'Weight',
        'Hip',
        'BFMP',
        'created_at',
        'updated_at'
        ];
    }
}

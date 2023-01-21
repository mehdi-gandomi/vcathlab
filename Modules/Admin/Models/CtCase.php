<?php

namespace Modules\Admin\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;


;
/**
 * Class CtCase
 * @package Modules\Admin\Models
 * @version November 26, 2020, 8:25 am UTC
 *
 * @property \Modules\Admin\Models\\Modules\User\Models\Patient $patient
 * @property integer $patient_id
 * @property string $ct_file
 * @property string $result_file
 * @property string $created_at
 * @property string $updated_at
 * @property string $patient.name
 * @property string $patient.age
 * @property string $patient.hospital
 */
class CtCase extends Model
{
    use FormatesDates;
    use HasRelationships;
    use HasImageUploads;

    public $table = 'ct_cases';
    
    
    
    public $timestamps = false;


    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'patient_id',
        'ct_file',
        'result_file',
        'created_at',
        'updated_at',
        'patient.name',
        'patient.age',
        'patient.hospital'
    ];
    public $with = [
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
        'patient.name' => 'string',
        'patient.age' => 'string',
        'patient.hospital' => 'string'
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
    public static $api_route = '/admin/api/ct_cases';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ct_file' => 'required',
        'result_file' => 'nullable',
        'patient.name' => 'required',
        'patient.age' => 'required',
        'patient.hospital' => 'required'
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
        'ct_file'=>[],
        'result_file'=>[]
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
        'ct_file'=>[
                'htmlType'=>'filepond',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Ct File',
                'name'=>'ct_file',
            
                    'filepond_options'=>[
                        
                'label-idle'=>'Drag & Drop your files',
            
                'allow-multiple'=>false,
            
                'instant-upload'=>true,
            
                    ],
                
                ]
            ,
        'result_file'=>[
                'htmlType'=>'filepond',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Result File',
                'name'=>'result_file',
            
                    'filepond_options'=>[
                        
                'label-idle'=>'Drag & Drop your files',
            
                'allow-multiple'=>false,
            
                'instant-upload'=>true,
            
                    ],
                
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


    public static function allowedFilters(){
        return [
            'patient_id'=>AllowedFilter::exact('patient_id'),
        'ct_file'=>'ct_file',
        'result_file'=>'result_file',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at',
        'patient.name'=>'patient.name',
        'patient.age'=>'patient.age',
        'patient.hospital'=>'patient.hospital'
        ];
    }
}

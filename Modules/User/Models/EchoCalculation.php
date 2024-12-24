<?php

namespace Modules\User\Models;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;



;
/**
 * Class EchoCalculation
 * @package Modules\User\Models
 * @version December 22, 2021, 4:45 pm +0330
 *
 * @property \Modules\User\Models\\App\Models\User $user
 * @property integer $user_id
 * @property string $LVEDD
 * @property string $LVESD
 * @property string $IVSD
 * @property string $DBP
 * @property string $PWTD
 * @property string $TAPSE
 * @property string $PAP
 * @property string $SBP
 * @property string $LVEF
 * @property string $Weight
 * @property string $Height
 * @property string $HR
 * @property json $conditions
 * @property string $created_at
 * @property string $updated_at
 */
class EchoCalculation extends Model
{
    use FormatesDates;
    use HasRelationships;


    public $table = 'echo_calculations';



    protected $dates = ['created_at','updated_at'];



    public $fillable = [
        'user_id',
        'LVEDD',
        'LVESD',
        'IVSD',
        'DBP',
        'PWTD',
        'TAPSE',
        'PAP',
        'SBP',
        'LVEF',
        'Weight',
        'Height',
        'HR',
        'patient_id',
        'conditions',
        'result',
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
        'user_id' => 'integer',
        'LVEDD' => 'string',
        'LVESD' => 'string',
        'IVSD' => 'string',
        'DBP' => 'string',
        'PWTD' => 'string',
        'TAPSE' => 'string',
        'PAP' => 'string',
        'SBP' => 'string',
        'LVEF' => 'string',
        'Weight' => 'string',
        'Height' => 'string',
        'HR' => 'string',
        'conditions'=>'array',
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
    public static $api_route = '/user/api/echo_calculations';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'LVEDD' => 'required',
        'LVESD' => 'required',
        'IVSD' => 'required',
        'DBP' => 'required',
        'PWTD' => 'required',
        'TAPSE' => 'required',
        'PAP' => 'required',
        'SBP' => 'required',
        'LVEF' => 'required',
        'Weight' => 'required',
        'Height' => 'required',
        'HR' => 'required',
        'conditions' => 'required'
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
        'LVEDD'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L V E D D',
                'name'=>'LVEDD',

                ]
            ,
        'LVESD'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L V E S D',
                'name'=>'LVESD',

                ]
            ,
        'IVSD'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'I V S D',
                'name'=>'IVSD',

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
        'PWTD'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'P W T D',
                'name'=>'PWTD',

                ]
            ,
        'TAPSE'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'T A P S E',
                'name'=>'TAPSE',

                ]
            ,
        'PAP'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'P A P',
                'name'=>'PAP',

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
        'LVEF'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'L V E F',
                'name'=>'LVEF',

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
        'Height'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Height',
                'name'=>'Height',

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
        'conditions'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Conditions',
                'name'=>'conditions',

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

    ];

    public static $title="id";

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
        'LVEDD'=>'LVEDD',
        'LVESD'=>'LVESD',
        'IVSD'=>'IVSD',
        'DBP'=>'DBP',
        'PWTD'=>'PWTD',
        'TAPSE'=>'TAPSE',
        'PAP'=>'PAP',
        'SBP'=>'SBP',
        'LVEF'=>'LVEF',
        'Weight'=>'Weight',
        'Height'=>'Height',
        'HR'=>'HR',
        'conditions'=>'conditions',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at'
        ];
    }
    public static function allowedIncludes(){
        return [
            'user'
        ];
    }
    public static function allowedSorts(){
        return [
            'user_id',
        'LVEDD',
        'LVESD',
        'IVSD',
        'DBP',
        'PWTD',
        'TAPSE',
        'PAP',
        'SBP',
        'LVEF',
        'Weight',
        'Height',
        'HR',
        'conditions',
        'created_at',
        'updated_at'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patient()
    {
        return $this->belongsTo(\Modules\User\Models\Patient::class, 'patient_id', 'id');
    }
}

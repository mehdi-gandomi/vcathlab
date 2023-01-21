<?php

namespace Modules\Admin\Models;

use BenSampo\Enum\Traits\CastsEnums;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;
use Modules\Comment\Traits\HasComments;
use Modules\User\Enums\Specialty;

;
/**
 * Class User
 * @package Modules\Admin\Models
 * @version November 22, 2020, 11:04 am UTC
 *
 * @property \Modules\Admin\Models\\Modules\Place\Models\City $city
 * @property \Modules\Admin\Models\\Modules\Place\Models\Province $province
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $state
 * @property tinyInteger $province_id
 * @property integer $city_id
 * @property string $country
 * @property tinyInteger $profession
 * @property tinyInteger $specialty
 * @property string $mobile
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $two_factor_secret
 * @property string $two_factor_recovery_codes
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property tinyInteger $ticketit_admin
 * @property tinyInteger $ticketit_agent
 */
class User extends Model
{
    use FormatesDates;
    use HasRelationships;
    use CastsEnums;
    use HasComments;
use HasImageUploads;
    public $table = 'users';






    protected $dates = ['email_verified_at','created_at','updated_at'];



    public $fillable = [
        'username',
        'first_name',
        'last_name',
        'avatar',
        'state',
        'province_id',
        'city_id',
        'country',
        'profession',
        'specialty',
        'mobile',
        'email',
        'email_verified_at',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
        'created_at',
        'updated_at',
        'ticketit_admin',
        'ticketit_agent'
    ];
    public $with = [
        'city',
        'province'
    ];
    // public $appends = [

    // ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'username' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'state' => 'string',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'country' => 'string',
        'profession' => 'integer',
        "specialty"=>Specialty::class,

        'mobile' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'two_factor_secret' => 'string',
        'two_factor_recovery_codes' => 'string',
        'remember_token' => 'string',
        'ticketit_admin' => 'integer',
        'ticketit_agent' => 'integer'
    ];
    public static $dateFormats = [

                    'email_verified_at'=>'Y-m-d H:i'
                ,

                    'created_at'=>'Y-m-d H:i'
                ,

                    'updated_at'=>'Y-m-d H:i'

    ];
   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/admin/api/users';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username' => 'nullable',
        'first_name' => 'required',
        'last_name' => 'required',
        'state' => 'nullable',
        'country' => 'nullable',
        'profession' => 'required',
        'specialty' => 'required',
        'mobile' => 'nullable',
        'email' => 'required',
        'email_verified_at' => 'nullable',
        'password' => 'required',
        'two_factor_secret' => 'nullable',
        'two_factor_recovery_codes' => 'nullable',
        'remember_token' => 'nullable'
    ];


    /**
    * All the images fields for model
    *
    * @var array
    */
    public static $imageFields = [
        'avatar'
    ];
    public $imagesUploadDisk="public";
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
        'username'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Username',

                ]
            ,
        'first_name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'First Name',

                ]
            ,
        'last_name'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Last Name',

                ]
            ,
        'state'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'State',

                ]
            ,
        'country'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Country',

                ]
            ,
        'profession'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Profession',

                    'options'=>[

                '1'=>'Fellow',

                '2'=>'Medical student',

                '3'=>'Physician',

                '4'=>'Physician assistant',

                '5'=>'Resident',

                '6'=>'Other',

                    ],

                ]
            ,
        'specialty'=>[
                'htmlType'=>'select',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Specialty',

                    'options'=>[

                '1'=>'General cardiologist',

                '2'=>'Interventional cardiologist',

                '3'=>'Interventional radilogist',

                '4'=>'Interventionalelectrophysiologist',

                '5'=>'Other',

                    ],

                ]
            ,
        'mobile'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Mobile',

                ]
            ,
        'email'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Email',

                ]
            ,
        'email_verified_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Email Verified At',

                ]
            ,
        'password'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Password',

                ]
            ,
        'two_factor_secret'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Two Factor Secret',

                ]
            ,
        'two_factor_recovery_codes'=>[
                'htmlType'=>'textarea',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Two Factor Recovery Codes',

                ]
            ,
        'remember_token'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Remember Token',

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
            ,
        'ticketit_admin'=>[
                'htmlType'=>'radio',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Ticketit Admin',

                ]
            ,
        'ticketit_agent'=>[
                'htmlType'=>'radio',
                'inIndex'=>0,
                'inForm'=>0,
                'title'=>'Ticketit Agent',

                ]
            ,
        'city'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'city',
                'title'=>'city',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'city_id',
                'relatedClass'=>'\Modules\Place\Models\City',
            ]
            ,
        'province'=>[
                'htmlType'=>'relation',
                'relationType'=>'mt1',
                'functionName'=>'province',
                'title'=>'province',
                'inIndex'=>1,
                'inForm'=>1,
                'foreignKey'=>'province_id',
                'relatedClass'=>'\Modules\Place\Models\Province',
            ]

    ];

    public static $title="id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(\Modules\Place\Models\City::class, 'city_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function province()
    {
        return $this->belongsTo(\Modules\Place\Models\Province::class, 'province_id', 'id');
    }


    public static function allowedFilters(){
        return [
            'username'=>'username',
        'first_name'=>'first_name',
        'last_name'=>'last_name',
        'state'=>'state',
        'province_id'=>AllowedFilter::custom('province_id',new \Modules\Admin\Filters\User\ProvinceId),
        'city_id'=>AllowedFilter::exact('city_id'),
        'country'=>'country',
        'profession'=>AllowedFilter::custom('profession',new \Modules\Admin\Filters\User\Profession),
        'specialty'=>AllowedFilter::custom('specialty',new \Modules\Admin\Filters\User\Specialty),
        'mobile'=>'mobile',
        'email'=>'email',
        'email_verified_at'=>'email_verified_at',
        'password'=>'password',
        'two_factor_secret'=>'two_factor_secret',
        'two_factor_recovery_codes'=>'two_factor_recovery_codes',
        'remember_token'=>'remember_token',
        'created_at'=>'created_at',
        'updated_at'=>'updated_at',
        'ticketit_admin'=>AllowedFilter::custom('ticketit_admin',new \Modules\Admin\Filters\User\TicketitAdmin),
        'ticketit_agent'=>AllowedFilter::custom('ticketit_agent',new \Modules\Admin\Filters\User\TicketitAgent)
        ];
    }
    public function complex_cases()
    {
        return $this->hasMany(ComplexCase::class);
    }
    public function getAvatarAttribute()
    {
        return isset($this->attributes['avatar']) && $this->attributes['avatar'] ?$this->attributes['avatar']: "/images/avatar_generic_118.png";
    }
     /**
     * update the model field
     *
     * @param $imagePath
     * @param $imageFieldName
     */
    public function updateModel($imagePath, $imageFieldName)
    {
        if($this->getImageUploadDisk() == "public"){
            $imagePath="storage/".$imagePath;
        }
        $this->{$imageFieldName} = $imagePath;

        $dispatcher = $this->getEventDispatcher();
        self::unsetEventDispatcher();
        $this->save();
        self::setEventDispatcher($dispatcher);
    }
}

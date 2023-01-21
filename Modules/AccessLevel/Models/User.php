<?php

namespace Modules\AccessLevel\Models;

use App\Models\User as ModelsUser;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Modules\CrudGenerator\Filters\AllowedFilter;
use Illuminate\Database\Eloquent\Model as Model;




;
/**
 * Class User
 * @package Modules\AccessLevel\Models
 * @version October 28, 2021, 4:20 pm UTC
 *
 * @property string $email
 * @property tinyInteger $master
 * @property string $email_verified_at
 * @property string $username
 * @property string $mobile
 * @property string $avatar_url
 * @property string $created_at
 * @property tinyInteger $state
 */
class User extends ModelsUser
{
    use FormatesDates;
    use HasRelationships;





    public $table = 'users';


    public $timestamps = false;


    protected $dates = ['email_verified_at','created_at'];




    public $fillable = [
        'email',
        'master',
        'email_verified_at',
        'username',
        'mobile',
        'avatar_url',
        'created_at',
        'state'
    ];
    public $translatable = [

    ];
    public $with = [

    ];
    public $appends = [

    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'master' => 'integer',
        'email_verified_at' => 'datetime',
        'username' => 'string',
        'mobile' => 'string',
        'avatar_url' => 'string',
        'state' => 'integer'
    ];
    public static $dateFormats = [

                    'email_verified_at'=>'Y-m-d H:i'
                ,

                    'created_at'=>'Y-m-d H:i'

    ];
   /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/accesslevel/api/users';

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'nullable',
        'master' => 'required',
        'email_verified_at' => 'nullable',
        'username' => 'nullable',
        'mobile' => 'nullable',
        'avatar_url' => 'nullable',
        'state' => 'nullable'
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
        'email'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Email',
                'name'=>'email',
                'translatable'=>'',

                ]
            ,
        'master'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Master',
                'name'=>'master',
                'translatable'=>'',

                ]
            ,
        'email_verified_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Email Verified At',
                'name'=>'email_verified_at',
                'translatable'=>'',

                ]
            ,
        'username'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Username',
                'name'=>'username',
                'translatable'=>'',

                ]
            ,
        'mobile'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Mobile',
                'name'=>'mobile',
                'translatable'=>'',

                ]
            ,
        'avatar_url'=>[
                'htmlType'=>'text',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'Avatar Url',
                'name'=>'avatar_url',
                'translatable'=>'',

                ]
            ,
        'created_at'=>[
                'htmlType'=>'datetime',
                'inIndex'=>1,
                'inForm'=>0,
                'title'=>'Created At',
                'name'=>'created_at',
                'translatable'=>'',

                ]
            ,
        'state'=>[
                'htmlType'=>'radio',
                'inIndex'=>1,
                'inForm'=>1,
                'title'=>'State',
                'name'=>'state',
                'translatable'=>'',

                ]

    ];

    public static $title="id";



    public static function allowedFilters(){
        return [
            'email'=>'email',
        'master'=>AllowedFilter::custom('master',new \Modules\AccessLevel\Filters\User\Master),
        'email_verified_at'=>'email_verified_at',
        'username'=>'username',
        'mobile'=>'mobile',
        'avatar_url'=>'avatar_url',
        'created_at'=>'created_at',
        'state'=>AllowedFilter::custom('state',new \Modules\AccessLevel\Filters\User\State)
        ];
    }
    public static function allowedIncludes(){
        return [

        ];
    }
    public static function allowedSorts(){
        return [
            'email',
        'master',
        'email_verified_at',
        'username',
        'mobile',
        'avatar_url',
        'created_at',
        'state'
        ];
    }
}

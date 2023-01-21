<?php

namespace Modules\Panel\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Modules\Panel\Traits\FormatesDates;
use Modules\Panel\Traits\HasRelationships;
use Laravel\Fortify\TwoFactorAuthenticatable;

/**
 * Class User
 * @package App\Models
 * @version July 28, 2020, 9:04 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    use FormatesDates;
    use HasApiTokens;
    use HasRelationships;
    use Notifiable;
    use HasFactory;
    public $table = 'users';
    protected $hidden = [
        'two_factor_recovery_codes',
        'two_factor_secret',
        'password'
    ];
    public $fillable = [
        'email',
        'mobile',
        'personnel_id',
        'username',
        'avatar_url',
        'registrator_id',
        'accounttype_id',
        'state',
        'last_active',
        'email_verified_at',
        'password',
        "master"
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
        'first_name'=> 'string',
        'last_name'=> 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'gender' => 'boolean',
        'master' => 'boolean',
        'state' => 'boolean',
    ];

    /**
     * Api route
     *
     * @var array
     */
    public static $api_route = '/panel/api/users';


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'email_verified_at' => 'nullable',
        'password' => 'required',
        'remember_token' => 'nullable',
        'gender' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'master' => 'required',
        'state' => 'required',
    ];

    /**
     * Fields
     *
     * @var array
     */
    public static $fields = [
        'name' => [
            'htmlType' => 'text',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'email' => [
            'htmlType' => 'email',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'email_verified_at' => [
            'htmlType' => 'date',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'password' => [
            'htmlType' => 'password',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'remember_token' => [
            'htmlType' => 'text',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'gender' => [
            'htmlType' => 'radio',
            'inIndex' => 1,
            'inForm' => 1,

            'options' => [

                '1' => 'مرد',

                '2' => 'زن',

            ],

        ]
        ,
        'created_at' => [
            'htmlType' => 'date',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'updated_at' => [
            'htmlType' => 'date',
            'inIndex' => 1,
            'inForm' => 1,

        ]
        ,
        'master' => [
            'htmlType' => 'radio',
            'inIndex' => 1,
            'inForm' => 1,

            'options' => [

                '0' => 'ندارد',

                '1' => 'دارد',

            ],

        ]
        ,
        'state' => [
            'htmlType' => 'radio',
            'inIndex' => 1,
            'inForm' => 1,

            'options' => [

                '0' => 'غیرفعال',

                '1' => 'فعال',

            ],

        ],

    ];

    public static function allowedFilters(){
        return [
            'email'=>'email',
            'personnel_id'=>'personnel_id',
            'username'=>'username',
            'registrator_id'=>'registrator_id',
            'accounttype_id'=>'accounttype_id',
            'state'=>'state',
            'last_active'=>'last_active',
            'email_verified_at'=>'email_verified_at',
            'password'=>'password',
        ];
    }
    public static $title = "email";

    public function getNameAttribute()
    {
        return $this->personnel->first_name." ".$this->personnel->last_name;
    }
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function profile()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}

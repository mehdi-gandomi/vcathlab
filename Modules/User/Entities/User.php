<?php

namespace Modules\User\Entities;

use App\Mail\Verifyemail;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Modules\AjaxUpload\Entities\Traits\HasImageUploads;
use Modules\Panel\Models\Personnel;
use Modules\Panel\Models\User as BaseUser;
use Modules\User\Enums\Specialty;

class User extends BaseUser implements MustVerifyEmail
{
    use Notifiable,CastsEnums,HasImageUploads;
    public static $imageFields = [
        'avatar'
    ];
    public $fillable = [
        "username",
        "first_name",
        "last_name",
        "state",
        "city",
        "city_id",
        'panel_type',//1->base,2->kojuri,3->ghasemi,4->bayatian
        "country",
        "province",
        "province_id",
        "profession",
        "avatar",
        "specialty",
        "mobile",
        "email",
        "password",
    ];
    protected $casts=[
        "specialty"=>Specialty::class,
    ];
    public static $rules=[
        "username" => "nullable",
        "first_name" => "required",
        "last_name" => "required",
        "state" => "required_unless:country,IR",
        "city" => "required_unless:country,IR",
        "country" => "required",
        "province_id" => "required_if:country,IR",
        "city_id" => "required_if:country,IR",
        "profession" => "required",
        "specialty" => "required",
        "mobile" => "nullable",
        "email" => "required|unique:users",
        "password" => "required|confirmed"
    ];
    public $appends=['name'];
    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(){
        return Mail::to($this)->send(new Verifyemail($this));
    }
    public function getNameAttribute()
    {
        return $this->first_name." ".$this->last_name;
    }

    // public function getNameAttribute()
    // {
    //     return $this->personnel->first_name." ".$this->personnel->last_name;
    // }
    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
    public function getAvatarAttribute()
    {
        return $this->avatar ?? "/images/avatar_generic_118.png";
    }
}

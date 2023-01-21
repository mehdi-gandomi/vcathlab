<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Modules\User\Entities\User as BaseUser;
use Laravel\Sanctum\HasApiTokens;
use Modules\Comment\Traits\HasComments;
use Modules\User\Models\ComplexCase;

class User extends BaseUser implements MustVerifyEmail
{
    use HasComments;
    use HasApiTokens;
    public function complex_cases()
    {
        return $this->hasMany(ComplexCase::class);
    }
    // public function complex_cases()
    // {
    //     return $this->hasMany(ComplexCase::class);
    // }
}

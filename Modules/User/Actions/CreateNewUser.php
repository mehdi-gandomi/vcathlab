<?php

namespace Modules\User\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Modules\User\Models\Personnel;
use Modules\Panel\Actions\Fortify\PasswordValidationRules;
use Modules\Place\Models\City;
use Modules\Place\Models\Province;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, User::$rules,[
            'tos.required'=>__("You have to accept terms & conditions")
        ])->validate();
        $data=request()->only(array_keys(User::$rules));

        if(request('city') != null){
            $city=City::firstOrCreate(['en_name'=>request("city")]);
            unset($data['city']);
            $data['city_id']=$city->id;
        }else{
            unset($data['city']);
        }
        if(request('province') != null){
            $province=Province::firstOrCreate(['en_name'=>request("province")]);
            unset($data['province']);
            $data['province_id']=$province->id;
        }else{
            unset($data['province']);
        }
        $user=User::create($data);
        return $user;
    }

}

<?php

namespace Modules\Panel\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Modules\Panel\Models\Personnel;

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
        $validator = Validator::make($input, [
            'first_name'=>'required',
            'last_name'=>'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'tos'=>'required'

        ],[
            'tos.required'=>__("You have to accept terms & conditions")
        ])->validate();

        return DB::transaction(function () use ($input) {
            $personnel=Personnel::create([
                'first_name'=>$input['first_name'],
                'last_name'=>$input['last_name']
            ]);
            $user=User::create([
                'email'=>$input['email'],
                'personnel_id'=>$personnel->id,
                'password'=>$input['password']
            ]);
            return $user;
        });
    }

}

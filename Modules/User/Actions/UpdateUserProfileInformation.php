<?php

namespace Modules\User\Actions;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [ 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'max:1024'],
            'mobile'=>['nullable']
        ])->validateWithBag('updateProfileInformation');
        $userData=[
            'email' => $input['email'],
            'mobile'=>$input['mobile'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name']
        ];
        if (isset($input['avatar'])) {
            $path=$input['avatar']->store("avatars","public");
            $url=asset("storage/".$path);
            $userData['avatar']=$url;
        }
        $user->update($userData);
    }
}

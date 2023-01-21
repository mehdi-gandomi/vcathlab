<?php

namespace Modules\User\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Panel\Models\Personnel;
use Illuminate\Http\Request;

class LoginUser
{

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required|string',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) return false;
        $user = User::where('email', $request->email)->first();
        if ($user &&
            Hash::check($request->password, $user->password)) {
            return $user;
        }
    }

}

<?php

namespace Modules\AccessLevel\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Modules\AccessLevel\Models\Base\UserActivity;
use Modules\Panel\Http\Controllers\API\Auth\LoginController as LoginControllerBase;

class LoginController extends LoginControllerBase
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login()
    {
        $data=request()->validate([
            'email' => 'required',
            'password' => 'required',
          //   'captcha' => 'required|captcha_api:'. request('key')
        ]);
        $user=User::where("email",$data['email'])->first();
        if(!$user) {
	        UserActivity::wrongPassword($data['email']);
		return response()->json([
			'ok'=>false,
			'message'=>__("Wrong email or password")
		]);
        }
        if(Hash::check($data['password'],$user->password)){
	        if(!$user->getCurrentState()) {
		        UserActivity::restricted($user);
			return response()->json([
				'ok'=>false,
				'message'=>__("Role or User is Disabled")
			]);
	        }
	        UserActivity::login($user);
            $token=$user->createToken('login');
	  Auth::login($user);
            $payload=$user->toArray();
            $payload['exp']=now()->addSeconds(config("sanctum.expiration"))->getTimestamp();
            return response()->json([
                'ok'=>true,
                'userData'=>$user,
                'idTokenPayload'=>$payload,
                'idToken'=>$token->accessToken->id,
                'accessToken'=>$token->plainTextToken,
                'tokenExpiry'=>now()->addSeconds(config("sanctum.expiration"))
            ]);
        }
        UserActivity::wrongPassword($user);
        return response()->json(['ok'=>false,'message'=>__("Wrong email or password")]);
    }
    public function logout()
    {
	UserActivity::logout();
	return parent::logout();
    }
}

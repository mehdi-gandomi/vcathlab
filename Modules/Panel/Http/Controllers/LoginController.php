<?php

namespace Modules\Panel\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Modules\Panel\Traits\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        login as traitLogin;
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = "/admin/callback";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);
    }
    public function showLoginForm()
    {
        session()->put("is_captcha_validated",false);
        return view("panel::login");
    }
    public function check_captcha(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ]);
        session()->put("is_captcha_validated",true);
        return response()->json([
            'ok'=>true
        ]);
    }
    public function check()
    {
        \abort_unless(auth()->check(),403);
        $user=auth()->user();
        return response()->json([
            'ok'=>true,
            'userData'=>$user
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route("login");
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        abort_unless(session()->get("is_captcha_validated"),422);
        $this->traitLogin($request);
    }
/**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // if ($response = $this->authenticated($request, $this->guard()->user())) {
        //     return $response;
        // }
        echo "<script>location.href='".url("/admin/callback")."'</script>";
        // return redirect();
    }
}

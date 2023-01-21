<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Middleware\CheckResponseForModifications;

use Modules\Panel\Http\Middleware\DispatchServingIracode;

Route::get('/static/scripts/{script}', 'ScriptController@show')->middleware(CheckResponseForModifications::class);
Route::get('/static/styles/{style}', 'StyleController@show')->middleware(CheckResponseForModifications::class);
Route::get('/static/file/{static}', 'StaticController@show')->middleware(CheckResponseForModifications::class);
Route::get("/maintenance","PanelController@maintenance");
Route::prefix(config("panel.path_prefix"))->group(function() {
    Route::get("logout","LoginController@logout")->middleware("auth");
    // Route::get('/login', "LoginController@showLoginForm")->name("panel.login");
    Route::post('/captcha/check', "LoginController@check_captcha")->name("panel.captcha.check");
    // Route::post('/login', "LoginController@login")->name("panel.login");
    $middlewares=[DispatchServingIracode::class];
    $panelMiddleware=config("panel.middleware","auth:sanctum");
    if(is_array($panelMiddleware)){
        $middlewares=array_merge($middlewares,$panelMiddleware);
    }else{
        array_push($middlewares,$panelMiddleware);
    }
    // if(class_exists("Laravel\\Fortify\\Features") && \Laravel\Fortify\Features::enabled(\Laravel\Fortify\Features::emailVerification())) array_push($middlewares,"verified");
    Route::group(['middleware'=>$middlewares],function(){
        Route::get('/', 'ApplicationController');
        Route::get('/{any}', 'ApplicationController')->where('any', '^(?!(\/)?callback).*$');
    });

});

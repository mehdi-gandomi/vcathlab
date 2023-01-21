<?php

use Illuminate\Support\Facades\Route;
use Modules\AccessLevel\Core\Permissions;
use Modules\AccessLevel\Http\Middleware\CheckRole;

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

// Route::prefix('accesslevel')->group(function() {
//     Route::get('/', 'AccessLevelController@index');
// });

Route::get('getTree', '\\'.Permissions::$controllersNamespace.'\RoleController@getTree')->prefix('accesslevel');

Route::namespace('\\'.Permissions::$controllersNamespace)->prefix('app')->middleware(CheckRole::class)->group(function () {
	Route::get("menus",'MenuController@index');

	Route::get('allow', 'RoleController@allow');
	Route::get('allowAdmin', 'RoleController@allowAdmin');
	Route::get('check', 'RoleController@check');
	Route::get('checkFields/{menu}', 'RoleController@checkFields');
	Route::get('copyData/{source}', 'RoleController@copyData');
	Route::get('checkData/{source}', 'RoleController@checkData');
	Route::get('rollz', 'RoleController@rollz');

	Route::get('getTree', 'RoleController@getTree');
	Route::get('checkAbility', 'RoleController@checkAbility');
	Route::get('showAMenu', 'RoleController@showAMenu');
});

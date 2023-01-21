<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\AccessLevel\Core\Permissions;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/accesslevel', function (Request $request) {
    return $request->user();
});

// Route::namespace('\\'.Permissions::$apiControllersNamespace)->group(function () {
	Route::crud('roles', 'RoleAPIController');
	//         $role->storeAbilities($input['permissions']);
	//         $role->deleteAbilities();
	Route::crud('user_activities', 'UserActivityAPIController');
	Route::crud('subsystems', 'SubSystemAPIController');
	Route::get('menus/available','MenuAPIController@available');
	Route::crud('menus', 'MenuAPIController');
Route::post('users/{id}/toggle_state', 'UserAPIController@toggle_state');
	Route::crud('users', 'UserAPIController');
	Route::get('role_users/show_not_assigned', 'RoleUserAPIController@show_not_assigned');
	// Route::get('role_users/list', 'RoleUserAPIController@list');
	Route::crud('role_users', 'RoleUserAPIController');

	Route::post('role_outusers/assign', 'RoleOutUserAPIController@assign');
	Route::crud('role_outusers', 'RoleOutUserAPIController');

// });

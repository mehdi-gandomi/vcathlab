<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/panel', function (Request $request) {
//     return $request->user();
// });

Route::get("/partials/menu","MenuController@index")->middleware(config("panel.auth_middleware"));
Route::post("/login","Auth\LoginController@login");
Route::any("/logout","Auth\LoginController@logout")->middleware(config("panel.auth_middleware"));
Route::post("/filter/values","FilterController@getFilterValues");
Route::post("/get-model-fields","GetModelFieldsController");
Route::post("/change_locale","LocaleController@change");
Route::get("/get_user","GetUserInfoController")->middleware('auth:sanctum');
// Route::get("/users/{id}","GetUserProfileController")->middleware('auth:sanctum');
Route::post("/get_select_table","GetSelectTableOptionsController")->middleware('auth:sanctum');
Route::post("/unlock","UnlockUserController")->middleware('auth:sanctum');
Route::get("/notifications","NotificationController@index")->middleware('auth:sanctum');
Route::post("/notifications/mark_as_read","NotificationController@markAsRead")->middleware('auth:sanctum');
Route::crud('users', 'UserAPIController');

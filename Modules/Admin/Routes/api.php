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

Route::middleware('auth:api')->get('/admin', function (Request $request) {
    return $request->user();
});


Route::crud('users', 'UserAPIController');


Route::crud('complex_case_categories', 'ComplexCaseCategoryAPIController');

Route::post('ct_cases/{id}/upload_result', 'CtCaseAPIController@upload_result');
Route::crud('ct_cases', 'CtCaseAPIController');


Route::crud('complex_cases', 'ComplexCaseAPIController');

Route::post('comments/{id}/confirm', 'CommentAPIController@confirm');
Route::crud('comments', 'CommentAPIController');


Route::crud('physicians', 'PhysicianAPIController');

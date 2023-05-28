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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::crud('plans', 'PlanAPIController');


Route::crud('patients', 'PatientAPIController');


Route::crud('complex_case_categories', 'ComplexCaseCategoryAPIController');

Route::post('ct_cases/upload', 'CtCaseAPIController@store');

Route::crud('ct_cases', 'CtCaseAPIController');




Route::crud('niffr_cases', 'NIFFRCaseAPIController');


Route::crud('complex_cases', 'ComplexCaseAPIController');
Route::post('complex_cases/{id}/comment', 'ComplexCaseAPIController@comment')->name("issue.comment.store");
Route::post("mace_assesment","MaceController@store");

Route::get('mace_assesments/{id}/export/{type}', 'MaceAssesmentAPIController@quickPrint');
Route::crud('mace_assesments', 'MaceAssesmentAPIController');

Route::post('body_composition', 'BodyAnalyzerController@store')->name("body_composition.store");
Route::crud('computation_centers', 'ComputationCenterAPIController');
Route::crud('echo_calculations', 'EchoCalculationAPIController');
Route::post('computation_center', 'ComputationCenterAPIController@store')->name("computation_center.store");
Route::post('angiography', 'AngiographyAPIController@store')->name("angiography.store");


Route::crud('angiographies', 'AngiographyAPIController');



Route::crud('body_compositions', 'BodyCompositionAPIController');

Route::crud('aobp_calculations', 'AobpCalculationAPIController');
Route::crud('abpm_calculations', 'ABPMCalculationAPIController');

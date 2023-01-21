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

Route::get('/', 'GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', 'GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', 'GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', 'GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/vuecrud', 'GeneratorBuilderController@generateVueCrud')->name('io_generator_builder_vuecrud');
Route::post('generator_builder/common_filter', 'GeneratorBuilderController@generateCommonFilter')->name('io_generator_builder_common_filter');
Route::post('generator_builder/rollback', 'GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post('generator_builder/get_table_fields', 'GeneratorBuilderController@getTableFields')->name('io_generator_builder_get_table_fields');
Route::post('generator_builder/get_enum_values', 'GeneratorBuilderController@getEnumValues')->name('io_generator_builder_get_enum_values');
Route::post(
    'generator_builder/generate-from-file',
    'GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');

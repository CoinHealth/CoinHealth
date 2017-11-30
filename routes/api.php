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

Route::group(['namespace' => 'Api'], function() {
    // Route::get('/users/search', 'UserController@search');

    Route::get('/symptoms', 'SymptomController@index');
    Route::get('/conditions', 'ConditionController@index');

    Route::group(['prefix' => 'specializations'], function() {
        Route::get('/search', 'SpecializationController@search');
        Route::get('/doctor', 'SpecializationController@doctor');
        Route::get('/', 'SpecializationController@index');
    });
    Route::get('/doctors/{id}', 'DoctorController@getDoctors');
    Route::get('/locations/state', 'LocationController@getState');
    Route::get('/locations/{state}/cities', 'LocationController@getCities');

    Route::get('/categories/{type}', 'CategoryController@get');
});

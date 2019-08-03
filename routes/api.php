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


Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('registration', 'UserController@createUser');
    Route::get('forms_excel', 'FormDetailsController@getExcel');
});
Route::group([

    'middleware' => 'jwt',
    'prefix' => 'v1'

], function ($router) {
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user', 'AuthController@me');
    Route::post('form_details', 'FormDetailsController@create');
    Route::get('forms_details', 'FormDetailsController@getForms');
    Route::get('single_form', 'FormDetailsController@getSingleForm');
    Route::get('users', 'UserController@getUsers');
});
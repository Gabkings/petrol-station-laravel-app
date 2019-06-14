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


// get list of fuel_types
Route::get('fuel_types','FuelTypesController@index');
// get specific fuel_type
Route::get('fuel_types/{id}','FuelTypesController@show');
// create new task
Route::post('fuel_types','FuelTypesController@store');
// update existing task
Route::put('fuel_types','FuelTypesController@store');
// delete a task
Route::delete('fuel_types/{id}','FuelTypesController@destroy');


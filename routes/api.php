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
Route::put('fuel_types/{id}','FuelTypesController@store');
// delete a task
Route::delete('fuel_types/{id}','FuelTypesController@destroy');

/////taks endpoints

// get list of fuel_types
Route::get('tanks','TanksController@index');
// get specific fuel_type
Route::get('tanks/{id}','TanksController@show');
// create new task
Route::post('tanks','TanksController@store');
// update existing task
Route::put('tanks/{id}','TanksController@store');
// delete a task
Route::delete('tanks/{id}','TanksController@destroy');

// get list of sale period
Route::get('sales_periods','SalePeriodController@index');
// get specific fuel_type
Route::get('sales_periods/{id}','SalePeriodController@show');
// create new task
Route::post('sales_periods','SalePeriodController@store');
// update existing task
Route::put('sales_periods/{id}','SalePeriodController@store');
// delete a task
Route::delete('sales_periods/{id}','SalePeriodController@destroy');


//suppliers end points 

Route::get('suppliers','SupplierController@index');
// get specific fuel_type
Route::get('suppliers/{id}','SupplierController@show');
// create new task
Route::post('suppliers','SupplierController@store');
// update existing task
Route::put('suppliers/{id}','SupplierController@store');
// delete a task
Route::delete('suppliers/{id}','SupplierController@destroy');

//tank reading end points

//suppliers end points 

Route::get('tank_readings','TankReadingsController@index');
// get specific fuel_type
Route::get('tank_readings/{id}','TankReadingsController@show');
// create new task
Route::post('tank_readings','TankReadingsController@store');
// update existing task
Route::put('tank_readings/{id}','TankReadingsController@store');
// delete a task
Route::delete('tank_readings/{id}','TankReadingsController@destroy');


//suppliers end points 

Route::get('assignments','StaffAssignmentController@index');
// get specific fuel_type
Route::get('assignments/{id}','StaffAssignmentController@show');
// create new task
Route::post('assignments','StaffAssignmentController@store');
// update existing task
Route::put('assignments/{id}','StaffAssignmentController@store');
// delete a task
Route::delete('assignments/{id}','StaffAssignmentController@destroy');

//unit endpoints
Route::get('units','UnitController@index');
// get specific fuel_type
Route::get('units/{id}','UnitController@show');
// create new task
Route::post('units','UnitController@store');
// update existing task
Route::put('units/{id}','UnitController@store');
// delete a task
Route::delete('units/{id}','UnitController@destroy');

//pumps endpoints

//unit endpoints
Route::get('pumps','PumpsController@index');
// get specific fuel_type
Route::get('pumps/{id}','PumpsController@show');
// create new task
Route::post('pumps','PumpsController@store');
// update existing task
Route::put('pumps/{id}','PumpsController@store');
// delete a task
Route::delete('pumps/{id}','PumpsController@destroy');


//fuel cost endpoints
Route::get('fuel_costs','FuelCostController@index');
// get specific fuel_type
Route::get('fuel_costs/{id}','FuelCostController@show');
// create new task
Route::post('fuel_costs','FuelCostController@store');
// update existing task
Route::put('fuel_costs/{id}','FuelCostController@store');
// delete a task
Route::delete('fuel_costs/{id}','FuelCostController@destroy');

//pump sales endpoints
Route::get('pump_sales','PumpSalesController@index');
// get specific fuel_type
Route::get('pump_sales/{id}','PumpSalesController@show');
// create new task
Route::post('pump_sales','PumpSalesController@store');
// update existing task
Route::put('pump_sales/{id}','PumpSalesController@store');
// delete a task
Route::delete('pump_sales/{id}','PumpSalesController@destroy');

//pump sales endpoints
Route::get('orders','PurchaseOrderController@index');
// get specific fuel_type
Route::get('orders/{id}','PurchaseOrderController@show');
// create new task
Route::post('orders','PurchaseOrderController@store');
// update existing task
Route::put('orders/{id}','PurchaseOrderController@store');
// delete a task
Route::delete('orders/{id}','PurchaseOrderController@destroy');


//supplies endpoints
Route::get('supply','SupplyController@index');
// get specific fuel_type
Route::get('supply/{id}','SupplyController@show');
// create new task
Route::post('supply','SupplyController@store');
// update existing task
Route::put('supply/{id}','SupplyController@store');
// delete a task
Route::delete('supply/{id}','SupplyController@destroy');

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
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'UserController@details');
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// get list of fuel_types
Route::get('fuel_types','FuelTypesController@index');
// get specific fuel_type
Route::get('fuel_types/{id}','FuelTypesController@show');
// create new task
Route::post('fuel_types','FuelTypesController@store');
// update existing task
Route::put('fuel_types/{id}','FuelTypesController@store');
// delete a task
//Route::delete('fuel_types/{id}','FuelTypesController@destroy');
//softdelete a task
Route::delete('fuel_types_soft/{id}','FuelTypesController@softdelete');
//get units both without and units  with soft delete
Route::get('fuel_types_withsoft/','FuelTypesController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('fuel_types_onlysoft/','FuelTypesController@softDeleted');
//restore the soft deleted item.
Route::patch('fuel_types_restore/{id}','FuelTypesController@restore');
//permanent delete the soft delete
Route::delete('fuel_types_perm_del{id}','FuelTypesController@permanentDeleteSoftDeleted');


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
//Route::delete('sales_periods/{id}','SalePeriodController@destroy');
//softdelete a task
Route::delete('sales_periods_soft/{id}','SalePeriodController@softdelete');
//get units both without and units  with soft delete
Route::get('sales_periods_withsoft/','SalePeriodController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('sales_periods_onlysoft/','SalePeriodController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_sales_periods/{id}','SalePeriodController@restore');
//permanent delete the soft delete
Route::delete('sales_periods_perm_del{id}','SalePeriodController@permanentDeleteSoftDeleted');


//suppliers end points 

Route::get('suppliers','SupplierController@index');
// get specific fuel_type
Route::get('suppliers/{id}','SupplierController@show');
// create new task
Route::post('suppliers','SupplierController@store');
// update existing task
Route::put('suppliers/{id}','SupplierController@store');
// delete a task
//Route::delete('suppliers/{id}','SupplierController@destroy');
//softdelete a task
Route::delete('suppliers_soft/{id}','SupplierController@softdelete');
//get units both without and units  with soft delete
Route::get('suppliers_withsoft/','SupplierController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('suppliers_onlysoft/','SupplierController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_suppliers/{id}','SupplierController@restore');
//permanent delete the soft delete
Route::delete('suppliers_perm_del{id}','SupplierController@permanentDeleteSoftDeleted');




//tank reading end points

//suppliers end points 

Route::get('tank_readings','TankReadingsController@index');
// get specific fuel_type
Route::get('tank_readings/{id}','TankReadingsController@show');
// create new task
Route::post('tank_readings','TankReadingsController@store');
// update existing task
Route::put('tank_readings/{id}','TankReadingsController@store');
//Route::delete('tank_readings/{id}','TankReadingsController@destroy');
//softdelete a task
Route::delete('tank_soft/{id}','TankReadingsController@softdelete');
//get units both without and units  with soft delete
Route::get('tank_withsoft/','TankReadingsController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('tank_onlysoft/','TankReadingsController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_tank/{id}','TankReadingsController@restore');
//permanent delete the soft delete
Route::delete('tank_perm_del{id}','TankReadingsController@permanentDeleteSoftDeleted');


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
//softdelete a task
Route::delete('assignments/{id}','StaffAssignmentController@softdelete');
//get units both without and units  with soft delete
Route::get('assignments_withsoft/','StaffAssignmentController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('assignments_onlysoft/','StaffAssignmentController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_assignments/{id}','StaffAssignmentController@restore');
//permanent delete the soft delete
Route::delete('assignments_perm_del{id}','StaffAssignmentController@permanentDeleteSoftDeleted');

//unit endpoints
Route::get('units','UnitController@index');
// get specific fuel_type
Route::get('units/{id}','UnitController@show');
// create new task
Route::post('units','UnitController@store');
// update existing task
Route::put('units/{id}','UnitController@store');
// delete a task
//Route::delete('units/{id}','UnitController@destroy');
//softdelete a task
Route::delete('units_soft/{id}','UnitController@softdelete');
//get units both without and units  with soft delete
Route::get('units_withsoft/','UnitController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('units_onlysoft/','UnitController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_unit/{id}','UnitController@restore');
//permanent delete the soft delete
Route::delete('unit_perm_del{id}','UnitController@permanentDeleteSoftDeleted');

//pumps endpoints
Route::get('pumps','PumpsController@index');
// get specific fuel_type
Route::get('pumps/{id}','PumpsController@show');
// create new task
Route::post('pumps','PumpsController@store');
// update existing task
Route::put('pumps/{id}','PumpsController@store');
// delete a task
//Route::delete('pumps/{id}','PumpsController@destroy');
//softdelete a task
Route::delete('pumps_soft/{id}','PumpsController@softdelete');
//get units both without and units  with soft delete
Route::get('pumps_withsoft/','PumpsController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('pumps_onlysoft/','PumpsController@softDeleted');
//restore the soft deleted item.
Route::patch('pumps_unit/{id}','PumpsController@restore');
//permanent delete the soft delete
Route::delete('pumps_perm_del{id}','PumpsController@permanentDeleteSoftDeleted');


//fuel cost endpoints
Route::get('fuel_costs','FuelCostController@index');
// get specific fuel_type
Route::get('fuel_costs/{id}','FuelCostController@show');
// create new task
Route::post('fuel_costs','FuelCostController@store');
// update existing task
Route::put('fuel_costs/{id}','FuelCostController@store');
// delete a task
//Route::delete('fuel_costs/{id}','FuelCostController@destroy');
Route::delete('fuel_costs_soft/{id}','FuelCostController@softdelete');
//get units both without and units  with soft delete
Route::get('fuel_costs_withsoft/','FuelCostController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('fuel_costs_onlysoft/','FuelCostController@softDeleted');
//restore the soft deleted item.
Route::patch('fuel_costs_restore/{id}','FuelCostController@restore');
//permanent delete the soft delete
Route::delete('fuel_costs_perm_del{id}','FuelCostController@permanentDeleteSoftDeleted');




//pump sales endpoints
Route::get('pump_sales','PumpSalesController@index');
// get specific fuel_type
Route::get('pump_sales/{id}','PumpSalesController@show');
// create new task
Route::post('pump_sales','PumpSalesController@store');
// update existing task
Route::put('pump_sales/{id}','PumpSalesController@store');
// delete a task
//Route::delete('pump_sales/{id}','PumpSalesController@destroy');
Route::delete('pump_sales_soft/{id}','PumpSalesController@softdelete');
//get units both without and units  with soft delete
Route::get('pump_sales_withsoft/','PumpSalesController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('pump_sales_onlysoft/','PumpSalesController@softDeleted');
//restore the soft deleted item.
Route::patch('pump_sales_restore/{id}','PumpSalesController@restore');
//permanent delete the soft delete
Route::delete('pump_sales_perm_del{id}','PumpSalesController@permanentDeleteSoftDeleted');



//pump sales endpoints
Route::get('orders','PurchaseOrderController@index');
// get specific fuel_type
Route::get('orders/{id}','PurchaseOrderController@show');
// create new task
Route::post('orders','PurchaseOrderController@store');
// update existing task
Route::put('orders/{id}','PurchaseOrderController@store');
// delete a task
//Route::delete('orders/{id}','PurchaseOrderController@destroy');
//softdelete a task
Route::delete('orders_soft/{id}','PurchaseOrderController@softdelete');
//get units both without and units  with soft delete
Route::get('orders_withsoft/','PurchaseOrderController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('orders_onlysoft/','PurchaseOrderController@softDeleted');
//restore the soft deleted item.
Route::patch('orders_periods/{id}','PurchaseOrderController@restore');
//permanent delete the soft delete
Route::delete('orders_perm_del{id}','PurchaseOrderController@permanentDeleteSoftDeleted');


//supplies endpoints
Route::get('supply','SupplyController@index');
// get specific fuel_type
Route::get('supply/{id}','SupplyController@show');
// create new task
Route::post('supply','SupplyController@store');
// update existing task
Route::put('supply/{id}','SupplyController@store');
// delete a task
//Route::delete('supply/{id}','SupplyController@destroy');
//softdelete a task
Route::delete('supply_soft/{id}','SupplyController@softdelete');
//get units both without and units  with soft delete
Route::get('supply_withsoft/','SupplyController@unitsWithSoftDelete');
//only the soft deleted unts
Route::get('supply_onlysoft/','SupplyController@softDeleted');
//restore the soft deleted item.
Route::patch('restore_supply/{id}','SupplyController@restore');
//permanent delete the soft delete
Route::delete('supply_perm_del{id}','SupplyController@permanentDeleteSoftDeleted');

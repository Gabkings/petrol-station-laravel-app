<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pump_Sales;
use App\Http\Requests;
use App\Http\Resources\Pump_SalesResource;

class PumpSalesController extends Controller
{

    public function index()
    {
       $pump_sales = Pump_Sales::get();
        return Pump_SalesResource::collection($pump_sales);
    }

    public function show($id)
    {
        //Get the task
       $pump_sales = Pump_Sales::find($id);
 
        // Return a single task
        return new Pump_SalesResource($pump_sales);
    }

        public function destroy($id)
    {
        //Get the task
       $pump_sales = Pump_Sales::find($id);
 
        if($pump_sales->delete()) {
            return new Pump_SalesResource($pump_sales);
        }else{
        	$pump_sales = "the request items is not found";
        	return new Pump_SalesResource($pump_sales);

        }
    }

    public function store(Request $request)  {
 
       $pump_sales = $request->isMethod('put') ? Pump_Sales::find($request->id) : new Pump_Sales;
       $pump_sales->pump_id = $request->input('pump id');
       $pump_sales->volume_sold = $request->input('volume');
        if($pump_sales->save()) {
            return new Pump_SalesResource($pump_sales);
        } 
        
    }

}

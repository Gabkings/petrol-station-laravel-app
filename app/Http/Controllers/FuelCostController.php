<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_Cost;
use App\Http\Requests;
use App\Http\Resources\Fuel_CostResource;

class FuelCostController extends Controller
{

    public function index()
    {
       $fuel_cost = Fuel_Cost::get();
        return Fuel_CostResource::collection($fuel_cost);
    }

    public function show($id)
    {
        //Get the task
       $fuel_cost = Fuel_Cost::find($id);
 
        // Return a single task
        return new Fuel_CostResource($fuel_cost);
    }

        public function destroy($id)
    {
        //Get the task
       $fuel_cost = Fuel_Cost::find($id);
 
        if($fuel_cost->delete()) {
            return new Fuel_CostResource($fuel_cost);
        }else{
        	$fuel_cost = "the request items is not found";
        	return new Fuel_CostResource($fuel_cost);

        }
 
    }

    public function store(Request $request)  {
 
       $fuel_cost = $request->isMethod('put') ? Fuel_Cost::find($request->id) : new Fuel_Cost;
       $fuel_cost->fuel_type_id = $request->input('type id');
       $fuel_cost->period_id = $request->input('period id');
       $fuel_cost->cost_per_litre = $request->input('cost');
        if($fuel_cost->save()) {
            return new Fuel_CostResource($fuel_cost);
        } 
        
    }

}

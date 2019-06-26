<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
class DairlySalesController extends Controller
{

	    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

	
    //

       // $fuel_cost = $request->isMethod('put') ? Fuel_Cost::find($request->id) : new Fuel_Cost;
       // $fuel_cost->fuel_type_id = $request->input('type id');
       // $fuel_cost->period_id = $request->input('period id');
       // $fuel_cost->cost_per_litre = $request->input('cost');
       //  if($fuel_cost->save()) {
       //      return new Fuel_CostResource($fuel_cost);
       //  } 
}

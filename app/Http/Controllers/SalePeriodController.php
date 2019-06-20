<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale_Period;
use App\Http\Requests;
use App\Http\Resources\Sale_PeriodResource;

class SalePeriodController extends Controller
{
    //

        //
     public function index()
    {
        $sale_period = Sale_Period::paginate(12);
        return Sale_PeriodResource::collection($sale_period);
    }

    public function show($id)
    {
        //Get the task
        $sale_period = Sale_Period::find($id);
 
        // Return a single task
        return new Sale_PeriodResource($sale_period);
    }

        public function destroy($id)
    {
        //Get the task
        $sale_period = Sale_Period::find($id);
 
        if($sale_period->delete()) {
            return new Sale_PeriodResource($sale_period);
        } 
 
    }

    public function store(Request $request)  {
 
        $sale_period = $request->isMethod('put') ? Sale_Period::find($request->id) : new Sale_Period;
        $sale_period->date_from = $request->input('from');
        $sale_period->date_to = $request->input('to');
        if($sale_period->save()) {
            return new Sale_PeriodResource($sale_period);
        } 
        
    }
}

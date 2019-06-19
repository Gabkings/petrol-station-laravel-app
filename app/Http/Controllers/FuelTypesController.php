<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_Types;
use App\Http\Requests;
use App\Http\Resources\Fuel_TypesResource;

class FuelTypesController extends Controller
{
    //
     public function index()
    {
        $fuel_types = Fuel_Types::paginate(12)->whereNull('deleted_at');
        return Fuel_TypesResource::collection($fuel_types);
    }

    public function show($id)
    {
        //Get the task
        $fuel_type = Fuel_Types::findOrfail($id);
 
        // Return a single task
        return new Fuel_TypesResource($fuel_type);
    }

        public function destroy($id)
    {
        //Get the task
        $fuel_type = Fuel_Types::findOrfail($id);
 
        if($fuel_type->delete()) {
            return new Fuel_TypesResource($fuel_type);
        } 
 
    }

    public function store(Request $request)  {
 
        $fuel_type = $request->isMethod('put') ? Fuel_Types::findOrFail($request->id) : new Fuel_Types;
        $fuel_type->type_name = $request->input('name');
        if($fuel_type->save()) {
            return new Fuel_TypesResource($fuel_type);
        } 
        
    }
}

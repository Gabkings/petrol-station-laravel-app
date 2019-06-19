<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tanks;
use App\Http\Requests;
use App\Http\Resources\TanksResource;

class TanksController extends Controller
{
    //
   //
     public function index()
    {
        $tanks = Tanks::paginate(12);
        return TanksResource::collection($tanks);
    }

    public function show($id)
    {
        //Get the task
        $tanks = Tanks::find($id);
 
        // Return a single task
        return new TanksResource($tanks);
    }

        public function destroy($id)
    {
        //Get the task
        $tanks = Tanks::find($id);
 
        if($tanks->delete()) {
            return new TanksResource($tanks);
        } 
 
    }

    public function store(Request $request)  {
 
        $tanks = $request->isMethod('put') ? Tanks::find($request->id) : new Tanks;
        $tanks->tank_name = $request->input('name');
        $tanks->fuel_type_id = $request->input('fuel type id');
        if($tanks->save()) {
            return new TanksResource($tanks);
        } 
        
    }

}

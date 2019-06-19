<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Requests;
use App\Http\Resources\UnitResource;
class UnitController extends Controller
{

     public function index()
    {
       $Unit = Unit::paginate(12);
        return UnitResource::collection($Unit);
    }

    public function show($id)
    {
        //Get the task
       $Unit = Unit::find($id);
 
        // Return a single task
        return new UnitResource($Unit);
    }

        public function destroy($id)
    {
        //Get the task
       $Unit = Unit::find($id);
 
        if($Unit->delete()) {
            return new UnitResource($Unit);
        } 
 
    }

    public function store(Request $request)  {
 
       $Unit = $request->isMethod('put') ? Unit::find($request->id) : new Unit;
       $Unit->assignments_id = $request->input('assignment id');
        if($Unit->save()) {
            return new UnitResource($Unit);
        } 
        
    }

}

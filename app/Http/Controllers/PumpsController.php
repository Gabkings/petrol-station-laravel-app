<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pumps;
use App\Http\Requests;
use App\Http\Resources\PumpsResource;
class PumpsController extends Controller
{

    public function index()
    {
       $pumps = Pumps::paginate(12);
        return PumpsResource::collection($pumps);
    }

    public function show($id)
    {
        //Get the task
       $pumps = Pumps::find($id);
 
        // Return a single task
        return new PumpsResource($pumps);
    }

        public function destroy($id)
    {
        //Get the task
       $pumps = Pumps::find($id);
 
        if($pumps->delete()) {
            return new PumpsResource($pumps);
        }else{
        	$pumps = "the request items is not found";
        	return new PumpsResource($pumps);

        }
 
    }

    public function store(Request $request)  {
 
       $pumps = $request->isMethod('put') ? Pumps::find($request->id) : new Pumps;
       $pumps->pump_name = $request->input('pump name');
       $pumps->tank_id = $request->input('tank id');
       $pumps->unit_id = $request->input('unit id');
        if($pumps->save()) {
            return new PumpsResource($pumps);
        } 
        
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tank_Readings;
use App\Http\Requests;
use App\Http\Resources\Tanks_ReadingsResource;
use JWTAuth;

class TankReadingsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    //

           //
    public function index()
    {
       $tanks_readings = Tank_Readings::paginate(12);
        return Tanks_ReadingsResource::collection($tanks_readings);
    }

    public function show($id)
    {
        //Get the task
       $tanks_readings = Tank_Readings::find($id);
 
        // Return a single task
        return new Tanks_ReadingsResource($tanks_readings);
    }

        public function destroy($id)
    {
        //Get the task
       $tanks_readings = Tank_Readings::find($id);
 
        if($tanks_readings->delete()) {
            return new Tank_ReadingsResource($tanks_readings);
        } 
 
    }

    public function store(Request $request)  {
 
       $tanks_readings = $request->isMethod('put') ? Tank_Readings::find($request->id) : new Tank_Readings;
       $tanks_readings->start_reading = $request->input('start reading');
       $tanks_readings->close_reading = $request->input('close reading');
       $tanks_readings->tank_id = $request->input('tank id');
       $tanks_readings->user_id = $request->input('user id');
        if($tanks_readings->save()) {
            return new Tanks_ReadingsResource($tanks_readings);
        } 
        
    }
}
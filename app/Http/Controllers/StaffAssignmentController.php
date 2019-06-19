<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff_Assignment;
use App\Http\Requests;
use App\Http\Resources\Staff_AssignmentResource;
class StaffAssignmentController extends Controller
{
    //
     public function index()
    {
       $staff_assignment = Staff_Assignment::paginate(12);
        return Staff_AssignmentResource::collection($staff_assignment);
    }

    public function show($id)
    {
        //Get the task
       $staff_assignment = Staff_Assignment::find($id);
 
        // Return a single task
        return new Staff_AssignmentResource($staff_assignment);
    }

        public function destroy($id)
    {
        //Get the task
       $staff_assignment = Staff_Assignment::find($id);
 
        if($staff_assignment->delete()) {
            return new Staff_AssignmentResource($staff_assignment);
        } 
 
    }

    public function store(Request $request)  {
 
       $staff_assignment = $request->isMethod('put') ? Staff_Assignment::find($request->id) : new Staff_Assignment;
       $staff_assignment->user_id = $request->input('user id');
       $staff_assignment->assignment_name = $request->input('assignment name');
        if($staff_assignment->save()) {
            return new Staff_AssignmentResource($staff_assignment);
        } 
        
    }


}

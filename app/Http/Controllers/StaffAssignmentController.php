<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff_Assignment;
use App\Http\Requests;
use App\Http\Resources\Staff_AssignmentResource;
use JWTAuth;
class StaffAssignmentController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    private function notFoundMessage()
    {
        return [
            'code' => 404,
            'message' => 'Note not found',
            'success' => false,
        ];
    }


    private function successfulMessage($code, $message, $status, $count, $payload)
    {
        return [
            'code' => $code,
            'message' => $message,
            'success' => $status,
            'count' => $count,
            'data' => $payload,
        ];
    }

    public function index()
    {
        $staff_assignment = Staff_Assignment::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $staff_assignment->count(), $staff_assignment);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $staff_assignment = Staff_Assignment::find($id);
 
        if ($staff_assignment) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $staff_assignment);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'assignment_name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $staff_assignment = new Staff_Assignment;
       $staff_assignment->user_id = $request->user_id;
       $staff_assignment->assignment_name = $request->assignment_name;
       $staff_assignment->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$staff_assignment->count(),$staff_assignment);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function Staff_AssignmentWithSoftDelete()
    {
        $staff_assignment = Staff_Assignment::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $staff_assignment->count(), $staff_assignment);
        return response($response);
    }


//get the Staff_Assignments that are soft deleted only
    public function softDeleted()
    {
        $staff_assignment = Staff_Assignment::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $staff_assignment->count(), $staff_assignment);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $staff_assignment = Staff_Assignment::onlyTrashed()->find($id);
        if (!is_null($staff_assignment)) {
            $staff_assignment->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $staff_assignment->count(), $staff_assignment);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $staff_assignment = Staff_Assignment::onlyTrashed()->find($id);
        if (!is_null($staff_assignment)) {
            $staff_assignment->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $staff_assignment);
        } else {
            return response($response);
        }
        return response($response);
    }

}

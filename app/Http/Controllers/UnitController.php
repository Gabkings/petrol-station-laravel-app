<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Http\Requests;
use App\Http\Resources\UnitResource;
class UnitController extends Controller
{

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
        $units = Unit::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $units->count(), $units);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $unit = Unit::find($id);
 
        if ($units) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $units);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function destroy($id)
    {
        $units = Unit::destroy($id);
        if ($units) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $units);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }



//create new article
    public function store(Request $request)
    {
        $rules = [
            'assignment_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $units = new Unit;
       $units->name = $request->name;
       $units->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$units->count(),$units);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function unitsWithSoftDelete()
    {
        $units = Unit::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $units->count(), $units);
        return response($response);
    }


//get the units that are soft deleted only
    public function softDeleted()
    {
        $units = Unit::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $units->count(), $units);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $units = Unit::onlyTrashed()->find($id);
        if (!is_null($units)) {
            $units->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $units->count(), $units);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $units = Unit::onlyTrashed()->find($id);
        if (!is_null($units)) {
            $units->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $units);
        } else {
            return response($response);
        }
        return response($response);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pumps;
use App\Http\Requests;
use App\Http\Resources\PumpsResource;
class PumpsController extends Controller
{

    //
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
        $pumps = Pumps::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $pumps->count(), $pumps);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $pumps = Pumps::find($id);
 
        if ($pumps) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $pumps);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function store(Request $request)
    {
      ['','','']
        $rules = [
            'name' => 'required',
            'tank' => 'required',
            'unit' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $pumps = new Pumps;
       $pumps->pump_name = $request->name;
       $pumps->tank_id = $request->tank;
       $pumps->unit_id = $request->unit;
       $pumps->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$pumps->count(),$pumps);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function PumpsWithSoftDelete()
    {
        $pumps = Pumps::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $pumps->count(), $pumps);
        return response($response);
    }


//get the Pumpss that are soft deleted only
    public function softDeleted()
    {
        $pumps = Pumps::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $pumps->count(), $pumps);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $pumps = Pumps::onlyTrashed()->find($id);
        if (!is_null($pumps)) {
            $pumps->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $pumps->count(), $pumps);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $pumps = Pumps::onlyTrashed()->find($id);
        if (!is_null($pumps)) {
            $pumps->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $pumps);
        } else {
            return response($response);
        }
        return response($response);
    }

}

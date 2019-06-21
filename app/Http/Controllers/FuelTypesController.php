<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_Types;
use App\Http\Requests;
use App\Http\Resources\Fuel_TypesResource;

class FuelTypesController extends Controller
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
        $fuel_types = Fuel_Types::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $fuel_types->count(), $fuel_types);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $fuel_types = Fuel_Types::find($id);
 
        if ($fuel_types) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_types);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    // public function destroy($id)
    // {
    //     $fuel_types = Fuel_Types::destroy($id);
    //     if ($fuel_types) {
    //         $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_types);
    //     } else {
    //         $response = $this->notFoundMessage();
    //     }
    //     return response($response);
    // }




    public function store(Request $request)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $fuel_types = new Fuel_Types;
       $fuel_types->name = $request->name;
       $fuel_types->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$fuel_types->count(),$fuel_types);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function fuel_TypesWithSoftDelete()
    {
        $fuel_types = Fuel_Types::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $fuel_types->count(), $fuel_types);
        return response($response);
    }


//get the Fuel_Typess that are soft deleted only
    public function softDeleted()
    {
        $fuel_types = Fuel_Types::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $fuel_types->count(), $fuel_types);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $fuel_types = Fuel_Types::onlyTrashed()->find($id);
        if (!is_null($fuel_types)) {
            $fuel_types->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $fuel_types->count(), $fuel_types);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $fuel_types = Fuel_Types::onlyTrashed()->find($id);
        if (!is_null($fuel_types)) {
            $fuel_types->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_types);
        } else {
            return response($response);
        }
        return response($response);
    }
}

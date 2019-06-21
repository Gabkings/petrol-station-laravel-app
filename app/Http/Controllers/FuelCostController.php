<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_Cost;
use App\Http\Requests;
use App\Http\Resources\Fuel_CostResource;

class FuelCostController extends Controller
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
        $fuel_cost = Fuel_Cost::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $fuel_cost->count(), $fuel_cost);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $fuel_cost = Fuel_Cost::find($id);
 
        if ($fuel_cost) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_cost);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    // public function destroy($id)
    // {
    //     $fuel_cost = Fuel_Cost::destroy($id);
    //     if ($fuel_cost) {
    //         $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_cost);
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
       $fuel_cost = new Fuel_Cost;
       $fuel_cost->name = $request->name;
       $fuel_cost->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$fuel_cost->count(),$fuel_cost);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function fuel_CostWithSoftDelete()
    {
        $fuel_cost = Fuel_Cost::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $fuel_cost->count(), $fuel_cost);
        return response($response);
    }


//get the Fuel_Costs that are soft deleted only
    public function softDeleted()
    {
        $fuel_cost = Fuel_Cost::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $fuel_cost->count(), $fuel_cost);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $fuel_cost = Fuel_Cost::onlyTrashed()->find($id);
        if (!is_null($fuel_cost)) {
            $fuel_cost->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $fuel_cost->count(), $fuel_cost);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $fuel_cost = Fuel_Cost::onlyTrashed()->find($id);
        if (!is_null($fuel_cost)) {
            $fuel_cost->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $fuel_cost);
        } else {
            return response($response);
        }
        return response($response);
    }

}

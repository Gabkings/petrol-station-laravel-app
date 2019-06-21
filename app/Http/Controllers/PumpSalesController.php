<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pump_Sales;
use App\Http\Requests;
use App\Http\Resources\Pump_SalesResource;

class Pump_SalesalesController extends Controller
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
        $pump_sales = Pump_Sales::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $pump_sales->count(), $pump_sales);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $pump_sales = Pump_Sales::find($id);
 
        if ($pump_sales) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $pump_sales);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'pump' => 'required',
            'volume' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $pump_sales = new Pump_Sales;
       $pump_sales->pump_id = $request->pump;
       $pump_sales->volume_sold = $request->volume;
       $pump_sales->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$pump_sales->count(),$pump_sales);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function Pump_SalesWithSoftDelete()
    {
        $pump_sales = Pump_Sales::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $pump_sales->count(), $pump_sales);
        return response($response);
    }


//get the Pump_Saless that are soft deleted only
    public function softDeleted()
    {
        $pump_sales = Pump_Sales::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $pump_sales->count(), $pump_sales);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $pump_sales = Pump_Sales::onlyTrashed()->find($id);
        if (!is_null($pump_sales)) {
            $pump_sales->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $pump_sales->count(), $pump_sales);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $pump_sales = Pump_Sales::onlyTrashed()->find($id);
        if (!is_null($pump_sales)) {
            $pump_sales->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $pump_sales);
        } else {
            return response($response);
        }
        return response($response);
    }

}

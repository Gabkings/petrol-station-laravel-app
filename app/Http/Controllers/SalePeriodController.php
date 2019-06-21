<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale_Period;
use App\Http\Requests;
use App\Http\Resources\Sale_PeriodResource;

class SalePeriodController extends Controller
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
        $sale_period = Sale_Period::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $sale_period->count(), $sale_period);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $sale_period = Sale_Period::find($id);
 
        if ($sale_period) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $sale_period);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'from' => 'required',
            'to' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $sale_period = new Sale_Period;
       $sale_period->date_from = $request->from;
       $sale_period->date_to = $request->to;
       $sale_period->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$sale_period->count(),$sale_period);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function Sale_PeriodWithSoftDelete()
    {
        $sale_period = Sale_Period::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $sale_period->count(), $sale_period);
        return response($response);
    }


//get the Sale_Periods that are soft deleted only
    public function softDeleted()
    {
        $sale_period = Sale_Period::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $sale_period->count(), $sale_period);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $sale_period = Sale_Period::onlyTrashed()->find($id);
        if (!is_null($sale_period)) {
            $sale_period->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $sale_period->count(), $sale_period);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $sale_period = Sale_Period::onlyTrashed()->find($id);
        if (!is_null($sale_period)) {
            $sale_period->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $sale_period);
        } else {
            return response($response);
        }
        return response($response);
    }

}

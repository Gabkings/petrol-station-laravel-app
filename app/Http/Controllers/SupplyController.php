<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;
use App\Http\Requests;
use App\Http\Resources\SupplyResource;
use JWTAuth;


class SupplyController extends Controller
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
       $supply = Supply::all();
        $response = $this->successfulMessage(200, 'Successfully', true,$supply->count(),$supply);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
      $supply = Supply::find($id);
 
        if ($Supply) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0,$supply);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }
    public function store(Request $request)
    {
        $rules = [
            'order_id' => 'required',
            'invoice' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'supplier_id' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
        ['','','amount','','','supplier_id'];
      $supply = new Supply;
      $supply->purchase_order_id = $request->order_id;
      $supply->invoice = $request->invoice;
      $supply->amount = $request->amount;
      $supply->supply_status = $request->supply_status;
      $supply->user_id = $request->user_id;
      $supply->supplier_id = $request->supplier_id;
      $supply->save();
      $response = $this->successfulMessage(201, 'Successfully created', true,$Supply->count(),$Supply);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function SupplyWithSoftDelete()
    {
       $supply = Supply::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true,$supply->count(),$supply);
        return response($response);
    }


//get the Supplys that are soft deleted only
    public function softDeleted()
    {
       $supply = Supply::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
           $supply->count(),$supply);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
       $supply = Supply::onlyTrashed()->find($id);
        if (!is_null($Supply)) {
           $supply->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true,$supply->count(),$supply);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
       $supply = Supply::onlyTrashed()->find($id);
        if (!is_null($Supply)) {
           $supply->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0,$supply);
        } else {
            return response($response);
        }
        return response($response);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase_Order;
use App\Http\Requests;
use App\Http\Resources\Purchase_OrderResource;

class PurchaseOrderController extends Controller
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
        $purchase_order = Purchase_Order::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $purchase_order->count(), $purchase_order);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $purchase_order = Purchase_Order::find($id);
 
        if ($purchase_order) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $purchase_order);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'volume' => 'required',
            'user_id' => 'required',
            'supplier_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $purchase_order = new Purchase_Order;
       $purchase_order->fuel_name = $request->name;
       $purchase_order->fuel_volume = $request->volume;
       $purchase_order->user_id = $request->user_id;
       $purchase_order->supplier_id = $request->supplier_id;
       $purchase_order->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$purchase_order->count(),$purchase_order);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function Purchase_OrderWithSoftDelete()
    {
        $purchase_order = Purchase_Order::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $purchase_order->count(), $purchase_order);
        return response($response);
    }


//get the Purchase_Orders that are soft deleted only
    public function softDeleted()
    {
        $purchase_order = Purchase_Order::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $purchase_order->count(), $purchase_order);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $purchase_order = Purchase_Order::onlyTrashed()->find($id);
        if (!is_null($purchase_order)) {
            $purchase_order->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $purchase_order->count(), $purchase_order);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $purchase_order = Purchase_Order::onlyTrashed()->find($id);
        if (!is_null($purchase_order)) {
            $purchase_order->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $purchase_order);
        } else {
            return response($response);
        }
        return response($response);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase_Order;
use App\Http\Requests;
use App\Http\Resources\Purchase_OrderResource;

class PurchaseOrderController extends Controller
{

        //
     public function index()
    {
       $purchase_order = Purchase_Order::paginate(12);
        return Purchase_OrderResource::collection($purchase_order);
    }

    public function show($id)
    {
        //Get the task
       $purchase_order = Purchase_Order::find($id);
 
        // Return a single task
        return new Purchase_OrderResource($purchase_order);
    }

        public function destroy($id)
    {
        //Get the task
       $purchase_order = Purchase_Order::find($id);
 
        if($purchase_order->delete()) {
            return new Purchase_OrderResource($purchase_order);
        } 
 
    }

    public function store(Request $request)  {
 
       $purchase_order = $request->isMethod('put') ? Purchase_Order::find($request->id) : new Purchase_Order;
       $purchase_order->fuel_name = $request->input('name');
       $purchase_order->fuel_volume = $request->input('volume');
       $purchase_order->user_id = $request->input('user id');
       $purchase_order->supplier_id = $request->input('supplier id');
        if($purchase_order->save()) {
            return new Purchase_OrderResource($purchase_order);
        } 
        
    }

}

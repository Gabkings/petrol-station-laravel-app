<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;
use App\Http\Requests;
use App\Http\Resources\SupplyResource;

class SupplyController extends Controller
{

        //
     public function index()
    {
       $supply = Supply::paginate(12);
        return SupplyResource::collection($supply);
    }

    public function show($id)
    {
        //Get the task
       $supply = Supply::find($id);
 
        // Return a single task
        return new SupplyResource($supply);
    }

        public function destroy($id)
    {
        //Get the task
       $supply = Supply::find($id);
 
        if($supply->delete()) {
            return new SupplyResource($supply);
        } 
 
    }

    public function store(Request $request)  {
 
       $supply = $request->isMethod('put') ? Supply::find($request->id) : new Supply;
       $supply->purchase_order_id = $request->input('order id');
       $supply->invoice = $request->input('invoice');
       $supply->amount = $request->input('amount');
       $supply->supply_status = $request->input('supply status');
       $supply->user_id = $request->input('user id');
       $supply->supplier_id = $request->input('supplier id');
        if($supply->save()) {
            return new SupplyResource($supply);
        } 
        
    }


}

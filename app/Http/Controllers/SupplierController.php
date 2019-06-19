<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests;
use App\Http\Resources\SupplierResource;

class SupplierController extends Controller
{

        //
     public function index()
    {
       $supplier = Supplier::paginate(12);
        return SupplierResource::collection($supplier);
    }

    public function show($id)
    {
        //Get the task
       $supplier = Supplier::find($id);
 
        // Return a single task
        return new SupplierResource($supplier);
    }

        public function destroy($id)
    {
        //Get the task
       $supplier = Supplier::find($id);
 
        if($supplier->delete()) {
            return new SupplierResource($supplier);
        } 
 
    }

    public function store(Request $request)  {
 
       $supplier = $request->isMethod('put') ? Supplier::find($request->id) : new Supplier;
       $supplier->name = $request->input('name');
       $supplier->contacts = $request->input('contacts');
        if($supplier->save()) {
            return new SupplierResource($supplier);
        } 
        
    }
    

}

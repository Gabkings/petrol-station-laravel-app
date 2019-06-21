<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests;
use App\Http\Resources\SupplierResource;

class SupplierController extends Controller
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
       $supplier = Supplier::all();
        $response = $this->successfulMessage(200, 'Successfully', true,$supplier->count(),$supplier);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
      $supplier = Supplier::find($id);
 
        if ($supplier) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0,$supplier);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'contacts' => 'required'

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
      $supplier = new Supplier;
      $supplier->name = $request->name;
      $supplier->contacts = $request->contacts;
      $supplier->save();
      $response = $this->successfulMessage(201, 'Successfully created', true,$supplier->count(),$supplier);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function SupplierWithSoftDelete()
    {
       $supplier = Supplier::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true,$supplier->count(),$supplier);
        return response($response);
    }


//get the Suppliers that are soft deleted only
    public function softDeleted()
    {
       $supplier = Supplier::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
           $supplier->count(),$supplier);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
       $supplier = Supplier::onlyTrashed()->find($id);
        if (!is_null($supplier)) {
           $supplier->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true,$supplier->count(),$supplier);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
       $supplier = Supplier::onlyTrashed()->find($id);
        if (!is_null($supplier)) {
           $supplier->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0,$supplier);
        } else {
            return response($response);
        }
        return response($response);
    }   

}

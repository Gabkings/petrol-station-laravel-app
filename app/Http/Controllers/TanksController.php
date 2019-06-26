<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tanks;
use App\Http\Requests;
use App\Http\Resources\TanksResource;
use JWTAuth;

class TanksController extends Controller
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
        $tanks = Tanks::all();
        $response = $this->successfulMessage(200, 'Successfully', true, $tanks->count(), $tanks);
        return response($response);
    }

    public function show($id)
    {
        //Get the task
       $Tanks = Tanks::find($id);
 
        if ($tanks) {
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $tanks);
        } else {
            $response = $this->notFoundMessage();
        }
        return response($response);
    }

    // public function destroy($id)
    // {
    //     $tanks = Tanks::destroy($id);
    //     if ($tanks) {
    //         $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $tanks);
    //     } else {
    //         $response = $this->notFoundMessage();
    //     }
    //     return response($response);
    // }




    public function store(Request $request)
    {
        $rules = [
            'tank_name' => 'required',
            'type_id' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['data'] = $validator->messages();
            return $response;
        }
       $tanks = new Tanks;
       $tanks->name = $request->name;
       $tanks->save();
        $response = $this->successfulMessage(201, 'Successfully created', true,$tanks->count(),$tanks);
        return response($response);
    }

//returns both non-deleted and softdeleted
    public function tanksWithSoftDelete()
    {
        $tanks = Tanks::withTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, $tanks->count(), $tanks);
        return response($response);
    }


//get the Tankss that are soft deleted only
    public function softDeleted()
    {
        $tanks = Tanks::onlyTrashed()->get();
        $response = $this->successfulMessage(200, 'Successfully', true, 
            $tanks->count(), $tanks);
        return response($response);
    }

// restoring the soft deleted 

    public function restore($id)
    {
        $tanks = Tanks::onlyTrashed()->find($id);
        if (!is_null($tanks)) {
            $tanks->restore();
            $response = $this->successfulMessage(200, 'Successfully restored', true, $tanks->count(), $tanks);
        } else {
            return response($response);
        }
        return response($response);
    }

//pemanent deleting the soft delete

  public function permanentDeleteSoftDeleted($id)
    {
        $tanks = Tanks::onlyTrashed()->find($id);
        if (!is_null($tanks)) {
            $tanks->forceDelete();
            $response = $this->successfulMessage(200, 'Successfully deleted', true, 0, $tanks);
        } else {
            return response($response);
        }
        return response($response);
    }

}

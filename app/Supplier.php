<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes; 
    //
    protected $filables = ['name','contact'];
    protected $table = 'suppliers';

    public function purchase_orders(){
    	return hasMany('App\Purchase_Order');
    }

    public function supply(){
    	return hasMany('App\Supply');
    }
}

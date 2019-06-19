<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
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

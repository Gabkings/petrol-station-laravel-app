<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase_Order extends Model
{
	use SoftDeletes; 
    protected $fillables = ['fuel_name','fuel_volume','user_id','supplier_id'];
    protected $table = 'purchase_orders';
}

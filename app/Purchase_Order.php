<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_Order extends Model
{
    protected $fillables = ['fuel_name','fuel_volume','user_id','supplier_id'];
    protected $table = 'purchase_orders';
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
	use SoftDeletes; 
    protected $fillables = ['purchase_order_id','invoice','amount','supply_status','user_id','supplier_id'];

    protected $table = 'supplies';
}


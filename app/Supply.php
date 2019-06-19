<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillables = ['purchase_order_id','invoice','amount','supply_status','user_id','supplier_id'];

    protected $table = 'supplies';
}


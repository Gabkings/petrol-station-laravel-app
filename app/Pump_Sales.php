<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pump_Sales extends Model
{
	use SoftDeletes; 
    protected $fillables = ['pump_id','volume_sold'];
    protected $table = 'pump_sales';
}



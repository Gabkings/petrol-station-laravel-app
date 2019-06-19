<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pump_Sales extends Model
{
    protected $fillables = ['pump_id','volume_sold'];
    protected $table = 'pump_sales';
}



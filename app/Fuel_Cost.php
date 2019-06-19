<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_Cost extends Model
{
    protected $fillables = ['fuel_type_id','period_id','cost_per_litre'];
    protected $table = 'fuel_costs';    
}

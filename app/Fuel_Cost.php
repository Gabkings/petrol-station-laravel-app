<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuel_Cost extends Model
{
	use SoftDeletes; 
    protected $fillables = ['fuel_type_id','period_id','cost_per_litre'];
    protected $table = 'fuel_costs';    
}

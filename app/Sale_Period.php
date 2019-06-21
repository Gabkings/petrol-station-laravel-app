<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale_Period extends Model
{
	use SoftDeletes; 
    
    protected $fillables = [
    	'date_from',
    	'date_to'

    ];

    protected $table = 'sale_periods';

    public function fuel_cost()
    {
        return $this->hasMany('App\Fuel_Cost');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_Period extends Model
{
    
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

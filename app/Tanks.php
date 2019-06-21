<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanks extends Model
{
	use SoftDeletes; 
    protected $fillables = ["tank_name","fuel_type_id"];


    public function fuel_types(){
    	return $this->belongsTo('App\Fuel_Types');
    }

    public function car()
    {
       return $this->hasOne(Tank_Readings::class);
    }
}

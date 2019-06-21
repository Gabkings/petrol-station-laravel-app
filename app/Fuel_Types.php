<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fuel_Types extends Model
{
	use SoftDeletes; 
    protected $fillable =[
    	'type_name'
    ];

    protected $table = "fuel_types";

    public function tanks()
    {
        return $this->hasMany('App\Tanks');
    }
}

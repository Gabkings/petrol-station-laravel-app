<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_Types extends Model
{
    protected $fillable =[
    	'type_name'
    ];

    protected $table = "fuel_types";

    public function tanks()
    {
        return $this->hasMany('App\Tanks');
    }
}

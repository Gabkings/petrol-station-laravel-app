<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pumps extends Model
{
	use SoftDeletes; 
    protected $fillables = ['pump_name','tank_id','unit_id'];

    public function tanks(){
    	return belongsTo('App\Tanks');
    }

    public function units(){
    	return belongsTo('App\Units');
    }
}



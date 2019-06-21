<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tank_Readings extends Model
{
    use SoftDeletes; 
    protected $fillables = [
    	'start_reading','close_reading','tank_id','user_id'
    ];

    protected $table = 'tank_readings';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tanks(){
    	return $this->hasOne('App\Tanks');
    }

}

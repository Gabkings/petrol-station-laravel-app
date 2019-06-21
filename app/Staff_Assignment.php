<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff_Assignment extends Model
{
	use SoftDeletes; 
    protected $fillables = ['user_id','assignment_name'];
    protected $table = 'staff_assignments';


    
}


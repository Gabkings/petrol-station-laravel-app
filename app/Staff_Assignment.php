<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_Assignment extends Model
{
    protected $fillables = ['user_id','assignment_name'];
    protected $table = 'staff_assignments';


    
}


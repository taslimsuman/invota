<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    


    public function payrolls(){

    	return $this->hasMany('App\Payroll');
    }

    public function presents(){

    	return $this->hasMany(Present::class);
    }

    public static function ActiveOnly(){

    	return static::where('status','Active')->get();

    } 

    
}

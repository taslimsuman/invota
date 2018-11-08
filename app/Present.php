<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    //


    public function employee(){

    	return $this->belongsTo(Employee::class)->withDefault();
    }


    public static function checkPresent($empid,$date){

    	$data = static::where('employee_id',$empid)
    					->where('pdate',$date)->count();

    	return $data;
    }
}

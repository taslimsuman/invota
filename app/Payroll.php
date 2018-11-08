<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    

    public function emoloyee(){

    	return $this->belongsTo('App\Employee');
    }


  

    public static function getSummary($id){

    	$thisMonthSalary = static::where('employee_id',$id)
                                    ->whereMonth('pdate',Date('m'))
                            ->sum('credit');
        $thisMonthTaken = static::where('employee_id',$id)
                                    ->whereMonth('pdate',Date('m'))
                            ->sum('debit');
        $totalSalaryIssued = static::where('employee_id',$id)
                          ->sum('credit');
        $totalPayments = static::where('employee_id',$id)
                          ->sum('debit');

    	return $summary = [

    		'thisMonthSalary'=> $thisMonthSalary,
    		'thisMonthTaken'=> $thisMonthTaken,
    		'totalSalaryIssued'=> $totalSalaryIssued,
    		'totalPayments' => $totalPayments

    	];
    }

    public static function paymentHistory($empid){

        return static::where('employee_id',$empid)->orderBy('pdate','DESC')->paginate(10);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;


class PayrollController extends Controller
{
    

    public function payment(Request $r){

    		    $this->validate($r,[

                'pdate' => 'required|date',
                'type' =>'required',
                'debit'=>'required|numeric|min:0',
                'credit'=>'required|numeric|min:0'

        ]);

        if($r->debit ==0 && $r->credit==0){

            return back()->with('danger','Debit or Credit must have value');
        }

        $payroll = new Payroll;

        $payroll->employee_id = $r->empid;
        $payroll->type = $r->type;
        $payroll->pdate = $r->pdate;
        $payroll->description = $r->description;
        $payroll->debit = $r->debit;
        $payroll->credit = $r->credit;
        $payroll->updateby = \Auth::user()->username;

        $payroll->save();

        return redirect()->route('employee.index');

            
        
    		

    }
}

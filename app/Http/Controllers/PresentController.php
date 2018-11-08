<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Present;

class PresentController extends Controller
{
    //


    public function index(){



    	$employees = Employee::ActiveOnly();;


    	return view('present.index',compact('employees'));

    }

    public function store(Request $r){

		$today = date('Y-m-d');

		if(!is_null($r->present_date)){  // check if the selected date is there;

		$today = $r->present_date;

		}



		$errors = [];

    	foreach ($r->empid as $key => $value) {

    		if(Present::checkPresent($value,$today)){

    			$errors[$key] = "This emp id ".$value." already updated";

    			continue; // if present is already update on same date skip it.

    		}  

			$present = new Present;
    
    		$present->pdate = $today;
    		$present->employee_id = $value;
    		$present->present = $r->present[$key];
    		
    		$present->save();
    	}

    	// if error show msg
    	if(count($errors)>0){
    	
    		return view('errors.errors',compact('errors'));
    	}

    	return back()->with('success', 'Present has been posted');
    }
}

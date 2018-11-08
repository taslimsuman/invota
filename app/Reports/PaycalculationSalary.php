<?php


namespace App\Reports;
use App\Reports\PaycalculationInterface;
use App\Employee;
use Carbon\Carbon;
use App\Present;

class PaycalculationSalary implements PaycalculationInterface {

	protected $employee;
	
	public function __construct(Employee $employee){

		$this->employee = $employee;
	}

	public function calculatepay(){

		$salarypPerDay = round($this->employee->salary/26);

		return $salarypPerDay * $this->getPresentThisMonth();

		
	}

	public function getPresentThisMonth(){

		return  $this->employee->presents()
						->whereYear('pdate',Carbon::now()->year)
						->whereMonth('pdate',Carbon::now()->month)
						->where('present','P')->count();


	}

	

}
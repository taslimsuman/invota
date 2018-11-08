<?php

namespace App\Invota\Report;

use App\Employee;
use App\Payroll;
use App\Invota\Report\PayCalculationInterface;

class PayCalculationSalary implements PayCalculationInterface{

	public function calculatePay($eid){

		return 'calcu for salary for:'.$eid;
	}

}
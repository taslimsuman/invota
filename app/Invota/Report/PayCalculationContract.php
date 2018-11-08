<?php

namespace App\Invota\Report;

use App\Employee;
use App\Payroll;
use App\Invota\Report\PayCalculationInterface;

class PayCalculationContract implements PayCalculationInterface{

	public function calculatePay($eid){

		return 'calc for contract for:'.$eid;

	}

}
<?php
namespace App\Invota\Report;

use App\Invota\Report\PayCalculationInterface;

class PayCalculate {

	
	public function calcu($emid, PayCalulationInterface $paycal){

		$paycal->calculatePay($emid);

	}

}
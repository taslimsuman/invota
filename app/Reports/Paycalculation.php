<?php
namespace App\Reports;


class Paycalculation {

	protected $paycalulate;

	public function __construct(PaycalculationInterface $paycalulate){

		$this->paycalulate = $paycalulate;
	}

	public function calculatePay(){

		return $this->paycalulate->calculatepay();
	}

}
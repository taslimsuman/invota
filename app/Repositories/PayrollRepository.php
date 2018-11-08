<?php
namespace App\Repositories;

use App\Payroll;


class PayrollRepository {


	protected $payroll;

	public function __construct(Payroll $payroll){

		$this->payroll = $payroll;

	}

	public function getThisMonth($eid,$month,$year){

		return $this->payroll->where('employee_id',$eid)
							->whereYear('pdate',$year)
							->whereMonth('pdate',$month)
							->sum('debit');
	}

	

}

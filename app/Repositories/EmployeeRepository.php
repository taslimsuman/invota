<?php
namespace App\Repositories;

use App\Employee;


class EmployeeRepository {


	protected $employee;

	public function __construct(Employee $employee){

		$this->employee = $employee;

	}

	public function find($id){

		return $this->employee->find($id);
	}

	

}

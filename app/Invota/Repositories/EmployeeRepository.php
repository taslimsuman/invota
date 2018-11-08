<?php
namespace App\Invota\Repositories;

use App\Employee;

class EmployeeRepository {

	public function getemp($id){

		return Employee::find($id);

	}
}
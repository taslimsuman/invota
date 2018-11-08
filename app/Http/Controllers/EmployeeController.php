<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Employee;
use App\Designation;
use App\Payroll;
use Auth;
use App\Repositories\EmployeeRepository;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $employee;

    public function __construct(EmployeeRepository $employee){
        
        $this->middleware('auth');

        $this->employee = $employee;

    }

    public function index()
    {

           // $emp = Employee::find(1);


            //$took = new \App\Repositories\PayrollRepository(new Payroll);

            //return $took->getThisMonth($emp->id,11,2018);


        $employees = Employee::all();        
        return view('employee.index',compact('employees'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $designations = Designation::pluck('name');

        return view('employee.create',compact('designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {


        $this->validate($r,[

            'name' => 'required',
            'contact' =>'required|min:11|max:11',
            'paytype'=>'required',
            'salary' => 'required|numeric|max:99999',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100',
            'dox' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:200',
            

        ]);
        

        $employee = new Employee();

        $employee->name = $r->name;
        $employee->designation = $r->designation;
        $employee->address = $r->address;
        $employee->contact = $r->contact;
        $employee->doj = $r->doj;
        $employee->paytype = $r->paytype;
        $employee->salary = $r->paytype=='Contract'?0:$r->salary;
        $employee->status = $r->status;

        $photo_path = 'Attachments/employee/pics';
        $dox_path = 'Attachments/employee/dox';
        

        if($r->hasFile('photo')){

            $employee->photo =  $this->uploadItem($r->file('photo'),$photo_path);
        }

        if($r->hasFile('dox')){

            $employee->dox = $this->uploadItem($r->file('dox'),$dox_path);
        }

       $employee->save();

       return redirect()->route('employee.index')->with('success','Employee added successfully');
        
        

    }

    public function uploadItem($file,$path){
            
            $image = $file;
            $rnd = str_random(64);
            $img1 = $rnd.'.'.$image->getClientOriginalExtension();
            $image->move($path,$img1);

            return $img1;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $employee = Employee::with('payrolls')->find($id);

        $summary = Payroll::getSummary($employee->id);

        $payrolls = Payroll::paymentHistory($employee->id);
       
        $CalculateSalary = $this->getSalaryCalculation($id);

        return view('employee.show',compact('employee','payrolls','summary','CalculateSalary'));
    }


    public function getSalaryCalculation($id){

        $report = 0;

         $emp = Employee::find($id);

        if($emp->paytype=='Salary'){

            $calculate = new \App\Reports\PaycalculationSalary($emp);

        }elseif($emp->paytype=='Contract'){

            $calculate = new \App\Reports\PaycalculationSalary($emp);

        }

        $report = new \App\Reports\Paycalculation($calculate);

        return $report->calculatePay();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $designations = Designation::pluck('name');

        return view('employee.edit',compact('employee','designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        
        $this->validate($r,[

            'name' => 'required',
            'contact' =>'required|min:11|max:11',
            'salary' => 'required|numeric|max:99999',
            'paytype'=>'required'

        ]);




        $emp = Employee::find($id);

        $photo_path = 'Attachments/employee/pics';
        $dox_path = 'Attachments/employee/dox';

        $emp->name = $r->name;
        $emp->designation = $r->designation;
        $emp->address = $r->address;
        $emp->contact = $r->contact;
        $emp->doj = $r->doj;
        $emp->paytype = $r->paytype;
        $emp->salary = $r->paytype=='Salary'?$r->salary:0;
        $emp->status = $r->status;
        $emp->note = $r->note;

        $xphoto = asset('Attachments/employee/pics').'/'.$emp->photo;
          
    
        
        if($r->hasFile('photo')){

            $emp->photo =  $this->uploadItem($r->file('photo'),$photo_path);

        }

        if($r->hasFile('dox')){

            $emp->dox = $this->uploadItem($r->file('dox'),$dox_path);
        }

        $emp->save();

        return redirect()->route('employee.index')->with('success','Employee has been modified');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $emp = Employee::find($id);

        $emp->delete();

        return redirect()->route('employee.index')->with('success','Employee has been deleted');
    }


}

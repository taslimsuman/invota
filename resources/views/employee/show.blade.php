@extends('layouts.master')
@section('header','')

@section('content')

@include('layouts.alert')
  <div class="panel panel-primary">
  <div class="panel-heading">
  	<h3 class="panel-title">Employee profile</h3>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-9">
         <table class="table table-bordered">
          <tr>
            <td><b>Name:</b></td>
            <td>{{$employee->name}}</td>
            <td><b>Designation:</b></td>
            <td>{{$employee->designation}}</td>
           
          
          </tr>
          <tr>
            <td><b>Address:</b></td>
            <td>{{$employee->address}}</td>
            <td><b>Status:</b></td>
             <?php
                $type = 'primary';
                if($employee->status=='Active'){
                    $type = 'success';
                }elseif($employee->status=='Leave'){
                  $type = 'warning';
                }else{
                  $type = 'danger';
                }
              ?>

            <td><span class="badge progress-bar-{{$type}}">{{$employee->status}}</span></td>
          </tr>
          <tr>
             <td><b>Date of Join:</b></td>
              <td>{{$employee->doj}}</td>
              <td><b>Salary:</b></td>
              <td>Tk. {{$employee->salary}} /-</td>
          </tr>
          <tr>
            <td><b>Attachement:</b></td>
              <td>
                @if($employee->dox)
                <a href="{{asset('Attachments/employee/dox')}}/{{$employee->dox}}" target="_blank">Attachment</a>
                @endif
              </td>
              <td>
                <b>Payment summary</b>
              </td>
              <td>
                <p>Payable(This Month): Tk. {{$CalculateSalary}}</p>
                <p>Advance taken: Tk. {{$summary['thisMonthTaken']}}/-</p>
                <p style="color:{{$summary['thisMonthTaken'] > $CalculateSalary?'red':''}}">
                Balance: Tk. {{$CalculateSalary-$summary['thisMonthTaken']}}/-</p>
              </td>
              
          </tr>
          <tr>
            <td><b>Note:</b></td>
            <td colspan="3">

              {{$employee->note}}
            </td>
          </tr>
          
          <tr>
            <td colspan="4">
              <a href="{{route('employee.index')}}" class="btn btn-primary">Back</a>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Payment</button>
            </td>
          </tr>
          
        </table>
      </div>
      <div class="col-md-3">
        <img src="{{asset('Attachments/employee/pics')}}/{{$employee->photo?$employee->photo:'a.jpg'}}" class="img-responsive" width="200">
      </div>
    </div>

 </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h3 class="panel-title">Payment and Present Details</h3>
    
  </div>

  <div class="panel-body">
    <form action="#">
      <input type="hidden" name="empid" value="{{$employee->id}}">
      <div class="row">
        <div class="form-group col-md-4">
          <label>From:</label>
          <input type="text" name="from_date" class="form-control datepicker">
        </div>
        <div class="form-group col-md-4">
          <label>To:</label>
          <input type="text" name="to_date" class="form-control datepicker">
        </div>
        <input type="submit" value="Find" class="btn btn-primary">
      </div>
    </form>

  </div>
  
</div>

<!-- payhistory -->
<div class="panel panel-primary">
  <div class="panel-heading">
    
      <h3 class="panel-title">Payment history</h3>
    
  </div>

  <div class="panel-body">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Date</th>
          <th>Type</th>
          <th>Description</th>
          <th>Debit</th>
          <th>Credit</th>
          <th>Updateby</th>
        </tr>
      </thead>
      <tbody>
        @foreach($payrolls as $payroll)
        <tr>
          <td>{{$payroll->pdate}}</td>
          <td>{{$payroll->type}}</td>
          <td>{{$payroll->description}}</td>
          <td>{{$payroll->debit}}</td>
          <td>{{$payroll->credit}}</td>
          <td>{{$payroll->updateby}}</td>
         
        </tr>
        @endforeach
      </tbody>
    </table>
    {{$payrolls->links()}}
  </div>
  
</div>
   

@include('employee.modal_add_payment')
@endsection


@section('script')

<script type="text/javascript">



</script>
@endsection
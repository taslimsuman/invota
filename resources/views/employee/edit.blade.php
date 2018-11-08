@extends('layouts.master')
@section('header','Edit')
@section('content')

@section('stylesheet')
	
	<link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">
@endsection


@include('layouts.alert')

	<div class="row">
		<div class="col-md-10">
				<!-- panel -->
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Edit form</h3>
			  </div>
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-8">
						<form method="post" action="{{route('employee.update',$employee->id)}}"  enctype="multipart/form-data" data-parsley-validate>
							{{csrf_field()}}
							{{method_field('put')}}
						
						<div class="row">
							<div class="form-group col-md-6">
							<label>Name</label>
							
							<input type="text" name="name" class="form-control" value="{{old('name',$employee->name)}}" required>
							</div>

							<div class="form-group col-md-6">
							<label>Designation</label>
							
							<select class="form-control" name="designation">
								@foreach($designations as $designation)
								<option value="{{$designation}}" {{$designation==$employee->designation?'selected="selected"':''}}>{{$designation}}</option>
					            @endforeach
							</select>
							</div>
						
							
						</div>
						<div class="row">
							
							<div class="form-group col-md-12">
							<label>Address</label>
							<input type="text" name="address" class="form-control" value="{{old('address',$employee->address)}}" required>
							</div>
							
						</div>

						<div class="row">
							
							<div class="form-group col-md-6">
								<label>Contact</label>
							<input type="text" name="contact" class="form-control" value="{{old('contact',$employee->contact)}}" required>
							</div>
							<div class="form-group col-md-6">
							<label>Date of Join</label>
							<input type="text" name="doj" class="form-control datepicker" value="{{old('doj',$employee->doj)}}" required>
							</div>
						</div>

						
						<div class="row">
							<div class="form-group col-md-4">
								<label>Paytype</label>
								<?php
								 $paytype = ['Salary','Contract'];
								?>
								<select name="paytype" class="form-control">
									@foreach($paytype as $pay)
									<option value="{{$pay}}" @if($pay==$employee->paytype) selected='selected' @endif>{{$pay}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group col-md-4">
							<label>Salary</label>
							
							<input type="text" name="salary" class="form-control" value="{{old('salary',$employee->salary)}}" required>
							</div>
							<div class="form-group col-md-4">
							<label>Status</label>
							<?php
								 $arr = ['Active','Leave','Emergency Leave','Cancelled','Terminated'];

							?>
							
							<select name="status" class="form-control">
								@foreach($arr as $v)
								<option value="{{$v}}" @if($v==$employee->status) selected='selected' @endif>{{$v}}</option>
								@endforeach
							</select>

							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>Photo</label>
								<input type="file" name="photo" class="form-control">
							</div>

							<div class="form-group col-md-4">
								<label>ID/Doc</label>
								<input type="file" name="dox" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>Note</label>
								<textarea name="note" rows="5" cols="50" class="form-control">{{$employee->note}}</textarea>
							</div>
						</div>
						
						<div class="row">
							<div class="form-group col-md-6">
								<input type="submit" class="btn btn-success" value="Submit">
								
								<a href="{{route('employee.index')}}" class="btn btn-default">Cancel</a>
							</div>
							
						</div>

						</form>

						<form action="{{route('employee.destroy',$employee->id)}}" method="post">
							{{csrf_field()}}
							{{method_field('delete')}}

					 	<input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete the employee?')">
					 	</form>

					</div>
			  		<div class="col-md-2 col-md-offset-1">
			  			@if($employee->photo)
			  			 <a href="#" class="thumbnail">
					      <img src="{{asset('Attachments/employee/pics')}}/{{$employee->photo}}" alt="...">
					    </a>
					    @endif
			  		</div>
			  	</div>

				</div>
			</div>
			<!-- end panel -->
	
		</div>
	</div>

@endsection

@section('script')
  
  <script type="text/javascript" src="{{asset('js/parsley.min.js')}}"></script>
@endsection
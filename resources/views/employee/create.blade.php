@extends('layouts.master')
@section('header','Registration')
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
			    <h3 class="panel-title">Employee registration form</h3>
			  </div>
			  <div class="panel-body">
			  	
					<form method="post" action="{{route('employee.store')}}" enctype="multipart/form-data" data-parsley-validate>
						{{csrf_field()}}
					
					<div class="row">
						<div class="form-group col-md-4">
						<label>Name</label>
						
						<input type="text" name="name" class="form-control" required value="{{old('name')}}">
						</div>

						<div class="form-group col-md-4">
						<label>Designation</label>
						
						<select class="form-control" name="designation" required>
							<option value="">--select--</option>
							@foreach($designations as $designation)
							<option value="{{$designation}}">{{$designation}}</option>
				            @endforeach

						</select>
						</div>
					
						
					</div>
					<div class="row">
						
						<div class="form-group col-md-8">
						<label>Address</label>
						<input type="text" name="address" class="form-control" value="{{old('address')}}" required>
						</div>
						
					</div>

					<div class="row">
						
						<div class="form-group col-md-4">
							<label>Contact</label>
						<input type="number" name="contact" class="form-control" minlength="11" maxlength="11" value="{{old('contact')}}" required>
						</div>
						<div class="form-group col-md-4">
						<label>Date of Join</label>
						<input type="text" name="doj" class="form-control datepicker" value="{{old('doj')}}" required autocomplete="off">
						</div>
					</div>

					
					<div class="row">
						<div class="form-group col-md-4">
						<label>Paytype</label>
						
						<select name="paytype" class="form-control" required>
							<option value="Salary" selected>Salary</option>
							<option value="Contract">Contract</option>
							
						</select>
						</div>
						<div class="form-group col-md-4">
						<label>Status</label>
						
							@include('inc/status')

						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4">
						<label>Salary</label>
						
						<input type="text" name="salary" class="form-control" value="{{old('salary')}}" required>
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
						<div class="form-group col-md-6">
							<input type="submit" class="btn btn-success" value="Submit">
							<a href="{{route('employee.index')}}" class="btn btn-danger">Cancel</a>
						</div>
						<div class="form-group col-md-6">
							
						</div>
					</div>

					</form>

				</div>
			</div>
			<!-- end panel -->
	
		</div>
	</div>

@endsection

@section('script')
  
  <script type="text/javascript" src="{{asset('js/parsley.min.js')}}"></script>
@endsection
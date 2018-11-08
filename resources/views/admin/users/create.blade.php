@extends('layouts.master')
@section('header','Create User')
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
			    <h3 class="panel-title">Enter user details</h3>
			  </div>
			  <div class="panel-body">
			  	
					<form method="post" action="{{route('user.store')}}" data-parsley-validate>
						{{csrf_field()}}
					
					<div class="row">
						<div class="form-group col-md-8">
						<label>Name</label>
						
						<input type="text" name="name" class="form-control" required>
						</div>
					
						
					</div>
					<div class="row">
						
						<div class="form-group col-md-4">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
						</div>

						<div class="form-group col-md-4">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
						</div>

						
					</div>

					<div class="row">
						
						<div class="form-group col-md-4">
							<label>Password</label>
						<input type="password" name="password" class="form-control" required>
						</div>
						<div class="form-group col-md-4">
						<label>Password confirm</label>
						<input type="password" name="password_confirm" class="form-control" required>
						</div>
					</div>

					
					<div class="row">
						<div class="form-group col-md-4">
						<label>Role</label>
						
						<select class="form-control" name="user_role">
							<option value="Admin">Admin</option>
							<option value="Manager">Manager</option>
						</select>
						</div>
						<div class="form-group col-md-1">
						<label>Status</label>
						
						<input type="checkbox" name="status" value="1">

						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
							<input type="submit" class="btn btn-success" value="Submit">
							<a href="{{route('user.index')}}" class="btn btn-danger">Cancel</a>
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
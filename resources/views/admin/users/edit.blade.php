@extends('layouts.master')
@section('content')

@section('stylesheet')
	<link rel="stylesheet" type="text/css" href="{{asset('css/parsley.css')}}">
@endsection

<div class="container">
@include('layouts.alert')
	<h3>Edit</h3>
	<div class="row">
		<div class="col-md-10">		
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">User details</h3>
			  </div>
			  <div class="panel-body">
			  	<form method="POST" action="{{route('user.update',$user->id)}}">
			  		{{method_field('PUT')}}
						{{csrf_field()}}
					
					<div class="row">
						<div class="form-group col-md-8">
						<label>Name</label>
						
						<input type="text" name="name" value="{{$user->name}}" class="form-control" required>
						</div>
					
						
					</div>
					<div class="row">
						
						<div class="form-group col-md-4">
						<label>Email</label>
						<input type="email" name="email" value="{{$user->email}}" class="form-control" required>
						</div>

						<div class="form-group col-md-4">
						<label>Username</label>
						<input type="text" name="username" value="{{$user->username}}" class="form-control" required>
						</div>

						
					</div>
					
					<div class="row">
						<div class="form-group col-md-4">
						<label>Role</label>
						
						<select class="form-control" name="user_role">
								
							<?php
							 $arr = ['Admin','Manager'];

							?>

							@foreach($arr as $v)
							   <option value="{{ $v }}" @if($user->user_role=== $v) selected='selected' @endif> {{ $v }}</option>
							@endforeach

						</select>
						</div>
						<div class="form-group col-md-1">
						<label>Status</label>
						
						<input type="hidden" name="status" value="0">
						<input type="checkbox" value="1" name="status" @if($user->status==1) checked @endif>

						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-md-6">
							<input type="submit" class="btn btn-success" value="Submit">
							<a href="{{route('user.index')}}" class="btn btn-warning">Cancel</a>
						</div>
						<div class="form-group col-md-6">
							
						</div>
					</div>

					</form>

					<div class="row">
						<div class="col-md-4">
						<form action="{{url('deleteuser')}}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="userid" value="{{$user->id}}">
							
					 	<input type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete the user?')">
					 	</form>
					</div>
					</div>
			  	
			  </div>
			</div>
			<!-- end panel -->
		</div>
		<br>
		
	</div>
	
</div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/parsley.min.js')}}"></script>
  
@endsection
@extends('layouts.master')
@section('header','User')

@section('content')

@include('layouts.alert')
  <div class="panel panel-default">
  <div class="panel-heading">
  	<h3 class="panel-title">Profile</h3>
  </div>
  <div class="panel-body">
    <table class="table table-bordered">
      <tr>
      	<td><b>Name:</b></td>
      	<td>{{$user->name}}</td>
      	<td><b>Email:</b></td>
      	<td>{{$user->email}}</td>
       
      
      </tr>
      <tr>
        <td><b>Access level:</b></td>
        <td>{{$user->user_role}}</td>
        <td><b>Status:</b></td>
        <td>{{$user->status==1?'Active':'Inactive'}}</td>
      </tr>
      <tr>
         <td><b>Username:</b></td>
          <td>{{$user->username}}</td>
          <td><b>Note:</b></td>
          <td></td>
      </tr>
      
    </table>

    <div class="row">
      <form action="{{url('/chageuserpass')}}" method="post">
        {{csrf_field()}}
          <input type="hidden" name="user_id" value="{{$user->id}}">
          <div class="col-md-4">
            <input type="password" name="new_pass" class="form-control" placeholder="Enter new password" required>
          </div>
          <div class="col-md-2">
          <input type="submit" class="btn btn-success btn-sm" value="Reset Password">
          </div>

        </form>
    </div>
  
  
  {{-- end tab --}}
  
  </div>
</div>
@endsection


@section('script')

<script type="text/javascript">



</script>
@endsection
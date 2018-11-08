@extends('layouts.master')
@section('header','User Manager')

@section('content')

@include('layouts.alert')
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            <a href="{{route('user.create')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add User</a>
          </div>
          <div class="panel-body">
            
                <table class="table">
                    <thead>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th style="text-align: right;">Action</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('user.show',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}
                            
                        </td>
                        <td>
                          {{ $user->user_role }}
                        </td>
                        <td>{{$user->status=="1"?"Active":"Inactive"}}</td>
                        <td align="right">
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil-square-o"></i> Edit</a>

                       
                        
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
      </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->

<!-- end container -->

<script type="text/javascript">

  function conf(){
    return confirm('Are you sure want to delete the User?');
  }
  
</script>

@endsection
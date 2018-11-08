@extends('layouts.master')
@section('header','Employee Manager')

@section('content')

@include('layouts.alert')
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            <a href="{{route('employee.create')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Add Employee</a>
          </div>
          <div class="panel-body">
            
                <table class="table display" id="employees">
                    <thead>
                        <th>Emp Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th style="text-align: right;">Action</th>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                    
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td><a href="{{route('employee.show',$employee->id)}}">{{$employee->name}}</a></td>
                        <td>{{$employee->designation}}</td>
                        <td>{{$employee->contact}}
                            
                        </td>
                        <td>{{$employee->status}}</td>
                        <td align="right">
                        <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil-square-o"></i> Edit</a>

                       
                        
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

@section('script')

<script type="text/javascript">
    
      $(document).ready( function () {
    $('#employees').DataTable();
} );

$(document).ready(function(){

    $('.alert').delay(500).fadeOut(2000);

});

</script>

@endsection
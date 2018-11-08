@extends('layouts.master')
@section('header','Employee present')

@section('content')

@include('layouts.alert')
    <div class="row">
        <div class="col-md-12">
        <form method="post" action="{{url('/present')}}">
             {{csrf_field()}}

        <div class="panel panel-default">
          <div class="panel-heading">
            <div class="row">
            <div class="col-md-3">
                <label>Date:</label>
                <input type="text" name="present_date" id="dateselector" class="datepicker" autocomplete="off">
            </div>
            </div>
            
          </div>
          <div class="panel-body">
                
                    <table class="table display" id="employees">
                       
                        <thead>
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th style="text-align: right;">Action</th>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                        
                        <tr>
                            <td>{{$employee->id}}</td>
                            <input type="hidden" name="empid[]" value="{{$employee->id}}">
                            <td><a href="{{route('employee.show',$employee->id)}}">{{$employee->name}}</a></td>
                            <td>{{$employee->designation}}</td>                           
                            <td>{{$employee->status}}</td>
                            <td width="200px">
                                <select name="present[]" class="form-control">
                                    <option value="P" selected>Present</option>
                                    <option value="A">Absent</option>
                                    
                                </select>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <input type="submit" value="Submit" class="btn btn-success">
                </form>
            </div>
        </div>
        <!-- end panel -->
      </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->

<!-- end container -->




@endsection

@section('script')

<script type="text/javascript">


    
    $(function(){

        $('#dateselector').datepicker("setDate", new Date() );
    });


</script>

@endsection
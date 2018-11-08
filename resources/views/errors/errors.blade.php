@extends('layouts.master')

@section('content')
<div class="container">
	<h2>Error log</h2>
    <div class="row">
        
        <div id="alertbox">
			@if (count($errors) > 0)
			            <div class="alert alert-danger">
			                <ul>
			                    @foreach ($errors as $error)
			                        <li>{{ $error }}</li>
			                    @endforeach
			                </ul>
			            </div>
			@endif

		</div>

    </div>
</div>
@endsection

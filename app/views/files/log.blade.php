@extends('layouts.default')

@section('body')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2></h2>
		@if(Session::has('message'))
			<div class="alert-box success">
				<h2>{{ Session::get('upload_time') }}</h2>
				<br>
				<h2>{{ Session::get('error_count') }}</h2>
				<br>
				<h2>{{ Session::get('upload_date') }}</h2>
				<br>
				<h2>{{ 'User: ' . Auth::user()->first_name .' '. Auth::user()->last_name }}</h2>					
            </div>
		@endif	
    </div>
</div>
@stop

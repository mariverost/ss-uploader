@extends('layouts.default')

@section('body')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>Login</h2>
		{{ Form::open(array('url' => 'login', 'method' => 'post')) }}
			
			@foreach ($errors->all() as $message)
				{{$message}} <br>
			@endforeach
			
			<div class="form-group">
				{{Form::label('email','Email')}}
				{{Form::text('email', null,array('class' => 'form-control'))}}
			</div>
			<div class="form-group">
				{{Form::label('password','Password')}}
				{{Form::password('password',array('class' => 'form-control'))}}
			</div>
			{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
		{{ Form::close() }}
    </div>
</div>
@stop

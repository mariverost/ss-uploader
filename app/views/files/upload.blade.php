@extends('layouts.default')

@section('body')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>Upload</h2>
		{{ Form::open(array('files' => TRUE)) }}
			
			@foreach ($errors->all() as $message)
				{{$message}} <br>
			@endforeach
			<div class="form-group">
				{{ Form::label('fileToProcess', 'Contacts File (Sorry, CSV only!)') }}
			</div>
			<div class="form-group">
				{{ Form::file('fileToProcess') }}
			</div>
			{{ Form::submit('Process it!') }}
		{{Form::close() }}
    </div>
</div>
@stop

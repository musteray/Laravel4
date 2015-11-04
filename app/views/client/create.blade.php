@extends('layout.default')

@section('title')
	<title>Add Client</title>
@stop

@section('css')
	<style>

		@import url(https://fonts.googleapis.com/css?family=Open+Sans);
		@import url(https://fonts.googleapis.com/css?family=Lora);

		/*
			font-family: 'Open Sans', sans-serif;
			font-family: 'Lora', serif;
		*/

		button, input, label {
			font-family: 'Open Sans', sans-serif;
			padding: 2px;
		}

		select {
			font-family: 'Lora', serif;
			padding: 3px;
			width: 165px;
		}

		form {
			margin-top: 15px;
		}

	</style>
@stop

@section('content')
	<a href="../crud"><button>Back to Main</button></a>
	{{ Form::open(array('url' => 'crud')) }}
		<div>
			{{ Form::label('Client Name', 'Name') }}
			{{ Form::text('Name', Input::old('Name')) }}
		</div>

		<div style="margin-top:3px;margin-left:9px;">
			{{ Form::label('Type', 'Type') }}
			{{ Form::select('type', $type) }}
		</div>

		<div style="margin-top:3px;">
			{{ Form::label('Status', 'Status') }}
			{{ Form::select('status', $status) }}
		</div>

		<div style="margin-top:5px;margin-left:55px;">
			{{ Form::submit('Submit') }}
		</div>
	{{ Form::close() }}
@stop

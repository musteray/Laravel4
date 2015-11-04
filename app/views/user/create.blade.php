<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Lora);

	.button {
		padding: 8px;
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
	}
	label, input {
		font-family: 'Open Sans', sans-serif;
	}
</style>
<body>
	<div style="margin-top: 50px;margin-left:50px;">
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url'=>'api', '_method'=> 'post')) }}
			{{ Form::label('username','Username') }}
			{{ Form::text('username', Input::old('name')) }}
			<br/>
			<br/>
			{{ Form::label('email','Email Address') }}
			{{ Form::text('email', Input::old('email')) }}
			<br/>
			<br/>
			{{ Form::submit('Submit', array('class'=>'button') ) }}
		{{ Form::close() }}
	</div>
</body>
</html>
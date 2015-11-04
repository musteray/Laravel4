<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Lora);

	/*
		font-family: 'Open Sans', sans-serif;
		font-family: 'Lora', serif;
	*/

	input, label {
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
	}

	form {
		margin-top: 50px;
		margin-left: 50px;
	}

	h1 {
		color: red;
		font-family: 'Lora', serif;
		font-size: 18px;
	}

	select {
		font-family: 'Open Sans', sans-serif;
		padding: 5px;
		width: 205px;
	}

</style>
<body>
	{{ Form::open(['route'=>'api.store']) }}
		<h1>
			@if(Session::has('message'))
				{{ Session::get('message') }}
			@endif
		</h1>

		<div style="margin-top:5px;">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username') }}
		</div>

		<div style="margin-top:3px;margin-left:5px;">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</div>

		<div style="margin-top:4px;margin-left:86px;">
			{{ Form::select('option', array('api' => 'API', 'crud'=> 'CRUD - Under Maintenance'), 'api') }}
		</div>

		<div style="margin-left:85px;margin-top:5px;">
			{{ Form::submit('Login') }}
		</div>
	{{ Form::close() }}
</body>
</html>
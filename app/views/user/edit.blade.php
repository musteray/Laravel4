<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Lora);

	/*
		font-family: 'Open Sans', sans-serif;
		font-family: 'Lora', serif;
	*/

	.button {
		padding: 5px;
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
	}

	label, input {
		font-family: 'Open Sans', sans-serif;
	}

	h1 {
		font-family: 'Lora', serif;
		color: green;
		font-size: 20px;
	}

</style>
<body>
	<div style="margin-top: 50px;margin-left:50px;">
		<h1> Edit {{ $user->username }}</h1>
		{{ Form::model($user, array('route' => array('api.update', $user->id), 'method'=>'PUT')) }}
			<div>
				{{ Form::label('username','Username') }}
				{{ Form::text('username') }}
				{{ $errors->first('username') }}
			</div>
			<div style="margin-top: 4px;">
				{{ Form::label('email', 'Email Address') }}
				{{ Form::email('email') }}
				{{ $errors->first('email') }}
			</div>
			<div style="margin-top:8px;">
				{{ Form::submit('Submit', array('class' => 'button')) }}
			</div>
		{{ Form::close() }}
	</div>
</body>
</html>
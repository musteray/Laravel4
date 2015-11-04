
<!DOCTYPE html>
<html>
<head>
	<title>LARAVEL RESTFUL CRUD</title>
</head>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Open+Sans);
	@import url(https://fonts.googleapis.com/css?family=Lora);

	/*
		font-family: 'Open Sans', sans-serif;
		font-family: 'Lora', serif;
	*/

	h1{
		font-family: 'Open Sans', sans-serif;
	}

	.button, button {
		padding: 10px;
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
	}

	.button2 {
		padding: 5px;
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
	}

	table, th, td {
	    border: 1px solid gray;
	    padding: 8px;
	    font-family: 'Lora', serif;
	    margin-top: 15px;
	}

	strong {
		font-family: 'Lora', serif;
		font-size: 15px;
		color: green;
	}

	.search {
		font-family: 'Open Sans', sans-serif;
		font-size: 17px;
		padding: 5px 0px;
	}
	

</style>
<body>
	<h1>Hello World!</h1>
	<br/>
	<a href="api/create" style="margin-bottom: 10px;position:absolute;"><button>Add User</button></a>
	<div style="margin-left: 400px;position:absolute;">
		{{ Form::open(array('url'=>'search', 'method'=>'GET')) }}
			{{ Form::text('search', '', array('class'=>'search')) }}
			{{ Form::submit('Search', array('class'=>'button2')) }}
		{{ Form::close() }}
	</div>
	<div style="margin-left:700px;">
		<a href="logout"><button>Logout</button></a>
	</div>
	<br/>
	<br/>
	@if (Session::has('message'))
	    <strong>{{ Session::get('message') }}</strong>
	@endif	



	<table style=" border-collapse: collapse;">
		<thead>
			<tr>
				<th>
					Username
				</th>
				<th>
					Email
				</th>
				<th>
					Date Created
				</th>	
				<th>
					Date Updated
				</th>
				<th colspan="2">
				</th>
			</tr>
		</thead>
		<tbody>
	
				@foreach ($user as $value) 
					<tr>
						<td>{{ $value->username }}</td>
						<td>{{ $value->email }}</td>
						<td>{{ $value->created_at }}</td>
						<td>{{ $value->updated_at }}</td>
						<td><a href = '{{ URL::to('api/'.$value->id.'/edit') }}'><button>Edit</button></a></td>
						<td>

							{{ Form::open(array('url'=>'api/'.$value->id)) }}
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::submit('Delete', array('class'=> 'button')) }}
							{{ Form::close() }}

							<!-- 
							{{ Form::open(array('url' => 'nerds/' . $value->id, 'class' => 'pull-right')) }}
                    				{{ Form::hidden('_method', 'DELETE') }}
                    				{{ Form::submit('Delete this Nerd', array('class' => 'btn btn-warning')) }}
                				  {{ Form::close() }} 
                			-->
						</td>
					</tr>
				@endforeach

		</tbody>
	</table>
</body>
</html>
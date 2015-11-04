@extends('layout.default')

@section('title')
	<title>Client Laravel RestFUL CRUD</title>
@stop

@section('css')
	<style>

		@import url(https://fonts.googleapis.com/css?family=Open+Sans);
		@import url(https://fonts.googleapis.com/css?family=Lora);

		/*
			font-family: 'Open Sans', sans-serif;
			font-family: 'Lora', serif;
		*/
		
		table, th, td {
		    border: 1px solid gray;
		    padding: 10px;
		    font-family: 'Open Sans', sans-serif;
		    margin-top: 30px;
		    text-align: center;
		}

		table {
			border-collapse: collapse;
		}

		button, input {
			font-family: 'Open Sans', sans-serif;
			padding: 5px;
		}

		h1 {
			font-family: 'Open Sans', sans-serif;
		}

		a {
			text-decoration: none;
			font-family: 'Open Sans', sans-serif;
			transition: color 1s; 
		}

		a:hover {
			color: gray;
		}

		a:focus {
			color: green;
		}

	</style>
@stop


@section('content')

<div>
	<a href="crud/create" style="position:absolute;"><button>Add Client</button></a>
	<div style="margin-left: 140px;position:absolute;">
		{{ Form::open(array('url'=>'query', 'method'=>'GET')) }}
			{{ Form::text('search') }}
			{{ Form::submit('Search') }}
		{{ Form::close() }}
	</div>

	<div style="margin-left:390px;">
		<a href="{{ URL::to('Logout') }}">Logout</a>
	</div>
</div>

<table>	
	<thead>
		<tr>
			<th>Client Name</th>
			<th>Type</th>
			<th>Status</th>
			<th colspan="2"></th>
		</tr>
	</thead>

	<tbody>
		@foreach ($data as $value )
		<tr>
			<td> {{ $value->Name }} </td>
			<td> {{ $value->Type->type }} </td>
			<td> {{ $value->Status->status }} </td>
			<td> <a href ='{{ URL::to('crud/'.$value->id.'/edit') }}'><button>Edit</button></a> </td>
			<td>
				{{ Form::open(array('url'=>'crud/'.$value->id, 'method'=>'DELETE')) }}
					{{ Form::submit('Delete', array('class'=> 'button')) }}
				{{ Form::close() }}
			</td>
		</tr>
 		@endforeach
	</tbody>
</table>
@stop

@section('script')
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/delete.js') }}
@stop


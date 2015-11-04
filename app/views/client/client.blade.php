@extends('layout.default')

@section('content')

<div>
	<a href="crud/create" style="position:absolute;"><button>Add Client</button></a>
	<div style="margin-left: 150px;">
		{{ Form::open(array('url'=>'query', 'method'=>'GET')) }}
			{{ Form::text('search') }}
			{{ Form::submit('Search', array('class'=>'button')) }}
		{{ Form::close() }}
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
			<td> {{ $value->type }} </td>
			<td> {{ $value->status }} </td>
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


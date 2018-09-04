@extends('layouts.main')

@section('title','Tracks')

@section('content')
<a href="{{ route('tracks.create') }}" class="btn btn-success pull-right">Add new</a><br><br>
<table class="table table-striped table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Details</th>
		<th>Show</th>
		<th>Delete</th>
	</tr> 
	@foreach($tracks as $t)
	<tr>
		<td>{{ $t->id }}</td>
		<td>{{ $t->title }}</td>
		<td>{{ $t->description }}</td>
		<td></td>
		<td></td>
	</tr>
	@endforeach

	{{ $tracks->links() }}
</table> 

@endsection
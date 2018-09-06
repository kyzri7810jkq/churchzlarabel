@extends('layouts.main')

@section('title','Tracks')

@section('content')

@if( isset($msg))
	{{ $msg }}
@endif
<a href="{{ route('tracks.create') }}" class="btn btn-success pull-right">Add new</a><br><br>
<table class="table table-striped table-hover">
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Details</th> 
		<th>Delete</th>
	</tr> 
	@foreach($tracks as $t)
	<tr>
		<td>{{ $t->id }}</td>
		<td>{{ $t->title }}</td>
		<td>{{ $t->description }}</td> 
		<td>  
			<form action="{{action('TrackController@destroy', $t->id)}}" method="post">
	            {{csrf_field()}}
	            <input name="_method" type="hidden" value="DELETE">
	            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
	          </form>
	     </td>
	</tr>
	@endforeach

</table> 
	{{ $tracks->links() }}

@endsection
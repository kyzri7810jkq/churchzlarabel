@extends('layouts.main')

@section('title', 'People List')

@section('content') 

@if( isset($success)):
	<div class="alert alert-success">
		{{ $success }}
	</div>
@endif
	<a href="{{ route('add_people') }}" class="pull-right btn btn-success btn-sm">
		Add New &nbsp;<i class="fa fa-plus"></i>
	</a><br><br>
	
	<table class="table table-striped">
		<tr>
			<th>ID</th>
			<th>Complete Name</th>
			<th>Birthday</th>
			<th>Address</th>
			<th>Spouse</th>
			<th>Contact</th>
			<th>Delete</th>
		</tr>
		@foreach($people as $p)
			<tr>
				<td>{{ $p->id }}</td>
				<td>{{ $p->lastname . ', ' . $p->firstname }}</td>
				<td>{{ $p->birthday }}</td>
				<td>{{ $p->address }}</td>
				<td>{{ $p->spouse }}</td>
				<td>{{ $p->contact }}</td>
				<td></td>
			</tr>
		@endforeach 
	</table>

	{{ $people->links() }}
@endsection
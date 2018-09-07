@extends('layouts.main')

@section('title', 'People List')

@section('content') 
 
@if( session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif

<p>Search People by Lastname or Firstname</p>
<form class="form-inline" action="" method="GET">
    <i class="fa fa-search" aria-hidden="true"></i>
    <input name="search" class="form-control form-control-sm ml-3 w-25" type="text" placeholder="Type your search here." value="{{ app('request')->input('search') }}" aria-label="Search">
</form>
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

	{{ $people->appends(request()->except('page'))->links() }}
@endsection
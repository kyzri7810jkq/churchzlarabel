@extends('layouts.main')

@section('title', 'People List')

@section('content') 
 
@if( session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif

  
<div class="row">
	<div class="col-md-10">
		<p>Search People by Lastname or Firstname</p>
		<form class="form-inline" action="" method="GET">
		    <i class="fa fa-search" aria-hidden="true"></i>
		    <input name="search" class="form-control form-control-sm ml-3 w-25" type="text" placeholder="Type your search here." value="{{ app('request')->input('search') }}" aria-label="Search">
		</form> 
	</div>
	<div class="col-md-2">
		<button class="btn btn-sm btn-block btn-info" onclick="printFunc();"">
			<i class="fa fa-print"></i>&nbsp;Print
		</button><br>
		<a href="{{ route('add_people') }}" class="btn btn-block btn-success btn-sm">
			<i class="fa fa-plus"></i>&nbsp;Add New &nbsp;
		</a>
	</div>
</div>
<br>	
<div  id="printarea">
	<small>{{ date('F d,Y') }}</small>
	<small>&nbsp;|&nbsp;</small>
	<small>{{ 'Current Count : ' . $people->count()  }}</small>
	<table class="table table-striped table-hover">
		<tr>
			<th>ID</th>
			<th>Complete Name</th>
			<th>Birthday</th>
			<th>Address</th> 
			<th>Contact</th> 
			<th>Discipler</th>
			<th>Status</th>
			<th class="edit"></th>
		</tr> 
		@foreach($people as $p)
			<tr>
				<td align="center">{{ $p->id }}</td>
				<td>{{ $p->lastname . ', ' . $p->firstname }}</td>
				<td>{{ date('F d,Y', strtotime($p->birthday)) }}</td>
				<td>{{ $p->address }}</td> 
				<td>{{ $p->contact }}</td>
				<td>{{ $p->mentor }}</td>
				<td class="{{ ($p->status!='Active') ? 'text-danger' : 'text-success'}}">{{ $p->status  }}</td>
				<td class="edit"><a href="{{ route('edit_people', $p->id) }}" class="btn btn-sm btn-warning">Edit</a></td> 
			</tr>
		@endforeach 
	</table>

	{{ $people->appends(request()->except('page'))->links() }}
</div>

@endsection
@extends('layouts.main')

@section('title', 'Seminars')

@section('content')

@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('insert_attendees') }}" class="btn btn-sm btn-success pull-right">Add New +</a>
<h5>Seminars</h5><br>
<form action="" method="GET">
<div class="row">
	<div class="col-md-3"> 
		<select class="form-control" name="track" tabindex="1">
			<option value="">-- All CC8 Seminars --</option>
			@foreach($track as $t)
			@php
			$selected = ($t->id==app('request')->input('track')) ? 'selected="selected"' : '';
			@endphp
			<option value="{{ $t->id }}" {{ $selected }}>{{ $t->title }}</option>
			@endforeach
		</select><br>
	</div>
	<div class="col-md-3">
		<input type="text" name="batch" value="{{ app('request')->input('batch') }}" class="form-control" placeholder="Batch No.">
	</div>
	<div class="col-md-3">
		<input type="text" name="lastname" value="{{ app('request')->input('lastname') }}" class="form-control" placeholder="Lastname of Attendee">
	</div>
	<div class="col-md-2">
		<button class="btn btn-default">Search</button>
	</div>
</div>
</form>
<b>Total Records Found: {{ $rows }}</b>
<table class="table table-striped table-hover">
	<tr>
		<th>ID</th>
		<th>Attendee</th>
		<th>Seminar</th>
		<th>Batch #</th>
		<th>Date of Event</th>
		<th>Tag</th>
		<th>Status</th>
		<th>Reference #</th>
		<th>Date Encoded</th>
		<th>Delete</th>
	</tr>
	@if(  $rows > 0) :
		@foreach($sem as $s)
			<tr>
				<td>{{ $s->id }}</td>
				<td>{{ $s->firstname .' ' . $s->lastname }}</td>
				<td>{{ $s->title }}</td>
				<td align="center">{{ $s->batch }}</td>
				<td>{{ $s->date_ofevent }}</td>
				<td>{{ $s->tag }}</td>
				<td>{{ $s->status }}</td>
				<td align="center">{{ $s->reference }}</td>
				<td>{{ $s->created_at }}</td>
				<td align="center">
					<form action="{{ route('delete_seminar') }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="hiddid" value="{{ $s->id }}">
						<button type="submit" name="delete" data-src="ID # {{ $s->id }}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
					</form>
				</td>
			</tr>
		@endforeach
	@else
		<tr>
			<td colspan="9">Sorry, No record found.</td>
		</tr>
	@endif
</table>

{{ $sem->appends(request()->except('page'))->links() }}

@endsection
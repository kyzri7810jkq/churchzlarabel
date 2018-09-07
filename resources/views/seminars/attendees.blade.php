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
			<option value="">-- Select Track --</option>
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
	<div class="col-md-2">
		<button class="btn btn-default">Search</button>
	</div>
</div>
</form>
<b>Total Records: </b>
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
	</tr>
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
		</tr>
	@endforeach
</table>

{{ $sem->links() }}

@endsection
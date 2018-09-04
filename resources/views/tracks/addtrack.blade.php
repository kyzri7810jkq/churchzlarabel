@extends('layouts.main')

@section('title', 'Add Track')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
  {!! implode('', $errors->all(':message <br>')) !!}
</div>
@endif
<h1>Add CC8 track</h1>

<form action="{{ url('tracks')}}" method="POST">

{{ csrf_field() }}
<div class="row">
	<div class="col-md-6"> 
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" required>
		<label for="description">Details</label>
		<textarea name="description" class="form-control" rows="10"></textarea>
		<br>
		<input type="submit" value="Add new" class="btn btn-primary"> 
	</div>
</div>
	<hr>
	<small class="text-muted">Note: All fields are required</small>
</form>
@endsection


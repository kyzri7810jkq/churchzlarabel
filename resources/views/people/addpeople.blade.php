@extends('layouts.main')

@section('title', 'Add New People')

@section('content')
<a href="{{ route('view_people') }}" class="pull-right">&laquo;Go back to List</a> 

@if( session('success')) 
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  {!! implode('', $errors->all(':message <br>')) !!}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <h5 class="page-header">
            People &raquo; Add New 
        </h5> 
    </div> 
	<div class="col-md-12"> 	<hr>
		<form action="{{ route('store_people') }}" method="post" accept-charset="utf-8"> 
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4">
				<label>* Lastname : </label>
				<input type="text" name="lastname" value="{{{ old('lastname') }}}" class="form-control" required>
			</div> 
			<div class="col-md-4">
				<label>* Firstname : </label>
				<input type="text" name="firstname"  value="{{{ old('firstname') }}}" class="form-control" required>
			</div> 
			<div class="col-md-4">
				<label>Middlename : </label>
				<input type="text" name="middlename" value="{{{ old('middlename') }}}"  class="form-control">
			</div> 
		</div><br>
		<div class="row">
			<div class="col-md-5">
				<label for="birthday">* Birthday  (YYYY-MM-DD)</label>
				<input type="text" name="birthday" value="{{{ old('birthday') }}}"  class="form-control" placeholder="Example: 1989-08-27" required><br>
				<label for="contact">Contact</label>
				<input type="text" name="contact" value="{{{ old('contact') }}}"  class="form-control" ><br>
				<label for="spouse">Spouse</label>
				<input type="text" name="spouse"  value="{{{ old('spouse') }}}" class="form-control" >
			</div>
			<div class="col-md-7">
				<label for="address">Address</label>
				<textarea name="address" class="form-control"  rows="9">{{{ old('address') }}}</textarea>
			</div>
		</div><br><br><br>
		<input type="submit" name="store" value="Submit & Go to List " class="btn btn-primary">
		&nbsp;&nbsp;
		<input type="submit" name="addnew" value="Submit & Add New" class="btn btn-success"><br><br>
		<small class="text-muted">Note: Fields with asterisk are required</small>
		</form>				</div>
</div>  <!-- /.row --> 

@endsection
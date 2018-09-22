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
				<input type="text" name="contact" value="{{{ old('contact') }}}"  class="form-control"> 
			</div>
			<div class="col-md-7">
				<label for="address">Address</label>
				<textarea name="address" class="form-control"  rows="5">{{{ old('address') }}}</textarea>
			</div>
		</div><br>
		<div class="row">
			<div class="col-md-4">
				<label for="">Department</label>
				<select class="form-control" name="department"> 
					<option value="">-- Select --</option>
					@foreach($dept as $d)
					<option value="{{ $d->id }}" {{ ($d->id==old('department')) ? 'selected' : '' }}>{{ $d->dept_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4"> 
				<label for="spouse">Spouse</label>
				<input type="text" name="spouse"  value="{{{ old('spouse') }}}" class="form-control" >
			</div>
			<div class="col-md-4"> 
				<label for="total_kids">Number of Kids (For Married)</label>
				<input type="text" name="total_kids"  value="{{{ old('total_kids') }}}" class="form-control" >
			</div>
		</div>
		<br>
		<div class="row">
			 <div class="col-md-4">
			 	<label for="">Mentor/Discipler</label>
			 	<input type="text" class="form-control" value="{{ old('mentor') }}" name="mentor">
			 </div> 
			 <div class="col-md-4">
			 	<label for="">Work</label>
			 	<input type="text" class="form-control" value="{{ old('work') }}" name="work">
			 </div>

			 <div class="col-md-4">
			 	<label for="">Current Status</label> 
			 	<select class="form-control" name="status">
			 		<option value="Active">Active</option>
			 		<option value="InActive" {{ (old('status')=="InActive") ? 'selected' : '' }}> InActive</option>
			 	</select>
			 </div>
		</div><br><br><br>
		<input type="submit" name="store" value="Submit & Go to List " class="btn btn-primary">
		&nbsp;&nbsp;
		<input type="submit" name="addnew" value="Submit & Add New" class="btn btn-success"><br><br>
		<small class="text-muted">Note: Fields with asterisk are required</small><br><br>
		</form>				</div>
</div>  <!-- /.row --> 

@endsection
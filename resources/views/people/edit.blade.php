@extends('layouts.main')

@section('title', 'Edit People')

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

@php 
$lastname   = (old('lastname')) ? old('lastname') : $people->lastname;
$firstname  = (old('firstname')) ? old('firstname') : $people->firstname;
$middlename = (old('middlename')) ? old('middlename') : $people->middlename;
$birthday   = (old('birthday')) ? old('birthday') : $people->birthday;
$contact    = (old('contact')) ? old('contact') : $people->contact;
$department = (old('department')) ? old('department') : $people->department;
$address    = (old('address')) ? old('address') : $people->address;
$spouse     = (old('spouse')) ? old('spouse') : $people->spouse;
$total_kids = (old('total_kids')) ? old('total_kids') : $people->total_kids;
$mentor 	= (old('mentor')) ? old('mentor') : $people->mentor;
$work 		= (old('work')) ? old('work') : $people->work;
$status 	= (old('status')) ? old('status') : $people->status; 
@endphp
<div class="row">
    <div class="col-md-12">
        <h5 class="page-header">
           <i class="fa fa-edit"></i>&nbsp; People &raquo; Edit 
        </h5> 
    </div> 
	<div class="col-md-12"> 	<hr>
		<form action="{{ route('update_people') }}" method="post" accept-charset="utf-8"> 
		{{ csrf_field() }}
		<input type="hidden" name="persid" value="{{ $id }}">
		<div class="row">
			<div class="col-md-4">
				<label>* Lastname : </label>
				<input type="text" name="lastname" value="{{{ $lastname  }}}" class="form-control" required>
			</div> 
			<div class="col-md-4">
				<label>* Firstname : </label>
				<input type="text" name="firstname"  value="{{{ $firstname }}}" class="form-control" required>
			</div> 
			<div class="col-md-4">
				<label>Middlename : </label>
				<input type="text" name="middlename" value="{{{ $middlename }}}"  class="form-control">
			</div> 
		</div><br>
		<div class="row">
			<div class="col-md-5">
				<label for="birthday">* Birthday  (YYYY-MM-DD)</label>
				<input type="text" name="birthday" value="{{{ $birthday }}}"  class="form-control" placeholder="Example: 1989-08-27" required><br>
				<label for="contact">Contact</label>
				<input type="text" name="contact" value="{{{ $contact }}}"  class="form-control"> 
			</div>
			<div class="col-md-7">
				<label for="address">Address</label>
				<textarea name="address" class="form-control"  rows="5">{{{ $address }}}</textarea>
			</div>
		</div><br>

		<div class="row">
			<div class="col-md-4">
				<label for="">Department</label>
				<select class="form-control" name="department">
					<option value="">-- Select --</option>
					@foreach($dept as $d)
					<option value="{{ $d->id }}" {{ ($d->id==$department) ? 'selected' : '' }}>{{ $d->dept_name }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-4"> 
				<label for="spouse">Spouse</label>
				<input type="text" name="spouse"  value="{{{ $spouse }}}" class="form-control" >
			</div>
			<div class="col-md-4"> 
				<label for="total_kids">Number of Kids</label>
				<input type="text" name="total_kids"  value="{{{ $total_kids }}}" class="form-control" >
			</div>
		</div><br>
		<div class="row">
			 <div class="col-md-4">
			 	<label for="">Mentor/Discipler</label>
			 	<input type="text" class="form-control" value="{{ $mentor }}" name="mentor">
			 </div> 
			 <div class="col-md-4">
			 	<label for="">Work</label>
			 	<input type="text" class="form-control" value="{{ $work }}" name="work">
			 </div>

			 <div class="col-md-4">
			 	<label for="">Current Status</label> 
			 	<select class="form-control" name="status">
			 		<option value="Active">Active</option>
			 		<option value="InActive" {{ ($status=="InActive") ? 'selected' : '' }}> InActive</option>
			 	</select>
			 </div>
		</div>

		<br><br>
		<button type="submit" name="store" class="btn btn-success">
			Update <i class="fa fa-save"></i>
		</button> <hr>
		<small class="text-muted">Note: Fields with asterisk are required</small><br><br>
		</form>				</div>
</div>  <!-- /.row --> 

@endsection
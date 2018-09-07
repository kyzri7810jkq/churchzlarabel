@extends('layouts.main')

@section('title', 'Add New Attendees')

@section('content')


<form action="{{ route('store_attendees') }}" method="POST">
{{ csrf_field() }}
@if( $errors->any())
	<div class="alert alert-danger">
	  {!! implode('', $errors->all(':message <br>')) !!}
	</div>
@endif
<h5>CC8 Seminar Form</h5>
<hr>
<div class="row">
	<div class="col-md-4">
		<label>* CC8 Track :</label>
		<select class="form-control" name="track">
			<option value="">-- Select Track --</option>
			@foreach($track as $t)
			@php
			$selected = ($t->id==old('track')) ? 'selected="selected"' : '';
			@endphp
			<option value="{{ $t->id }}" {{ $selected }}>{{ $t->title }}</option>
			@endforeach
		</select><br>
		<label for="">* Tag :</label> 
		<select class="form-control" name="tag">
			<option value="">-- Select Tag --</option>
			<option value="first_timer">First Timer</option>
			<option value="refresher">Refresher</option>
		</select>
	</div>
	<div class="col-md-4">
		<label>* Batch number : </label>
		<input type="number" name="batch" value="{{ old('batch') }}" class="form-control" placeholder="Batch No."><br>
		<label for="">* Status :</label> 
		<select class="form-control" name="status">
			<option value="">-- Select Status --</option>
			<option value="completed">Completed</option>
			<option value="incomplete">Incomplete</option>
		</select>
	</div>
	<div class="col-md-4">
		<label>* Date (YYYY-MM-DD): </label>
		<input type="text" class="form-control" value="{{  old('date_event') }}" name="date_event" placeholder="Date of Seminar" required><br>
		<label>Reference: </label>
		<input type="text" class="form-control" value="{{ old('reference') }}" name="reference" placeholder="Printed Copy Reference #">  
	</div>
</div>
<br>
<h5>Attendee:</h5>
<div class="row">
	<div class="col-md-4">
		<div class="form-group"> 
        <div class="input-group col-xs-12"> 
          <input type="text" disabled class="form-control" id="person" name="person" value="{{{ old('person') }}}"> 
          <input type="hidden" name="persid" id="persid" value="{{{ old('persid') }}}">
          <span class="input-group-btn">
            <button class="browse btn btn-warning" type="button" data-toggle="modal"  data-target="#peopleModal">Browse</button>
          </span>
        </div>
      </div> 
    </div>
</div>
<div class="jumbotron">
	<h5 class="text-center">[No Attendee]</h5>
	<p class="text-center">Click Browser to select</p>
</div>
<label for="comment">Add Details:</label>
<textarea class="form-control" id="comment" rows="5"></textarea>
<br>
<input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
<hr>
<small>Note: Fields with asterisk are required</small>
<br>
</form>



 <!--  MODAL ini -->
<div id="peopleModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">Search Attendees</h4> 
      </div>
      <div class="modal-body">   
        <div class="input-group"> 
            <input class="form-control" id="people-search" name="q" placeholder="Search By Lastname" required>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default btn-go">GO</button>
            </span>
        </div> 
        <br>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th><th>Firstname</th><th>Lastname</th><th>Select</th>
            </tr>
          </thead>
          <tbody>
            @foreach($attend as $at)
            <tr>
              <td>{{ $at->id }}</td>
              <td>{{ $at->firstname }}</td>
              <td>{{ $at->lastname }}</td>
              <td><button data-id="{{ $at->id }}" data-person="{{ $at->firstname .' ' . $at->lastname }}" class="btn btn-xs btn-primary selectStudent">Select</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-md" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
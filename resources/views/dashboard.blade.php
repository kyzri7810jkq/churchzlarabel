
@extends('layouts.main')

@section('title', 'Dashboard') 
@section('content')  
<h5 style="color: darkGreen;"><i class="fa fa-edit"></i>&nbsp;Recent Seminars</h5>
<table class="table table-striped">
  <tr> 
    <th width="150px">Seminar</th>
    <th class="text-center"> Attendees</th>
    <th>Date of Event</th>
  </tr>
  @foreach($seminar as $sem)
      <tr>
        <td>{{ $sem->title }}</td>
        <td align="center"><b>{{ $sem->total_count }}</b></td>
        <td>{{ date('F d, Y', strtotime($sem->date_ofevent)) }}</td>
      </tr>
  @endforeach
</table>
<br>
<h5 style="color:red;"><i class="fa fa-gift"></i>&nbsp;Upcoming Birthdays &nbsp; </h5>
<small class="text-muted">Birthdays for the next 7 days</small><br><br>

@if( $birthday->count() > 0)
  <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Complete Name</th>
      <th>Date of Birthday</th> 
      <th>Contact Info</th>
    </tr>
    @foreach($birthday as $b)
      <tr>
        <td>{{ $b->id }}</td>
        <td>{{ $b->firstname .' ' . $b->lastname }}</td>
        <td>{{ date('F d', strtotime($b->birthday)) }}</td> 
        <td>{{ $b->contact }}</td>
      </tr>
    @endforeach
  </table>
@else
  [No Birthdays for 7 days now]
@endif

@endsection

@extends('layouts.main')

@section('title', 'Dashboard') 
@section('content')  
<br>
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->kidsTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Kids Department</span> 
      </a>
    </div>
  </div><!-- kids -->
   <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-info o-hidden h-100">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->highSchoolTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Highschool Department</span> 
      </a>
    </div>
  </div><!-- Highschool -->
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->collegeTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">College Department</span> 
      </a>
    </div>
  </div><!-- Highschool -->
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-info o-hidden h-100">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->workingClassTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Young Prof/Working Department</span> 
      </a>
    </div>
  </div><!-- Working -->
</div>
<br> <br>

<div class="row"> 
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->couplesTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">Couples Department</span> 
      </a>
    </div>
  </div><!-- Working -->

  <div class="col-xl-6 col-sm-6 mb-6 text-center">
  <h4>So whether you eat or drink or whatever you do, do it all to the glory of God.</h4>
  <h5>1 Corinthians 10:31</h5>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white o-hidden h-100" style="background: violet !important;">
      <div class="card-body"> 
        <div class="text-center"><h2><b>{{ $people->couplesTotal()->count() }}</b></h2></div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">INACTIVE</span> 
      </a>
    </div>
  </div><!-- Working -->
</div>
<br>
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
@php
$birthday = $people->upcomingBirthdays();
@endphp
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

<br><br><br>
@endsection
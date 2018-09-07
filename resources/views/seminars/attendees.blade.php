@extends('layouts.main')

@section('title', 'Seminars')

@section('content')

@if(session('success'))
	<div class="alert alert-success">{{ session('success') }}</div>
@endif

@endsection
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title') - {{ config('app.name') }}</title> 
 
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>  
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="tracks">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePeople" data-parent="#exampleAccordion">
            <i class="fa fa-road"></i>
            <span class="nav-link-text">People</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePeople">
            <li>
              <a href="{{ route('add_people') }}">Add New</a>
            </li>
            <li>
              <a href="{{ route('view_people') }}">display All</a>
            </li>
          </ul>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="tracks">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTracks" data-parent="#exampleAccordion">
            <i class="fa fa-road"></i>
            <span class="nav-link-text">Tracks</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTracks">
            <li>
              <a href="{{ route('tracks.create') }}">Create New</a>
            </li>
            <li>
              <a href="{{ route('tracks.index') }}">Show All</a>
            </li>
          </ul>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUsers" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseUsers">
            <li>
              <a href="{{ route('users') }}">All Users</a>
            </li>
            <li>
              <a href="{{ route('register') }}">Create New</a>
            </li>
          </ul>
        </li> 
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">  
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="fa fa-user"></i>
            {{ Auth::user()->email }}
        </a></li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

	<div class="content-wrapper">
	    <div class="container-fluid">
	    <!-- Breadcrumbs-->
	    <ol class="breadcrumb">
	       <li><a href="/">Home</a>  </li>               
			<?php $link = "" ?>
			@for($i = 1; $i <= count(Request::segments()); $i++)
			    @if($i < count(Request::segments()) & $i > 0)
			    <?php $link .= "/" . Request::segment($i); ?>
			    <li><a href="<?= $link ?>">{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a> </li>
			    @else 
			    	<li>{{  ucwords(str_replace('-',' ',Request::segment($i)))}} </li> 
			    @endif
			@endfor
	    </ol>
	  	@yield('content')
  	</div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>  

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script src="{{ asset('js/activities-custom.js') }}"></script>   
 
</body>
</html>

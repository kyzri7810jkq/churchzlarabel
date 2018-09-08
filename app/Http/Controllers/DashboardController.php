<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seminar;
use App\People;

class DashboardController extends Controller
{
    public function index()
    { 
    	$people   = new People();
    	$seminar  = new Seminar();
    	return view('dashboard', [
    		'birthday' => $people->upcomingBirthdays(),
    		'seminar'  => $seminar->recent()
    	]);
    }
}

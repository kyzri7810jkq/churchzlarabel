<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\People;

class PeopleController extends Controller
{
    public function index()
    {
    	$people = DB::table('people')->orderby('id', 'desc')->paginate(5);
    	return view('people.index', compact('people'));
    }

    public function add()
    {
    	return view('people.addpeople');
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'lastname' => 'required',
    		'firstname'=> 'required',
    		'birthday' => 'required|date' 
    	]);
    	if( $validator->fails()){ 
    		return redirect()
    				->back()
                    ->withErrors($validator)
                    ->withInput();
    	}	
    	$people = new People([
    		'firstname' => $request->get('firstname'),
    		'middlename' => $request->get('middlename'),
    		'lastname' => $request->get('lastname'),
    		'birthday' => $request->get('birthday'),
    		'address' => $request->get('address'),
    		'spouse' => $request->get('spouse'),
    		'contact' => $request->get('contact'),
    	]);
    	$people->save();
    	$msg =  'Successfully added New record';
    	if( $request->get('store')){ 
    		return redirect()->route('view_people')->with('success', $msg);
    	}else{ 
    		return redirect()->route('add_people')->with('success', $msg);
    	}
    } 
}

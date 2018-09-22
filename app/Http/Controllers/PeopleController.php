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
    	$people = DB::table('people')->orderby('id', 'desc'); 
        if( request()->input('search')){
            $input = request()->input('search');
            $people = $people->where('lastname', 'LIKE', $input);
        }
        $people = $people->paginate(20);
    	return view('people.index', compact('people'));
    }

    public function add()
    {
        $dept   = \App\Department::all();
    	return view('people.addpeople', compact('dept'));
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
    		'firstname'  => $request->get('firstname'),
    		'middlename' => $request->get('middlename'),
    		'lastname'   => $request->get('lastname'),
    		'birthday'   => $request->get('birthday'),
    		'address'    => $request->get('address'),
    		'spouse'     => $request->get('spouse'),
    		'contact'    => $request->get('contact'),
            'total_kids' => $request->get('total_kids'),
            'mentor'     => $request->get('mentor'),
            'work'       => $request->get('work'),
            'status'     => $request->get('status'),
            'department' => $request->get('department')
    	]);
    	$people->save();
    	$msg =  'Successfully added New record';
    	if( $request->get('store')){ 
    		return redirect()->route('view_people')->with('success', $msg);
    	}else{ 
    		return redirect()->route('add_people')->with('success', $msg);
    	}
    } 

    /* GET
     */
    public function edit($id)
    { 
        $people = People::find($id); 
        $dept   = \App\Department::all();
        return view('people.edit', compact('people', 'id', 'dept'));
    }

    /* POST
     */
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'lastname' => 'required',
            'firstname' => 'required', 
            'birthday' => 'required|date' 
        ]);
        if($validate->fails()){
            return redirect()->back()->withInput()->withErrors($validate);
        } 
        $people = People::find($request->get('persid'));
        $people->lastname   = $request->get('lastname');
        $people->firstname  = $request->get('firstname');
        $people->middlename = $request->get('middlename');
        $people->birthday   = $request->get('birthday');
        $people->contact    = $request->get('contact');
        $people->department = $request->get('department');
        $people->address    = $request->get('address');
        $people->spouse     = $request->get('spouse');
        $people->total_kids = $request->get('total_kids');
        $people->mentor     = $request->get('mentor');
        $people->work       = $request->get('work');
        $people->status     = $request->get('status');
        $people->save();
        return redirect()->back()->with('success', 'Successfully Updated');
    }

    /* @method = POST
     */
    public function ajax(Request $request)
    {
       return DB::table('people')
                ->where('lastname', 'LIKE' , $request->get('input'))
                ->limit(5)
                ->get(); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Seminar;
use App\Track;

class SeminarController extends Controller
{
	/* @index
	 */
	public function attendees()
	{
		return view('seminars.attendees');
	}

	/* @GET
	 */
    public function insert()
    {
    	$seminar = new Seminar();
    	$attend = $seminar->getAttendees();  
    	$track  = DB::table('tracks')->get();
    	return view('seminars.insert',[
    		'attend' => $attend,
    		'track'  => $track
    	]);
    }

    /* @Post Insert
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'track' => 'required',
    		'tag'	=> 'required',
    		'batch' => 'required|numeric',
    		'date_event' => 'date|required',
    		'persid' => 'required',
    		'status' => 'required'
    	],[
    		'persid.required' => 'Please select an attendee', 
    		'date_event.date' => 'Please type a valid date'
    	]);

    	$sem = new Seminar([
    		'people_id'    => $request->get('persid'), 
    		'track_id'     => $request->get('track'), 
    		'tag'          => $request->get('tag'), 
    		'status'       => $request->get('status'), 
    		'comment'      => $request->get('comment'), 
    		'batch' 	   => $request->get('batch'), 
    		'date_ofevent' => $request->get('date_event'), 
    		'reference'    => $request->get('reference') 
    	]);
    	$sem->save();
    	return redirect()->route('attendees')->with('success', 'Successfully added');
    }
}

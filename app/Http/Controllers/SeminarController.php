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
	public function attendees(Request $request)
	{
		$sem = new Seminar();
    	$track  = DB::table('tracks')->get(); 
    	$data = $sem->allSeminars();
    	if( $request->get('track') || $request->get('batch') || $request->get('lastname')){
    		$data = $sem->searchResult($request);
    	}
		return view('seminars.attendees', [
			'sem'   => $data , 
			'track' => $track,
			'rows'  => $sem->totalRows() 
		]);
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
    		'qbatch' => 'required|integer',
    		'date_event' => 'date|required',
    		'persid' => 'required',
    		'status' => 'required'
    	],[
    		'persid.required' => 'Please select an attendee', 
    		'date_event.date' => 'Please type a valid date',
    		'qbatch.integer'  => 'Batch should be a number'
    	]);

    	$sem = new Seminar([
    		'people_id'    => $request->get('persid'), 
    		'track_id'     => $request->get('track'), 
    		'tag'          => $request->get('tag'), 
    		'status'       => $request->get('status'), 
    		'comment'      => $request->get('comment'), 
    		'batch' 	   => $request->get('qbatch'), 
    		'date_ofevent' => $request->get('date_event'), 
    		'reference'    => $request->get('reference') 
    	]);
    	$sem->save();
    	return redirect()->route('attendees')->with('success', 'Successfully added');
    }

    /*@POST
     */
    public function remove(Request $request)
    { 
    	$seminar = Seminar::find($request->get('hiddid'));
    	$seminar->delete();
    	return redirect()->back()->with('success', 'Successfully Deleted record #' . $request->get('hiddid'));
    }
}

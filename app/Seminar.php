<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Seminar extends Model
{
    protected $fillable = ['people_id', 'track_id', 'batch', 'tag', 'status', 'comment', 'date_ofevent', 'reference'];
 	private $total_result;

    public function getAttendees()
    {
    	return DB::table('people')->limit(5)->orderby('id','desc')->get();
    }
	
	public function allData()
	{
		return DB::table('seminars')
    			->selectRaw('seminars.id AS id, firstname, lastname, batch, title,date_ofevent,tag,status,reference,seminars.created_at ')
    			->join('people', 'people.id', 'seminars.people_id')
    			->join('tracks', 'tracks.id', 'seminars.track_id');
	}
    public function allSeminars()
    { 
    	$this->total_result = $this->allData()->count();
    	return $this->allData()
    			->orderby('id', 'DESC')
    			->paginate(15);
    }

    public function searchResult($request)
    {  
    	$data = $this->allData();
    	if( $request->get('track') ){
			$data = $data->where('track_id', '=' , $request->get('track'));
    	}

    	if( $request->get('batch') ){
			$data = $data->where('batch', '=' , $request->get('batch'));
    	} 

    	if( $request->get('lastname') ){
			$data = $data->where('lastname', '=' , $request->get('lastname'));
    	} 
 
    	$this->total_result = $data->count();

    	return 	$data->orderby('id', 'DESC')
    			->paginate(15);
    }

    public function totalRows()
    {
    	return $this->total_result;
    }

    public function recent()
    {
        return DB::table('seminars')
                 ->selectRaw('title, track_id, date_ofevent, count(*) as total_count')
                 ->join('tracks', 'tracks.id', 'seminars.track_id')
                 ->groupBy('track_id')
                 ->orderBy('date_ofevent', 'DESC')
                 ->limit(10)
                 ->get();
    }
    
}

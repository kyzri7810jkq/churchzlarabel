<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Seminar extends Model
{
    protected $fillable = ['people_id', 'track_id', 'batch', 'tag', 'status', 'comment', 'date_ofevent', 'reference'];
 
    public function getAttendees()
    {
    	return DB::table('people')->limit(5)->orderby('id','desc')->get();
    }

    public function allSeminars()
    {
    	return DB::table('seminars')
    			->selectRaw('seminars.id AS id, firstname, lastname, batch, title,date_ofevent,tag,status,reference,seminars.created_at ')
    			->join('people', 'people.id', 'seminars.people_id')
    			->join('tracks', 'tracks.id', 'seminars.track_id') 
    			->orderby('id', 'DESC')
    			->paginate(5);
    }
}

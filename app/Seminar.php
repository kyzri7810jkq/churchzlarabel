<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Seminar extends Model
{
    protected $fillable = ['people_id', 'track_id', 'tag', 'status', 'comment', 'date_ofevent', 'reference'];
 
    public function getAttendees()
    {
    	return DB::table('people')->limit(5)->orderby('id','desc')->get();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['lastname', 'firstname', 'middlename', 'birthday', 'address', 'contact', 'spouse', 'total_kids', 'department', 'mentor', 'work', 'status']; 

    private $_advancedob = 7;


    public function upcomingBirthdays()
    {
    	return \DB::table('people')->whereRaw("DAYOFYEAR(curdate()) <= DAYOFYEAR(birthday) AND DAYOFYEAR(curdate()) + {$this->_advancedob}  >=  dayofyear(birthday)" )->get();
    }
}

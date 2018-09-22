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

    public function kidsTotal()
    {
    	return \DB::table('people')->where('department','=', 1)->get();
    }

    public function highSchoolTotal()
    {
    	return \DB::table('people')->where('department','=', 2)->get();
    }

    public function collegeTotal()
    {
    	return \DB::table('people')->where('department','=', 3)->get();
    }

    public function workingClassTotal()
    {
    	return \DB::table('people')->where('department','=', 5)->get();
    }

    public function couplesTotal()
    {
    	return \DB::table('people')->where('department','=', 6)->get();
    }
}

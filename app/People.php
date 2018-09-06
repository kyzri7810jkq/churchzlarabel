<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = ['lastname', 'firstname', 'middlename', 'birthday', 'address', 'contact', 'spouse']; 
}

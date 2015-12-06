<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    protected $fillable = array('name','slug'); 
	
	public $timestamps = false;
	
	public function countries()
    {
        return $this->hasMany('App\Country');
    }
}

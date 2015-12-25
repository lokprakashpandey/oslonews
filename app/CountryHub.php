<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryHub extends Model
{
    protected $table = 'country_hub';
	
	public function categories() {

        return $this->belongsToMany('App\Category');

    } 
	
	
}

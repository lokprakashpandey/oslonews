<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   
   protected $fillable = array('name','slug','continent_id'); 
	
   public $timestamps = false;
	
   public function continent()
    {
        return $this->belongsTo('App\Continent');
    }
	
	public function categories() {

        return $this->belongsToMany('App\Category');

    }  
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
	protected $fillable = array('name','slug'); 
	
	public $timestamps = false;
	
    public function categories() {

        return $this->belongsToMany('App\Category')->withPivot('id','in_main_menu', 'in_front');

    } 
	

	 public function countries() {

        return $this->belongsToMany('App\Country')->withPivot('id','cnt_in_main_menu','cnt_in_front');

    }  
	
	public function news() {

        return $this->belongsToMany('App\News');

    }
	public static function getHubs()
    {
			$hubs = Hub::get(); 
			return $hubs;
	}
}

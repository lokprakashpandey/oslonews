<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
   
   protected $fillable = array('name','slug','continent_id','cnt_in_main_menu'); 
	
   public $timestamps = false;
	
   public function continent()
    {
        return $this->belongsTo('App\Continent');
    }
	
	public function categories() {

        return $this->belongsToMany('App\Category')->withPivot('cnt_in_main_menu');

    }
	public static function getMainMenuCountries()
	{
		$countries = Country::with(['categories'=>function($query) {
																$query->where('cnt_in_main_menu', 1);
															}])
										->where('in_main_menu',1)
										->orderBy('name', 'asc')
										->get(); 
				
		return $countries;
	}
}

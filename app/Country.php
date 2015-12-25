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
	public function hubs() {

        return $this->belongsToMany('App\Hub')->withPivot('id');

    }
	public static function getMainMenuCountries($hub_slug)
	{
		/*$countries = Country::with(['categories'=>function($query) {
																$query->where('cnt_in_main_menu', 1);
															}])
										->where('in_main_menu',1)
										->orderBy('name', 'asc')
										->get(); 
		*/
		$hub_id = Hub::where('slug',$hub_slug)->first();
		$countries = Hub::find($hub_id->id)->countries()->get();

		return $countries;
	}
	
	public function getCountryCategories($country_hub_id)
	{
		//$country_hub = CountryHub::find($country_hub_id);//where('hub_id',$country_hub_id)->first();
		//$categories = $country_hub->categories()->get();
		/*$country_hub = CountryHub::where('hub_id',1)
								   ->where('country_id',4)
								   ->first();*/
		$categories = CountryHub::find($country_hub_id)->categories()->get();
		
		return $categories;
	}
}

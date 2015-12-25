<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $fillable = array('name', 'parent_id', 'position','slug','cat_type');
	
	public $timestamps = false;
	
    public function parent() {

        return $this->hasOne('App\Category', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Category', 'parent_id', 'id')->orderBy('position', 'asc');

    }  
	
	public function hubs() {

        return $this->belongsToMany('App\Hub')->withPivot('in_main_menu', 'in_front');

    } 
	public function countries() {

        return $this->belongsToMany('App\Country')->withPivot('cnt_in_main_menu');

    }  
	
	public function country_hubs() {

        return $this->belongsToMany('App\CountryHub');

    } 
	//other functions
	public static function getCategories()
    {
			$category = Category::where('parent_id', '=', '0')->orderBy('position', 'asc')->with('children')->get(); 
			return $category;
	}
	
	public static function getTopMenuHubCategories($hub_slug)
    {
			$hub_id = Hub::where('slug',$hub_slug)->first();
			$hub = Hub::find($hub_id->id);
			
			$categories = $hub->categories()
							->where('parent_id', '=', '0')
							->where('in_main_menu', '1')
							->orderBy('position','asc')
							->get();
				
			return $categories;
	}
	public static function getTopMenuCategories($hub_id,$country_id)
    {
			/*$hub = Hub::find($hub_id);
			$categories = $hub->categories()->where('parent_id', '=', '0')->get();
			*/
			$country_hub = CountryHub::where('hub_id',$hub_id)
								   ->where('country_id',$country_id)
								   ->first();
			$categories = CountryHub::find($country_hub->id)->categories()->orderBy('position','desc')->get();
			
			return $categories;
	}
}

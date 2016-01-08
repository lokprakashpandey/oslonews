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
	//children with default status true
	public function children_default_status() {

        return $this->hasMany('App\Category', 'parent_id', 'id')
									->where('default_menu',1)
									->orderBy('position', 'asc');

    }  
	
	
	public function hubs() {

        return $this->belongsToMany('App\Hub')->withPivot('in_main_menu', 'in_front');

    } 
	public function countries() {

        return $this->belongsToMany('App\Country')->withPivot('cnt_in_main_menu');

    }  
	
	public function news() {

        return $this->belongsToMany('App\News');

    } 
	
	public function country_hubs() {

        return $this->belongsToMany('App\CountryHub')->withPivot('id','cnt_cat_in_main_menu', 'cnt_cat_in_front');

    } 
	
	//children with true status in category_country_hub(cnt_cat_in_main_menu)
	public function children_category_country_hub($country_hub_id) {

        return $this->hasMany('App\Category', 'parent_id', 'id')
									->whereHas('country_hubs', function ($query) use ($country_hub_id){
										$query->where('country_hub_id', $country_hub_id);
											//->where('cnt_cat_in_main_menu',1);
										})
									
									->orderBy('position', 'asc')->get();

    }  
	
	public function children_category_hub($hub_id) {

        return $this->hasMany('App\Category', 'parent_id', 'id')
									->whereHas('hubs', function ($query) use ($hub_id){
										$query->where('hub_id', $hub_id);
											//->where('cnt_cat_in_main_menu',1);
										})
									
									->orderBy('position', 'asc')->get();

    }  
	//other functions
	public static function getCategories()
    {
			$categories = Category::where('parent_id', '=', '0')
									->orderBy('position', 'asc')
									->with('children')
									->get(); 
			return $categories;
	}
	
	// get overall default category default page
	public static function getTopMenuDefaultCategories()// default all categories for main menu
    {
			$categories = Category::where('parent_id',0)
							->where('default_menu', 1)
							->orderBy('position','asc')
							->with('children_default_status')
							->get();
			
			return $categories;
	}
	public static function getTopMenuHubCategories($hub_slug)// hub wise categories for main menu
    {
			$hub_id = Hub::where('slug',$hub_slug)->first();
			$hub = Hub::find($hub_id->id);
			
			$categories = $hub->categories()
							->where('parent_id',0)
							->where('in_main_menu', '1')
							->orderBy('position','asc')
							->get();
			
			return $categories;
	}
	public static function getTopMenuCategories($hub_slug,$country_slug)//hub/country categories for main menu
    {
			
			$hub = Hub::where('slug',$hub_slug)->first();
			
			$country = Country::where('slug',$country_slug)->first();
			
			
			$country_hub = CountryHub::where('hub_id',$hub->id)
								   ->where('country_id',$country->id)
								   ->first();
			$categories = CountryHub::find($country_hub->id)->categories()
															->where('parent_id',0)
															->where('cnt_cat_in_main_menu', '1')
															->orderBy('position','desc')->get();

			return $categories;
	}
	
	//for side menu with hub only
	public static function getSideMenuHubCategories($hub_slug)// hub wise categories all 
    {

			$hub_id = Hub::where('slug',$hub_slug)->first();
			$hub = Hub::find($hub_id->id);
			
			$categories = $hub->categories()
							->where('parent_id',0)
							->orderBy('position','asc')
							->get();
			
			return $categories;
	}
	//for side menu with hub and country only
	public static function getSideMenuCategories($hub_slug,$country_slug) //hub/country categories for main menu 
    {

			$hub = Hub::where('slug',$hub_slug)->first();
			
			$country = Country::where('slug',$country_slug)->first();
			
			$country_hub = CountryHub::where('hub_id',$hub->id)
								   ->where('country_id',$country->id)
								   ->first();
			$categories = CountryHub::find($country_hub->id)->categories()
															->where('parent_id',0)
															->orderBy('position','desc')->get();
		//dd($categories->toArray());
		    return $categories;
	}
	
	// news
	
	public function newsTop5()
    {
        return $this->news()->orderBy('created_at', 'desc')->take(3);
	  
    }
	public function hubNewsTop5($category_hub_id)
    {
		$category_hub = CategoryHub::find($category_hub_id);
		
        return $category_hub->news()->orderBy('created_at', 'desc')->take(3)->get();
    }
}

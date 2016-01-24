<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Twitter;

use Conner\Tagging\Taggable;

class News extends Model
{
	use Taggable;
	
    protected $fillable = array('name', 'content','publish', 'user_id','position','slug','author_profile_id','front_img');
	
		
	public function hubs() {

        return $this->belongsToMany('App\Hub');

    } 
	public function categories() {

        return $this->belongsToMany('App\Category');

    } 
	
	public function category_hubs() {

        return $this->belongsToMany('App\CategoryHub');

    } 
	public function types()
    {
        return $this->belongsToMany('App\Type');
    }
	public function countries() {

        return $this->belongsToMany('App\Country');

    }  
	
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	public function comments() {

        return $this->hasMany('App\Comment');

    } 
	public function author_profile()
    {
        return $this->belongsTo('App\AuthorProfile');
    }
	
	public function category_country_hubs() {

        return $this->belongsToMany('App\CategoryCountryHub');

    } 
	
	public static function topStories($hub_slug=Null)
	{
		if($hub_slug)
		{
			//get hub_id
			$hub_id = Hub::where('slug',$hub_slug)->first();
			
			$hub = Hub::find($hub_id->id);
			
			$top_stories = $hub->news()->whereHas('types',function($query){ $query->where('slug','top');})
									   ->where('publish','1')
									   ->orderBy('created_at', 'desc')
									   ->take(5)
									   ->get();
			
		}
		else
		{
		 $top_stories = News::whereHas('types',function($query){ $query->where('slug','top');})
												->where('publish','1')
												->orderBy('created_at', 'desc')
												->take(5)
												->get();
		}
		return $top_stories;
		
	}
	public static function getLatestNews()
	{
		$latest_news = News::where('publish','1')
										->orderBy('created_at', 'desc')
										->take(13)
										->get();

		return $latest_news;
		
	}
	
	
	public static function twitter_feed()
	{
		$tweets = Twitter::getUserTimeline(['screen_name' => 'TheOsloTimes', 'count' => 30, 'format' => 'json']);

		$tweets = json_decode($tweets);
		//dd($tweets);
		return $tweets;
	}
}

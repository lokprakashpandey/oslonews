<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $fillable = array('name', 'parent_id', 'in_front','position','slug','in_main_menu','cat_type');
	
	public $timestamps = false;
	
    public function parent() {

        return $this->hasOne('App\Category', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Category', 'parent_id', 'id')->orderBy('position', 'asc');

    }  
	
	public function hubs() {

        return $this->belongsToMany('App\Hub');

    } 
	public function countries() {

        return $this->belongsToMany('App\Country');

    }  
	
	
	//other functions
	public static function getCategories()
    {
			$category = Category::where('parent_id', '=', '0')->orderBy('position', 'asc')->with('children')->get(); 
			return $category;
	}
}

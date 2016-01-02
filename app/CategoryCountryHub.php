<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryCountryHub extends Model
{
	protected $table = 'category_country_hub';
	
    public function news() {

        return $this->belongsToMany('App\News');

    } 
}

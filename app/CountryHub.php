<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryHub extends Model
{
    protected $table = 'country_hub';
	
	public function categories() {

        return $this->belongsToMany('App\Category')->withPivot('cnt_cat_in_main_menu', 'cnt_cat_in_front');

    } 
	
	
}

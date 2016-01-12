<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryHub extends Model
{
    protected $table = 'category_hub';
	
	protected $fillable = array('id','category_id','hub_id');
	
	public function news() {

        return $this->belongsToMany('App\News');

    } 
}

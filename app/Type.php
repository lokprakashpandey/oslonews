<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


	
class Type extends Model
{
	protected $fillable = array('name', 'slug');
	
	public $timestamps = false;

    public function news() {

        return $this->belongsToMany('App\News');

    }  
}

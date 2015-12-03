<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
	protected $fillable = array('name','slug'); 
	public $timestamps = false;
    public function categories() {

        return $this->belongsToMany('App\Category');

    }  
}

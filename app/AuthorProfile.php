<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Authenticatable;

class AuthorProfile extends Model
{
	public $timestamps = false;
    protected $fillable = ['name','address','email', 'phone', 'description','user_id','img','twitter'];
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	public function news() {

        return $this->hasMany('App\News');

    }  
}

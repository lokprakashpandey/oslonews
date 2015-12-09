<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = array('name', 'content','publish', 'user_id','position','slug','author_profile_id','front_img');
}

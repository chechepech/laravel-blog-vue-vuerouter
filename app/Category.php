<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
   protected $guarded = [];
   //url
   public function getRouteKeyName(){
        return 'url';
    }

    public function posts(){
    	return $this->hasMany(Post::class);
    }

    public function setNameAttribute($name){
    	$this->attributes['name']= $name;
    	$this->attributes['url']= Str::slug($name);
    }
}

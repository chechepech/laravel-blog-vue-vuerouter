<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
   $posts = NULL;
   $posts = $tag->posts()->published()->paginate();

   if(request()->wantsJson()){return $posts;}

    public function show(Tag $tag){
    	return view('pages.home', [
    		'title' => "Tags of Posts '{$tag->name}'",
    		'posts' => $posts
    	]);
    }
}

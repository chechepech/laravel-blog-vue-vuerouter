<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    public function show(Post $post){

    	if($post->isPublished() || auth()->check()){

    		$post->load('owner','category', 'tags','photos');

    		if(request()->wantsJson()){return $post;}

    		return view('posts.show', compact('post'));
    	}

    	abort(404);
    }

}

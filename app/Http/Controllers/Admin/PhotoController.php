<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Photo;

class PhotoController extends Controller
{
    public function store(Post $post){

       	request()->validate([
    		'photo' => 'required|image|max:2048'
    	]);
    	//save photo storage
        $post->photos()->create([
            'url' => request()->file('photo')->store('posts','public')
        ]);
    }

    public function destroy(Photo $photo){
        $photo->delete();
        return back()->with('flash','Photo deleted successfully');
    }
}

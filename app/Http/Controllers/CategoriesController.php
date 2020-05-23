<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category){
    	// $category->load('posts');
    	//$category->posts;
    	$posts = $category->posts()->published()->paginate();
    	if(request()->wantsJson()){return $posts;}
    	return view('pages.home',[
    		'title' => "Categories of Posts '{$category->name}'",
    		'posts' => $posts
    	]);
    }
}

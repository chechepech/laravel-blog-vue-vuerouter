<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class PageController extends Controller
{
    public function spa(){
        return view('pages.spa');
    }

    public function home(){

        $query = Post::published();

        if(request('month')){
            $query->whereMonth(request('month'));
        }

        if(request('year')){
            $query->whereYear(request('year'));
        }

    	$posts = $query->paginate(1);

        if(request()->wantsJson()){return $posts;}

    	return view('pages.home',compact('posts'));
    }
    public function about(){
    	return view('pages.about');
    }
    public function archive(){

        //scoppe
        //$archive = Post::published()->byYearAndMonth()->get();

        $data = [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::take(4)->get(),
            'posts' => Post::latest('published_at')->take(4)->get(),
            'archive' => Post::selectRaw('year(published_at) year')
            ->selectRaw('month(published_at) month')
            ->selectRaw('monthname(published_at) monthname')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('year')
            ->get()
        ];

        if(request()->wantsJson()){return $data;}

    	return view('pages.archive', $data);
    }
    public function contact(){
    	return view('pages.contact');
    }
}

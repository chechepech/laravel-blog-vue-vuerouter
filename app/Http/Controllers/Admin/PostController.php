<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use App\Category;
use Carbon\Carbon;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$posts = Post::all();
		// $posts = Post::where('user_id',auth()->user()->id())->get();
		//$posts = auth()->user()->posts;
		$posts = Post::allowed()->get();
		return view('admin.posts.index',compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	// public function create()
	// {
	// 	$categories = Category::all();
	// 	$tags = Tag::all();
	// 	return view('admin.posts.create',compact('categories','tags'));
	// }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$post = NULL;

		$this->authorize('create', new Post);
		request()->validate([
			'title' => 'required|min:3|string',
			'excerpt' => 'required|string'
		]);

		$post = Post::create($request->all());

		return redirect()->route('admin.posts.edit', $post);

		// 	'title' => 'required',
		// request()->validate([
		// 	'title' => 'required',
		// 	'excerpt' => 'required',
		// 	'body' => 'required',
		// 	'category' => 'required',
		// 	'tags' => 'required'
		// ]);

		// $post = new Post;
		// $post->title = $request->get('title');
		// $post->url = Str::slug($request->get('title'));
		// $post->body = $request->get('body');
		// $post->excerpt = $request->get('excerpt');
		// $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : NULL;
		// $post->category_id = $request->get('category');
		// //$post->save();

	 //   // $post->tags()->attach($request->get('tags'));

		// return back()->with('flash','Post was created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post)
	{
		//policies
		// chapter = 54
		//$this->authorize('view', $post);
		$this->authorize('update', $post);

		return view('admin.posts.edit', [
			'post' => $post,
			'tags' => Tag::all(),
			'categories' => Category::all()
		]);
		// $categories = Category::all();
		// $tags = Tag::all();
		//return view('admin.posts.edit', compact('post','tags','categories'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StorePostRequest $request, Post $post)
	{
		//policies
		$this->authorize('update', $post);
		$post->update($request->all());
        $post->syncTags($request->get('tags'));
        return redirect()->route('admin.posts.edit', $post)->with('flash','Post was updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post)
	{
		//policies
		$this->authorize('delete', $post);
		$post->delete();
		return redirect()
				->route('admin.posts.index')
				->with('flash','Post deleted successfully');
	}
}

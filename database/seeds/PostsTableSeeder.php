<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Category::truncate();
		//Post::truncate();
		Storage::disk('public')->deleteDirectory('posts');
		$category = $post = NULL;

		$category =new Category;
		$category->name = 'Lorem';
		$category->save();

		$post = new Post;
		$post->title = 'Lorem Ipsum';
		$post->url = Str::slug('Lorem Ipsum');
		$post->excerpt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam aliquid cumque explicabo, labore illum, mollitia autem quibusdam nam nihil quas provident maxime quis voluptatum incidunt facere suscipit animi voluptates. Architecto.';
		$post->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		$post->published_at = Carbon::now();
		$post->category_id = $category->id;
		$post->user_id = 1;
		$post->save();

		$post->tags()->attach(Tag::create(['name'=>'Tag 1']));

		$category =new Category;
		$category->name = 'Impsum';
		$category->save();

		$post = new Post;
		$post->title = 'Lorem Ipsum 2';
		$post->url = Str::slug('Lorem Ipsum 2');
		$post->excerpt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam aliquid cumque explicabo, labore illum, mollitia autem quibusdam nam nihil quas provident maxime quis voluptatum incidunt facere suscipit animi voluptates. Architecto.';
		$post->body = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
		$post->published_at = Carbon::now();
		$post->category_id = $category->id;
		$post->user_id = 2;
		$post->save();
		$post->tags()->attach(Tag::create(['name'=>'Tag 2']));
	}
}

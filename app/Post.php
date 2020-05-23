<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
	protected $fillable = ['title', 'body', 'excerpt', 'iframe', 'published_at', 'category_id','user_id'];
	protected $dates= ['published_at'];
	protected $appends= ['published_date'];
	//Preload models
	//protected $with = ['category','tags', 'owner','photos'];

	public function getPublishedDateAttribute(){
		return optional($this->published_at)->format('M d');
	}

	//one to many Relation (inverse)
	public function owner(){
		return $this->belongsTo(User::class,'user_id');
	}

	public static function boot(){
		parent::boot();
		static::deleting(function($post){
			//delete tags
			$post->tags()->detach();
			//delete photos
			$post->photos->each->delete();
		});
	}

	//override method create
	public static function create(array $attributes = []){
		//key data
		$attributes['user_id'] = auth()->user()->id;
		$post = static::query()->create($attributes);
		$post->generateUrl();
		return $post;
	}

	public function isPublished(){
		//validate this field
		return ! (is_null($this->published_at) && $this->published_at < today());
	}

	public function generateUrl(){

		$url = Str::slug($this->title);

		if($this->whereUrl($url)->exists()){
			$url = "{$url}-{$this->id}";
		}
		$this->url = $url;
		$this->save();
	}

	public function getRouteKeyName(){
		return 'url';
	}

	// Relation
	public function category(){

		return $this->belongsTo(Category::class);
	}

	//One to Many Relation
	public function photos(){

		return $this->hasMany(Photo::class);
	}

	//Many to Many Relation
	public function tags(){

		return $this->belongsToMany(Tag::class);
	}

	//mutator Title
	// public function setTitleAttribute($title){
	//     $this->attributes['title']= $title;
	//     $this->attributes['url']= Str::slug($title);
	// }

	//Query scope check last group by
	public function scopePublished($query){
		$query->with(['category','tags', 'owner','photos'])
				->whereNotNull('published_at')
				->where('published_at','<=', Carbon::now());
				//->latest('published_at');
	}

	public function scopeAllowed($query){
		//if(auth()->user()->hasRole('Admin')){
		if(auth()->user()->can('view', $this)){
			return $query;
		}

		return $query->where('user_id', auth()->user()->id);
	}

	public function scopeByYearAndMonth($query){

		$query->selectRaw('year(published_at) year')
            ->selectRaw('month(published_at) month')
            ->selectRaw('monthname(published_at) monthname')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('year');
	}

	//mutator Published_At
	public function setPublishedAtAttribute($published_at){
		$this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : NULL;
	}

	//mutator Category
	public function setCategoryIdAttribute($category){
		$this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
	}

	//Method/Function
	public function syncTags($tags = NULL){
		// foreach ($request->get('tags') as $tag) {
		//  $tags[]= Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
		// }
		$tagIds = collect($tags)->map(function($tag){
			return Tag::find($tag) ? $tag : Tag::create(['name'=>$tag])->id;
		});

	  return $this->tags()->sync($tagIds);
	}

	public function viewType($home = NULL){
		if ($this->photos->count() === 1):
			 return 'posts.photo';
		elseif($this->photos->count() > 1):
			return $home === 'home' ? 'posts.carousel-preview' : 'posts.carousel';
		elseif($this->iframe):
			return 'posts.iframe';
		else:
			return 'posts.text';
		endif;
	}
}
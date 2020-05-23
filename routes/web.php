<?php

use Illuminate\Support\Facades\Route;

// DB::listen(function($query){
// 	var_dump($query->sql);
// });
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('email', function(){
	return new App\Mail\LoginCredentials(App\User::first(), '1234567r');
});*/

//Route::get('/', 'PageController@home')->name('pages.home');
//Route::get('/', 'PageController@spa')->name('pages.home');

// Route::get('about', 'PageController@about')->name('pages.about');
// Route::get('archive', 'PageController@archive')->name('pages.archive');
// Route::get('contact', 'PageController@contact')->name('pages.contact');

// Route::get('blog/{post}','PostController@show')->name('posts.show');
// Route::get('categories/{category}','CategoriesController@show')->name('categories.show');
// Route::get('tags/{tag}','TagsController@show')->name('tags.show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	Route::get('/', 'AdminController@index')->name('dashboard');

	Route::resource('posts','PostController',['except' => 'show', 'as'=>'admin']);
	Route::resource('users','UserController',['as'=>'admin']);
	Route::resource('roles','RoleController',['except' => 'show', 'as'=>'admin']);
	Route::resource('permissions','PermissionController', ['only' => ['index', 'edit','update'], 'as'=>'admin']);
	/* ----- Spatie Role - DATABASE - name ------*/
	Route::middleware('role:Admin')->put('users/{user}/roles', 'UserRoleController@update')->name('admin.users.roles.update');
	Route::middleware('role:Admin')->put('users/{user}/permissions', 'UserPermissionController@update')->name('admin.users.permissions.update');
	/* ---- Spatie Role - DATABASE - name ------*/
	// Route::get('posts', 'PostController@index')->name('admin.posts.index');
	// Route::get('posts/create', 'PostController@create')->name('admin.posts.create');
	// Route::post('posts', 'PostController@store')->name('admin.posts.store');
	// Route::get('posts/{post}', 'PostController@edit')->name('admin.posts.edit');
	// Route::put('posts/{post}', 'PostController@update')->name('admin.posts.update');
	// Route::delete('posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');
	Route::post('posts/{post}/photos', 'PhotoController@store')->name('admin.posts.photos.store');
	Route::delete('photos/{photo}', 'PhotoController@destroy')->name('admin.photos.destroy');
});
Auth::routes();
Route::get('/{any?}', 'PageController@spa')->name('pages.home')->where('any','.*');
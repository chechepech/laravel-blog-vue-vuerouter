<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('posts', 'PageController@home');
Route::get('blog/{post}', 'PostController@show');
Route::get('categories/{category}', 'CategoriesController@show');
Route::get('tags/{tag}', 'TagsController@show');
Route::get('archive', 'PageController@archive');
Route::get('archive', 'PageController@archive');
Route::post('messages', function(){
	return response()->json(['status'=>'OK!']);
});
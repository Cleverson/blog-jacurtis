<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['web']], function () {

	Route::get('blog/{slug}',['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
	Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex'] );

	Route::get('/', ['as' => '/', 'uses' => 'PagesController@getIndex']);
	Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
	Route::get('contact',['as' => 'contact', 'uses' => 'PagesController@getContact'] );

});

Route::group(['middleware' => ['auth']], function() {

	Route::resource('posts', 'PostController' );
	Route::resource('categories', 'CategoryController', ['except' => 'create']);
	
});

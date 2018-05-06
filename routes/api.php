<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(array('prefix' => 'album'), function (){
	Route::post('/getPhotos', 'Ajax\AlbumController@getAlbumPhotos');
	Route::post('/add', 'Ajax\AlbumController@add');
	Route::post('/del', 'Ajax\AlbumController@del');
	Route::post('/edit', 'Ajax\AlbumController@edit');
});

Route::group(array('prefix' => 'photo'), function (){
	Route::post('/add', 'Ajax\PhotoController@add');
	Route::post('/del', 'Ajax\PhotoController@del');
});

Route::group(array('prefix' => 'comment'), function (){
	Route::get('/getAllComments', 'Ajax\CommentController@getAllComments');
	Route::post('/addComment', 'Ajax\CommentController@addComment');
	Route::post('/add', 'Ajax\CommentController@add');
	Route::post('/del', 'Ajax\CommentController@del');
	Route::post('/edit', 'Ajax\CommentController@edit');
});

Route::group(array('prefix' => 'category'), function (){
	Route::get('/getAllCategories', 'Ajax\CategoryController@getAllCategories');
	Route::post('/add', 'Ajax\CategoryController@add');
	Route::post('/del', 'Ajax\CategoryController@del');
	Route::post('/edit', 'Ajax\CategoryController@edit');
});

Route::group(array('prefix' => 'page'), function (){
	Route::get('/getAllPages', 'Ajax\PageController@getAllPages');
	Route::post('/getPage', 'Ajax\PageController@getPage');
	Route::post('/add', 'Ajax\PageController@add');
	Route::post('/del', 'Ajax\PageController@del');
	Route::post('/edit', 'Ajax\PageController@edit');
});

Route::group(array('prefix' => 'mail'), function (){
	Route::post('/send', 'Ajax\MailController@send');
});
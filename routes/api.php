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

Route::post('/album/getPhotos', 'Ajax\AlbumController@getAlbumPhotos');
Route::post('/album/add', 'Ajax\AlbumController@add');
Route::post('/album/del', 'Ajax\AlbumController@del');
Route::post('/album/edit', 'Ajax\AlbumController@edit');
Route::post('/photo/add', 'Ajax\PhotoController@add');
Route::post('/photo/del', 'Ajax\PhotoController@del');
Route::post('/page/getPage', 'Ajax\PageController@getPage');
Route::get('/comment/getAllComments', 'Ajax\CommentController@getAllComments');
Route::post('/comment/addComment', 'Ajax\CommentController@addComment');
Route::post('/comment/add', 'Ajax\CommentController@add');
Route::post('/comment/del', 'Ajax\CommentController@del');
Route::post('/comment/edit', 'Ajax\CommentController@edit');

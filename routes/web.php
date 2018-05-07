<?php

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

Route::get('/', 'PageController@index');
Route::get('/methodological', 'PageController@methodological');
Route::get('/student', 'PageController@student');
Route::get('/parents', 'PageController@parents');
Route::get('/comments', 'PageController@comments');
Route::get('/sitemap', 'PageController@sitemap');
Route::post('/login', 'PageController@login');
Route::get('/logout', 'PageController@logout');

Route::group(array('prefix' => 'admin'), function () {//, 'middleware' => ['web']
	
	Route::get('/home', 'AdminPageController@home');
	Route::get('/albums', 'AdminPageController@albums');
	Route::get('/album/{id}', 'AdminPageController@album');
	Route::get('/addAlbum', 'AdminPageController@addAlbum');
	Route::get('/editAlbum/{id}', 'AdminPageController@editAlbum');
	Route::get('/addPhoto/{id}', 'AdminPageController@addPhoto');
	Route::get('/comments', 'AdminPageController@comments');
	Route::get('/addComment', 'AdminPageController@addComment');
	Route::get('/editComment/{id}', 'AdminPageController@editComment');
	Route::get('/categories', 'AdminPageController@categories');
	Route::get('/addCategory', 'AdminPageController@addCategory');
	Route::get('/editCategory/{id}', 'AdminPageController@editCategory');
	Route::get('/pages', 'AdminPageController@pages');
	Route::get('/addPage', 'AdminPageController@addPage');
	Route::get('/editPage/{id}', 'AdminPageController@editPage');
	
	
});
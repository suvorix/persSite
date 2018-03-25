<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Photo;
use App\Comment;
use App\Category;

class AdminPageController extends Controller
{
	public function home()
	{
		return view('admin.home');
	}
	
	public function albums()
	{
		$albums = Album::select('id_album', 'alb_name', 'alb_image', 'alb_date')->orderBy('alb_date', 'desc')->get();
		return view('admin.albums')->with([
			'albums' => $albums
		]);
	}
	
	public function album(Request $request)
	{
		$albumName = Album::select('alb_name')->where('id_album', $request->id)->first();
		$photos = Photo::select('id_photo', 'pht_img', 'pht_date')->where('pht_albumId', $request->id)->orderBy('pht_date', 'desc')->get();
		return view('admin.album')->with([
			'album' => $request->id,
			'albumName' => $albumName->alb_name,
			'photos' => $photos
		]);
	}
	
	public function addAlbum()
	{
		return view('admin.addAlbum');
	}
	
	public function editAlbum(Request $request)
	{
		$album = Album::select('id_album', 'alb_name', 'alb_image')->where('id_album', $request->id)->first();
		return view('admin.editAlbum')->with([
			'album' => $album
		]);
	}
	
	public function addPhoto(Request $request)
	{
		return view('admin.addPhoto')->with([
			'album' => $request->id
		]);
	}
	
	public function comments()
	{
		return view('admin.comments');
	}
	
	public function addComment()
	{
		return view('admin.addComment');
	}
	
	public function editComment(Request $request)
	{
		$comment = Comment::select('id_comment', 'cmt_name', 'cmt_email', 'cmt_text')->where('id_comment', $request->id)->first();
		return view('admin.editComment')->with([
			'comment' => $comment
		]);
	}
	
	public function categories()
	{
		return view('admin.categories');
	}
	
	public function addCategory()
	{
		return view('admin.addCategory');
	}
	
	public function editCategory(Request $request)
	{
		$category = Category::select('id_category', 'ctg_name', 'ctg_page')->where('id_category', $request->id)->first();
		return view('admin.editCategory')->with([
			'category' => $category
		]);
	}
}
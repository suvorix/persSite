<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Photo;
use App\Comment;
use App\Category;
use App\Page;
use App\User;

class AdminPageController extends Controller
{
	public function adminCheck($request)
	{
		$user = User::select('usr_permisson')->where([
			'usr_login' => $request->session()->get('login'),
			'usr_password' => md5($request->session()->get('password'))
		])->first();
		if(isset($user)){
			if($user->usr_permisson != 'admin')
			{
				return false;
			}
		}
		else
		{
			return false;
		}
		return true;
	}
	
	public function home(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.home');
	}
	
	public function albums(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$albums = Album::select('id_album', 'alb_name', 'alb_image', 'alb_date')->orderBy('alb_date', 'desc')->get();
		return view('admin.albums')->with([
			'albums' => $albums
		]);
	}
	
	public function album(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$albumName = Album::select('alb_name')->where('id_album', $request->id)->first();
		$photos = Photo::select('id_photo', 'pht_img', 'pht_date')->where('pht_albumId', $request->id)->orderBy('pht_date', 'desc')->get();
		return view('admin.album')->with([
			'album' => $request->id,
			'albumName' => $albumName->alb_name,
			'photos' => $photos
		]);
	}
	
	public function addAlbum(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.addAlbum');
	}
	
	public function editAlbum(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$album = Album::select('id_album', 'alb_name', 'alb_image')->where('id_album', $request->id)->first();
		return view('admin.editAlbum')->with([
			'album' => $album
		]);
	}
	
	public function addPhoto(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.addPhoto')->with([
			'album' => $request->id
		]);
	}
	
	public function comments(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.comments');
	}
	
	public function addComment(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.addComment');
	}
	
	public function editComment(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$comment = Comment::select('id_comment', 'cmt_name', 'cmt_email', 'cmt_text')->where('id_comment', $request->id)->first();
		return view('admin.editComment')->with([
			'comment' => $comment
		]);
	}
	
	public function categories(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.categories');
	}
	
	public function addCategory(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.addCategory');
	}
	
	public function editCategory(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$category = Category::select('id_category', 'ctg_name', 'ctg_page')->where('id_category', $request->id)->first();
		return view('admin.editCategory')->with([
			'category' => $category
		]);
	}
	
	public function pages(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		return view('admin.pages');
	}
	
	public function addPage(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$categories = Category::select('id_category', 'ctg_name')->get();
		return view('admin.addPage')->with([
			'categories' => $categories
		]);
	}
	
	public function editPage(Request $request)
	{
		if(!$this->adminCheck($request)) return redirect('');
		$categories = Category::select('id_category', 'ctg_name')->get();
		$page = Page::select('id_page', 'pg_catId', 'pg_name', 'pg_text', 'pg_group')->where('id_page', $request->id)->first();
		return view('admin.editPage')->with([
			'categories' => $categories,
			'page' => $page
		]);
	}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Category;
use App\Page;
use App\Comment;
use App\User;

class PageController extends Controller
{
	public function index ()
	{
		$albums = Album::select('id_album', 'alb_name', 'alb_image', 'alb_date')->orderBy('alb_date', 'desc')->get();
		return view('index')->with([
			'albums' => $albums
		]);
	}
		
	public function methodological ()
	{
		$content = Page::select('id_page', 'pg_name', 'pg_text')->where('pg_group', 'methodological')->first();
		$pageCat = array();
		$categories = Category::select('id_category', 'ctg_name')->where('ctg_page', 'methodological')->get();
		foreach($categories as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat, $catArr);			
		}
		$pageNoCat = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'methodological']
		])->orderBy('pg_date', 'asc')->get();
		return view('methodological')->with([
			'sidebarListPageCat' => $pageCat,
			'sidebarListPageNoCat' => $pageNoCat,
			'content' => $content
		]);
	}
	
	public function student ()
	{
		$content = Page::select('id_page', 'pg_name', 'pg_text')->where('pg_group', 'student')->first();
		$pageCat = array();
		$categories = Category::select('id_category', 'ctg_name')->where('ctg_page', 'student')->get();
		foreach($categories as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat, $catArr);			
		}
		$pageNoCat = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'student']
		])->orderBy('pg_date', 'asc')->get();
		return view('student')->with([
			'sidebarListPageCat' => $pageCat,
			'sidebarListPageNoCat' => $pageNoCat,
			'content' => $content
		]);
	}
	
	public function parents ()
	{
		$content = Page::select('id_page', 'pg_name', 'pg_text')->where('pg_group', 'parents')->first();
		$pageCat = array();
		$categories = Category::select('id_category', 'ctg_name')->where('ctg_page', 'parents')->get();
		foreach($categories as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat, $catArr);			
		}
		$pageNoCat = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'parents']
		])->orderBy('pg_date', 'asc')->get();
		return view('parents')->with([
			'sidebarListPageCat' => $pageCat,
			'sidebarListPageNoCat' => $pageNoCat,
			'content' => $content
		]);
	}
	
	public function comments ()
	{
		$comments = Comment::select('cmt_name', 'cmt_email', 'cmt_text', 'cmt_date')->orderBy('cmt_date', 'desc')->limit(10)->offset(0)->get();
		return view('comments')->with([
			'comments' => $comments
		]);
	}
	
	public function sitemap ()
	{
		$pageCat1 = array();
		$categories1 = Category::select('id_category', 'ctg_name')->where('ctg_page', 'methodological')->get();
		foreach($categories1 as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat1, $catArr);			
		}
		$pageNoCat1 = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'methodological']
		])->orderBy('pg_date', 'asc')->get();
		$pageCat2 = array();
		$categories2 = Category::select('id_category', 'ctg_name')->where('ctg_page', 'student')->get();
		foreach($categories2 as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat2, $catArr);			
		}
		$pageNoCat2 = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'student']
		])->orderBy('pg_date', 'asc')->get();
		$pageCat3 = array();
		$categories3 = Category::select('id_category', 'ctg_name')->where('ctg_page', 'parents')->get();
		foreach($categories3 as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat3, $catArr);			
		}
		$pageNoCat3 = Page::select('id_page', 'pg_name')->where([
			['pg_catId', 0],
			['pg_group', 'parents']
		])->orderBy('pg_date', 'asc')->get();
		return view('sitemap')->with([
			'sidebarListPageCat1' => $pageCat1,
			'sidebarListPageNoCat1' => $pageNoCat1,
			'sidebarListPageCat2' => $pageCat2,
			'sidebarListPageNoCat2' => $pageNoCat2,
			'sidebarListPageCat3' => $pageCat3,
			'sidebarListPageNoCat3' => $pageNoCat3
		]);
	}
	
	public function login (Request $request)
	{
		$request->session()->put('login', $request->login);
		$request->session()->put('password', $request->password);
		$user = User::select('usr_permisson')->where([
			'usr_login' => $request->login,
			'usr_password' => md5($request->password)
		])->first();
		$request->session()->put('permission', $user->usr_permisson);
		return redirect('/admin/home');
	}
	
	public function logout (Request $request)
	{
		$request->session()->put('login', '');
		$request->session()->put('password', '');
		$request->session()->put('permission', '');
		return redirect('');
	}
}

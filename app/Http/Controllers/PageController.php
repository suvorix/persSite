<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Category;
use App\Page;
use App\Comment;

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
		$pageCat = array();
		$categories = Category::select('id_category', 'ctg_parentId', 'ctg_name', 'ctg_description')->where('ctg_page', 'methodological')->get();
		foreach($categories as $category)
		{
			$catArr = array();
			$pageInfo = Page::select('id_page', 'pg_name')->where('pg_catId', $category->id_category)->orderBy('pg_date', 'asc')->get();
			array_push($catArr, $category);
			array_push($catArr, $pageInfo);
			array_push($pageCat, $catArr);			
		}
		$pageNoCat = Page::select('id_page', 'pg_name')->where('pg_catId', 0)->orderBy('pg_date', 'asc')->get();
		return view('methodological')->with([
			'sidebarListPageCat' => $pageCat,
			'sidebarListPageNoCat' => $pageNoCat
		]);
	}
	
	public function student ()
	{
		return view('student');
	}
	
	public function parents ()
	{
		return view('parents');
	}
	
	public function reviews ()
	{
		$comments = Comment::select('cmt_name', 'cmt_email', 'cmt_text', 'cmt_date')->orderBy('cmt_date', 'desc')->limit(10)->offset(0)->get();
		return view('reviews')->with([
			'comments' => $comments
		]);
	}
}
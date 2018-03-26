<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;

class PageController extends Controller
{
	public function getPage (Request $request)
	{
		$page = Page::select('pg_text')->where('id_page', $request->id)->orderBy('pg_date', 'desc')->first();
		return response()->json(array(
			'status'=>'success',
			'data'=>$page
		), 200);
	}
	public function getAllPages () 
	{
		$data = array(
			"data" => Page::select('id_page', 'pg_catId', 'pg_name', 'pg_group')->orderBy('pg_date', 'desc')->get()
								 );
		return strip_tags(nl2br(json_encode($data, JSON_UNESCAPED_UNICODE)), '<br>');
	}
	
	public function add (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->name) && !isset($request->category) && !isset($request->page) && !isset($request->summernote))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		// Добавление в БД
		Page::insert([
			'pg_catId' => $request->category,
			'pg_name' => $request->name,
			'pg_text' => $request->summernote,
			'pg_group' => $request->page,
			'pg_date' => time()
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Страница добавлена',
			'goto'=>'/admin/pages'
		), 200);
	}
	
	public function del(Request $request)
	{
		// Проверка все ли данные дошли
		if(!isset($request->id))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		Page::where('id_page', $request->id)->delete();
		
		// ДОБАВИТЬ ПРОВЕРКУ ЕСТЬ ЛИ ПРЕКРЕПЛЁНЫЕ СТРАНИЦЫ К ДАННОМУ РАЗДЕЛУ И ОТКРЕПИТЬ ИХ
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Страница удалена'
		), 200);
	}
	
	public function edit (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->id) && !isset($request->name) && !isset($request->category) && !isset($request->page) && !isset($request->summernote))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		$page = Page::select('pg_catId', 'pg_name', 'pg_text', 'pg_group')->where('id_page', $request->id)->first();
		
		if($request->name != $page->pg_name)
		{
			Page::where('id_page', $request->id)->update(['pg_name'=>$request->name]);
		}
		
		if($request->category != $page->pg_catId)
		{
			Page::where('id_page', $request->id)->update(['pg_catId'=>$request->category]);
		}
		
		if($request->summernote != $page->pg_text)
		{
			Page::where('id_page', $request->id)->update(['pg_text'=>$request->summernote]);
		}
		
		if($request->page != $page->pg_group)
		{
			Page::where('id_page', $request->id)->update(['pg_group'=>$request->page]);
		}
				
		return response()->json(array(
			'status'=>'success',
			'text'=>'Страница изменена',
			'goto'=>'/admin/pages'
		), 200);
	}
}

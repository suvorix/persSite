<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
	public function getAllCategories () 
	{
		$data = array(
			"data" => Category::select('id_category', 'ctg_name', 'ctg_page')->orderBy('id_category', 'desc')->get()
								 );
		return strip_tags(nl2br(json_encode($data, JSON_UNESCAPED_UNICODE)), '<br>');
	}
		
	public function add (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->name) && !isset($request->page))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		// Добавление в БД
		Category::insert([
			'ctg_name' => $request->name,
			'ctg_page' => $request->page
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Раздел добавлен',
			'goto'=>'/admin/categories/'
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
		
		Category::where('id_category', $request->id)->delete();
		
		// ДОБАВИТЬ ПРОВЕРКУ ЕСТЬ ЛИ ПРЕКРЕПЛЁНЫЕ СТРАНИЦЫ К ДАННОМУ РАЗДЕЛУ И ОТКРЕПИТЬ ИХ
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Раздел удален'
		), 200);
	}
	
	public function edit (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->id) && !isset($request->name) && !isset($request->page))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		$comment = Category::select('ctg_name', 'ctg_page')->where('id_category', $request->id)->first();
		
		if($request->name != $comment->ctg_name)
		{
			Category::where('id_category', $request->id)->update(['ctg_name'=>$request->name]);
		}
		
		if($request->page != $comment->ctg_page)
		{
			Category::where('id_category', $request->id)->update(['ctg_page'=>$request->page]);
		}
						
		return response()->json(array(
			'status'=>'success',
			'text'=>'Раздел изменён',
			'goto'=>'/admin/categories'
		), 200);
	}
}

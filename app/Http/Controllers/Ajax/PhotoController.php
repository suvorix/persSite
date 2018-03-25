<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\Facades\Image as Image;

use App\Photo;

class PhotoController extends Controller
{
		public function add (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->album) && !isset($request->image) && !isset($request->imageType))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
			
		// Загрузка фото на сервер и получение его гланой части имени (Например: "698647f4.jpg")
		if($request->imageType == 'url')
		{
			$imageName = saveImageURL($request->image);
		}
		elseif($request->imageType == 'file')
		{
			//$image = Image::make($request->image); НЕ РАБОТАЕТ
			$imageName = saveImageFILE($request->image);
		}
		else
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные были доставлены некорректно'
			), 200);
		}
		
		// Проверка был ли загружен файл
		if(!$imageName)
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Возникла ошибка при загрузки изображения на сервер'
			), 200);
		}
		
		// Формирование значения поля image для сохранения в БД
		$images = array();
		$images['min'] = '/img/uploads/min-'.$imageName;
		$images['max'] = '/img/uploads/max-'.$imageName;
		$images = json_encode($images, JSON_UNESCAPED_UNICODE);
		
		// Добавление в БД
		Photo::insert([
			'pht_albumId' => $request->album,
			'pht_img' => $images,
			'pht_date' => time()
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Фотография добавлена',
			'goto'=>'/admin/album/'.$request->album
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
		
		$img = Photo::select('pht_img')->where('id_photo', $request->id)->first();
		$img = json_decode($img->pht_img);
		if($img->min != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min); }
		if($img->max != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max); }
		
		Photo::where('id_photo', $request->id)->delete();
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Фотография удалена'
		), 200);
	}
}

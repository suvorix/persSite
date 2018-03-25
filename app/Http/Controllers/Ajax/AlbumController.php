<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;
use App\Photo;

class AlbumController extends Controller
{
	public function getAllAlbums () 
	{
		return Album::select('alb_name', 'alb_image', 'alb_date')->orderBy('alb_date', 'desc')->get();
	}
	
	public function getAlbumPhotos (Request $request) 
	{
		$photos = Photo::select('pht_img', 'pht_date')->where('pht_albumId', $request->id)->orderBy('pht_date', 'desc')->get();
		
		return response()->json(array(
			'status'=>'success',
			'data'=>$photos
		), 200);
	}
	
	public function add (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->name) && !isset($request->image) && !isset($request->imageType))
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
			$image = InterventionImage::make($request->image);
			$imageName = saveImageFILE($image);
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
		$id = Album::insertGetId([
			'alb_name' => $request->name,
			'alb_image' => $images,
			'alb_date' => time()
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Альбом добавлен',
			'goto'=>'/admin/album/'.$id
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
		
		$img = Album::select('alb_image')->where('id_album', $request->id)->first();
		$img = json_decode($img->alb_image);
		if($img->min != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min); }
		if($img->max != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max); }
		
		$photos = Photo::select('id_photo', 'pht_img')->where('pht_albumId', $request->id)->get();
		foreach($photos as $photo)
		{
			$phImage = json_decode($photo->pht_img);
			if($phImage->min != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$phImage->min)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$phImage->min); }
			if($phImage->max != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$phImage->max)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$phImage->max); }
			Photo::where('id_photo', $photo->id_photo)->delete();
		}
		
		Album::where('id_album', $request->id)->delete();
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Альбом удален'
		), 200);
	}
	
	public function edit (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->id) && !isset($request->name) && !isset($request->image) && !isset($request->imageType))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		$album = Album::select('alb_name', 'alb_image')->where('id_album', $request->id)->first();
		
		if($request->name != $album->alb_name)
		{
			Album::where('id_album', $request->id)->update(['alb_name'=>$request->name]);
		}
		
		if($request->image != $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].json_decode($album->alb_image)->max)
		{
			$img = json_decode($album->alb_image);
			if($img->min != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->min); }
			if($img->max != '/img/default.png' && file_exists($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max)){ unlink($_SERVER['DOCUMENT_ROOT'].'/public'.$img->max); }
			
			// Загрузка фото на сервер и получение его гланой части имени (Например: "698647f4.jpg")
			if($request->imageType == 'url')
			{
				$imageName = saveImageURL($request->image);
			}
			elseif($request->imageType == 'file')
			{
				$image = InterventionImage::make($request->image);
				$imageName = saveImageFILE($image);
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
			
			Album::where('id_album', $request->id)->update(['alb_image' => $images]);
		}
		
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Альбом изменён',
			'goto'=>'/admin/albums'
		), 200);
	}
}

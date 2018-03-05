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
		$photos = Photo::select('pht_img', 'pht_imgDesc', 'pht_date')->where('pht_albumId', $request->id)->orderBy('pht_date', 'desc')->get();
		
		return response()->json(array(
			'status'=>'success',
			'data'=>$photos
		), 200);
	}
}

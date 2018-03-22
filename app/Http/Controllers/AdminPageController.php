<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Album;
use App\Photo;

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
		$photos = Photo::select('id_photo', 'pht_img', 'pht_date')->where('pht_albumId', $request->id)->orderBy('pht_date', 'desc')->get();
		return view('admin.album')->with([
			'photos' => $photos
		]);
	}
	
	public function addAlbum()
	{
		return view('admin.addAlbum');
	}
}
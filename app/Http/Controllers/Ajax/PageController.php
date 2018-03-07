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
}

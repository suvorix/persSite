<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentController extends Controller
{
	public function getAllComments () 
	{
		$data = array(
			"data" => Comment::select('id_comment', 'cmt_name', 'cmt_email', 'cmt_text')->orderBy('cmt_date', 'desc')->get()
								 );
		return strip_tags(nl2br(json_encode($data, JSON_UNESCAPED_UNICODE)), '<br>');
	}
	
	public function getNextComments (Request $request) 
	{
		$comments = Comment::select('id_comment', 'cmt_name', 'cmt_email', 'cmt_text')->orderBy('cmt_date', 'desc')->offset($request->startPos)->limit(10)->get();
		$data = '';
		foreach($comments as $comment)
		{
			$data .= '<div class="review"><h4 class="user_info">'.$comment->cmt_name.'<span class="color-accent">&nbsp;/&nbsp;</span><span class="user-email">'.$comment->cmt_email.'</span></h4><p>'.strip_tags(nl2br($comment->cmt_text), '<br>').'</p></div>';
		}
		
		return $data;
	}
	
	public function add (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->name) && !isset($request->email) && !isset($request->comment))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		// Добавление в БД
		Comment::insert([
			'cmt_name' => $request->name,
			'cmt_email' => $request->email,
			'cmt_text' => $request->comment,
			'cmt_date' => time()
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Отзыв добавлен',
			'goto'=>'/admin/comments/'
		), 200);
	}
	
	public function addComment (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!$request->{"g-recaptcha-response"} && !isset($request->name) && !isset($request->email) && !isset($request->comment))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";
    $secret_key = '6LcqsE4UAAAAABMpEQXhoLm8eqdwmvWnPKxmH1wS';
    $query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $request->{"g-recaptcha-response"};
		$data = json_decode(file_get_contents($query));
		if (!$data->success) {
        return response()->json(array(
					'status'=>'error',
					'text'=>'Извините, но похоже вы робот'
				), 200);
    }
		
		// Добавление в БД
		Comment::insert([
			'cmt_name' => $request->name,
			'cmt_email' => $request->email,
			'cmt_text' => $request->comment,
			'cmt_date' => time()
		]);
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Отзыв добавлен',
			'goto'=>'/comments'
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
		
		Comment::where('id_comment', $request->id)->delete();
		
		return response()->json(array(
			'status'=>'success',
			'text'=>'Отзыв удален'
		), 200);
	}
	
	public function edit (Request $request) 
	{		
		// Проверка все ли данные дошли
		if(!isset($request->id) && !isset($request->name) && !isset($request->email) && !isset($request->comment))
		{
			return response()->json(array(
				'status'=>'error',
				'text'=>'Некоторые данные не были доставлены'
			), 200);
		}
		
		$comment = Comment::select('cmt_name', 'cmt_email', 'cmt_text')->where('id_comment', $request->id)->first();
		
		if($request->name != $comment->cmt_name)
		{
			Comment::where('id_comment', $request->id)->update(['cmt_name'=>$request->name]);
		}
		
		if($request->email != $comment->cmt_email)
		{
			Comment::where('id_comment', $request->id)->update(['cmt_email'=>$request->email]);
		}
		
		if($request->comment != $comment->cmt_text)
		{
			Comment::where('id_comment', $request->id)->update(['cmt_text'=>$request->comment]);
		}
				
		return response()->json(array(
			'status'=>'success',
			'text'=>'Отзыв изменён',
			'goto'=>'/admin/comments'
		), 200);
	}
}

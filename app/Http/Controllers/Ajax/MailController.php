<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
	public function send(Request $request)
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$from = 'pers@mail.ru';
			$to = $request->email;
			$ip = getIP();
			sendMessage($from, $to, $ip, $request->name, $request->message, $request->contact_secret);
			return response()->json(array(
				'status'=>'success',
				'text'=>'Сообщение отправлено. Ожидайте ответа.'
			), 200);
		} else {
			if (function_exists('mail')) {
				return response()->json(array(
					'status'=>'error',
					'text'=>'Функция временно не работает.'
				), 200);
			} else {
				return response()->json(array(
					'status'=>'error',
					'text'=>'Ошибка отправки. Попробуйте ещё раз.'
				), 200);
			}
		}
		return response()->json(array(
			'status'=>'error',
			'text'=>'Критическая ошибка.'
		), 200);
	}
}

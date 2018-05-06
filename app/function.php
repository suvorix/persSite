<?php

include($_SERVER['DOCUMENT_ROOT'].'/public/idna_convert.class.php');

function convertCyrillicURL($url) {
	$idn = new idna_convert(array('idn_version'=>2008));
	$url=(stripos($url, 'xn--')!==false) ? $idn->decode($url) : $idn->encode($url);
	return $url;
}

function saveImageURL($url)
{
	$saveDir = $_SERVER['DOCUMENT_ROOT'].'/public/img/uploads/';
	$fileName = hash('crc32' , time().$url);
	$fileType = '';
	$quality = 100;
	$url = convertCyrillicURL($url);
	$image = Image::make($url);
	if($image->mime() == 'image/jpeg')
	{
		$fileType = '.jpg';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	elseif($image->mime() == 'image/png')
	{
		$fileType = '.png';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	elseif($image->mime() == 'image/gif')
	{
		$fileType = '.gif';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	else
	{
		return false;
	}
	return $fileName.$fileType;
}

function saveImageFILE($file)
{
	$saveDir = $_SERVER['DOCUMENT_ROOT'].'/public/img/uploads/';
	$fileName = hash('crc32' , time().$file);
	$quality = 100;
	$image = Image::make($file);
	if($image->mime() == 'image/jpeg')
	{
		$fileType = '.jpg';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	elseif($image->mime() == 'image/png')
	{
		$fileType = '.png';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	elseif($image->mime() == 'image/gif')
	{
		$fileType = '.gif';
		$image->widen(1500)->save($saveDir.'max-'.$fileName.$fileType, $quality);
		$image->widen(500)->save($saveDir.'min-'.$fileName.$fileType, $quality);
	}
	else
	{
		return false;
	}
	return $fileName.$fileType;
}
function adminCheck($request)
{
	$user = User::select('usr_permisson')->where([
			'usr_login' => $request->session()->get('login'),
			'usr_password' => md5($request->session()->get('password'))
		])->first();
		if(isset($user)){
			if($user->usr_permisson != 'admin')
			{
				return redirect('');
			}
		}
		else
		{
			return redirect('');
		}
}

function sendMessage($from, $to, $ip, $contact_name, $contact_message, $contact_secret) {
	$json = array();
	$token = "9320087105434084715";

	$contact_secret = strrev($contact_secret);

	if ($contact_secret !== $token) {
		$json['result'] = 'NO_SPAM';
		header('Access-Control-Allow-Origin: *');
	}

	$headers = "";
	if($from !== ''){
		$headers .= 'From: '.$from.'\r\n';
	}
	$headers .= 'Reply-To: '.$from."\r\n";
	$headers .= 'Content-Type: text/html; charset=UTF-8'."\r\n";

	$title = '=?utf-8?Q?=E2=9A=91?= Ирина Александрова для вас новое сообщение от '.$contact_name;
	$message = '<!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><title>Новое сообщение</title><style>*{margin: 0;padding: 0;color: #424242;font-family:"Helvetica Neue", "Arial", sans-serif;}p{margin: 10px 0px;}</style></head><body style="background: #f0f0f0;"><div style="margin: 40px; padding: 20px; border-radius: 3px; background: #fff;"><h3 style="color: #424242; text-transform: uppercase;">Вы получили <span style="border-bottom: 2px solid #9f17ff">новое сообщение</span> с вашего персонального сайта</h3><p><b>Имя отправителя: </b>'.$contact_name.'</p><p><b>E-mail отправителя: </b><a href="mailto:'.$from.'" style="color:#9f17ff">'.$from.'</a></p><p><b>IP отправителя: </b>'.$ip.'</p><div><b>Сообщение:</b>'.$contact_message.'</div></div></body></html>';
	
	$result = mail($to, $title, $message);

	if ($result) {
		$json['result'] = 'OK';
	} else {
		$json['result'] = 'SEND_ERROR';
	}
	header('Access-Control-Allow-Origin: *');
}

function getIP() {
    $ip = '';

    if (getenv('HTTP_CLIENT_IP')) {
        $ip = getenv('HTTP_CLIENT_IP');
    } else if(getenv('HTTP_X_FORWARDED_FOR')) {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } else if(getenv('HTTP_X_FORWARDED')) {
        $ip = getenv('HTTP_X_FORWARDED');
    } else if(getenv('HTTP_FORWARDED_FOR')) {
        $ip = getenv('HTTP_FORWARDED_FOR');
    } else if(getenv('HTTP_FORWARDED')) {
        $ip = getenv('HTTP_FORWARDED');
    } else if(getenv('REMOTE_ADDR')) {
        $ip = getenv('REMOTE_ADDR');
    } else {
        $ip = 'N/A';
    }

    return $ip;
}
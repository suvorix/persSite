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
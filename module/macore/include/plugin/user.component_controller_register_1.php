<?php

// Recaptch
$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$recaptcha=$_POST['g-recaptcha-response'];
	if(!empty($recaptcha))
	{
		$google_url="https://www.google.com/recaptcha/api/siteverify";

    $secret=Phpfox::getParam('macore.google_recaptcha_secret_key');

    // need uncomment this and also add param on template macore.block.recaptcha
    //$secret=Phpfox::getParam('macore.macore.google_recaptcha_secret_key');

    $ip=$_SERVER['REMOTE_ADDR'];
		$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
		$res=getCurlData($url);
		$res= json_decode($res, true);
		//reCaptcha success check 
		if(!$res['success'])
		{
			$this->url()->send('user.register', null, "Failed human verification. Are you human? Please be sure to check human verification");
		}
	}
	else
	{
		$this->url()->send('user.register', null, "Failed human verification. Are you human? Please be sure to check human verification.");
	}
}
// end

function getCurlData($url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
	$curlData = curl_exec($curl);
	curl_close($curl);
	return $curlData;
}

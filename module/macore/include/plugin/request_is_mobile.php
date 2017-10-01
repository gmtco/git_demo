<?php

	$fullurl = Phpfox::getLib('url')->getFullUrl(true);

	if(substr($fullurl, 0, 1) == '/') {     
	  $href = substr($fullurl, 1);
	}

	if(substr($fullurl, -1, 1) == '/'){
	 $fullurl = substr($fullurl, 0, -1);
	}

	$fullurl = str_replace('/', '.', $fullurl);

	$sSendWhere = 'mobile.'.$fullurl;

	// Phpfox::getLib('url')->send('mobile.'.$fullurl); 
?>
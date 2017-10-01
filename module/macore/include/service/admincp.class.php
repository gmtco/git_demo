<?php

/*
 by macagoraga.com
*/

defined('PHPFOX') or exit('NO DICE!');

class Macore_Service_Admincp extends Phpfox_Service
{

	public function __construct()
	{

	}

	public function movePhotoFromFeedToPhoto()
	{
		$this->database()->update(Phpfox::getT('photo'), array('type_id' => 0), 'type_id = 1');
	}

}
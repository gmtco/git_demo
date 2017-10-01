<?php

/*
 by macagoraga.com
*/

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Controller_Admincp_Index extends Phpfox_Component
{

	public function process()
	{

		$oMacore = Phpfox::getService('macore.admincp'); 

		if ($this->request()->get('move_photo_from_feed_to_photo')) 
		{
			$oMacore->movePhotoFromFeedToPhoto();
		}

	}

}

?>
<?php
/*
 by macagoraga.com
*/

 if(Phpfox::isModule('photo') && Phpfox::getParam('macore.mac_show_photo_from_feed_on_browse_photo')) {
	
	if(array_key_exists('type_id', $aVals) && $aVals['type_id'] == 1) {
		$this->database()->update($this->_sTable, array('type_id' => 0), 'photo_id='.$iId);
	}
 }

?>
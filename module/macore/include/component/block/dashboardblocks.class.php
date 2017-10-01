<?php

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Dashboardblocks extends Phpfox_Component {

	public function process() {
	
		$oMacore = Phpfox::getService('macore');
                
		if(Phpfox::getParam('macore.macshowdashboardblockpage'))
		{
			$this->template()->assign(
			'aPages', $oMacore->getPages('latestsharedpages', 4, false)
			);
		}
		if(Phpfox::getParam('macore.macshowdashboardblockvideo'))
		{
			$this->template()->assign(
			  'aVideos', $oMacore->getVideos('latestsharedvideo', 4, false)
			);
		}
		if(Phpfox::getParam('macore.macshowdashboardblockblog'))
		{
			$this->template()->assign(
			  'aBlogs', $oMacore->getBlogs('latestsharedblog', 4, false)
			);
		}
		return 'block'; 
	}

}

?>
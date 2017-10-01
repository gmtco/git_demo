<?php

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Mmblocks extends Phpfox_Component {

	public function process() {

		$oMacore = Phpfox::getService('macore');
		$type = $this->getParam('type');
		$filter = $this->getParam('filter');

		// only one when clicked load more
		$loadone = $this->getParam('loadone');
		if($loadone){
			if($type == 'blogs'){
				$this->template()->assign(
				  'aItems', $oMacore->getBlogs($filter, 4, false)
				);
			}
			$this->template()->assign(
			  'bMacLoadOnlyOne', $filter
			);
			$this->template()->assign(
			  'sMacTypeMedia', $type
			);
			return 'block'; 
		} 
		// end loadone


		// all blogs
		$aItemsLatest = $oMacore->getMedia($type, 'latestshared'.$type, 4, false);
		$aItemsLiked = $oMacore->getMedia($type, 'mostliked'.$type, 4, false);
		$aItemsCommented = $oMacore->getMedia($type, 'mostcommented'.$type, 4, false);
		$aItemsFriends = $oMacore->getMedia($type, 'myfriends'.$type, 4, false);
		$aItemsMy = $oMacore->getMedia($type, 'my'.$type, 4, false);
		$aItemsRandom = $oMacore->getMedia($type, 'random'.$type, 4, false);
		//

		// assign to template
		$this->template()->assign('aItemsLatest', $aItemsLatest);
		$this->template()->assign('aItemsLiked', $aItemsLiked);
		$this->template()->assign('aItemsCommented', $aItemsCommented);
		if(Phpfox::getUserId()){
			$this->template()->assign('aItemsFriends', $aItemsFriends);
			$this->template()->assign('aItemsMy', $aItemsMy);
		}
		$this->template()->assign('aItemsRandom', $aItemsRandom);
		$this->template()->assign('sMacTypeMedia', $type);
		$this->template()->assign('bMacLoadOnlyOne', 0);
		//

		// return block
		return 'block'; 
	}

}

?>
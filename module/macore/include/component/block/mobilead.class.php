<?php

/**
 * Pin by Macagoraga
 */
 
defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Mobilead extends Phpfox_Component {

  public function process(){

	$aMacMobileAd = Phpfox::getService('macore')->getAds(1, 'rand()', 'phpfox');

	if (!count($aMacMobileAd)) {			
		return false;
	}

	if(isset($aMacMobileAd['html_code'])){
		$aMacMobileAd['html_code'] = json_decode($aMacMobileAd['html_code'], true);
	}

	$this->template()->assign('aMacMobileAd', $aMacMobileAd);
	return 'block';

  }
}

?>
<?php

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Maclogin extends Phpfox_Component 
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{		
		// Assign the needed vars for the template
		$this->template()->assign(array(
				'sJanrainUrl' => (Phpfox::isModule('janrain') ? Phpfox::getService('janrain')->getUrl() : '')
			)
		);
		return 'block';
	}
}

?>
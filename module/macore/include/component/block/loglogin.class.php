<?php
/*
 by macagoraga.com
*/

defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Loglogin extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$aUsers = Phpfox::getService('macore')->getRecentLoggedInUsers();
		
		if (!count($aUsers))
		{
			return false;
		}
		
		$this->template()->assign(array(
				'sHeader' => Phpfox::getPhrase('log.recent_logins'),
				'aLoggedInUsers' => $aUsers,
				//'sDeleteBlock' => 'dashboard',
			/*
				'aEditBar' => array(
					'ajax_call' => 'log.getUserLoginEditBar',
					'params' => '&amp;type_id=dashboard'
				)							 
			 */
			)
		);
		
		return 'block';
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		$this->template()->clean(array(
				'sHeader',
				'aLoggedInUsers'
			)
		);
	
		//(($sPlugin = Phpfox_Plugin::get('log.component_block_login_clean')) ? eval($sPlugin) : false);
	}
}

?>
<?php
/**
 * by macagoraga.com
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * Displays a welcome message to a user in the sites index page. 
 * Also contains by default the users profile URL, current time stamp and link to site themes.
 */
class Macore_Component_Block_Userinfo extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		// If the user is not a member don't display this block
		if (!Phpfox::isUser()){
			return false;
		}
		$aGroup = Phpfox::getService('user.group')->getGroup(Phpfox::getUserBy('user_group_id'));
		// Assign template vars
		$this->template()->assign(array(
				'iMacTotalActivityPoints' => (int) Phpfox::getUserBy('activity_points'),
				'iMacTotalProfileViews' => (int) Phpfox::getUserBy('total_view'),
				'sMacUserGroupFullName' => Phpfox::getLib('locale')->convert($aGroup['title'])
			)
		);
	}
}

?>
<?php


defined('PHPFOX') or exit('NO DICE!');

class Macore_Component_Block_Activities extends Phpfox_Component
{

	public function process()
	{
		$aUser = Phpfox::getService('user')->get(Phpfox::getUserId(), true);
		
		$aModules = Phpfox::massCallback('getDashboardActivity');
		
		$aActivites = array(
			Phpfox::getPhrase('core.total_items') => $aUser['activity_total'],
			Phpfox::getPhrase('core.activity_points') => $aUser['activity_points'] . (Phpfox::getParam('user.can_purchase_activity_points') ? '<span id="purchase_points_link">(<a href="#" onclick="$Core.box(\'user.purchasePoints\', 500); return false;">' . Phpfox::getPhrase('user.purchase_points') . '</a>)</span>' : ''),
		);
		foreach ($aModules as $aModule)
		{
			foreach ($aModule as $sPhrase => $sLink)
			{
				$aActivites[$sPhrase] = $sLink;				
			}			
		}
		
		$this->template()->assign(array(
				'aActivites' => $aActivites
			)
		);
	}

}

?>
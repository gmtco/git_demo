<?php
/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');
?>
<div id="mac-welcome">

	<div class="btn-group btn-group-justified">

		<a href="#core.info" class="btn btn-xs btn-default" rel="tooltip" data-placement="bottom" data-original-title="{phrase var='core.account_info'}"><i class="icon-info"></i></a>
		{if Phpfox::getParam('user.no_show_activity_points')}
		<a href="#core.activity" class="btn btn-xs btn-default" rel="tooltip" data-placement="bottom" data-original-title="{$iMacTotalActivityPoints|number_format} {phrase var='core.activity_points'}">
		<i class="icon-trophy"></i>
		</a>
		{/if}
		{if Phpfox::isModule('subscribe') && Phpfox::getParam('subscribe.enable_subscription_packages')}
		<a href="#subscribe.listUpgrades" rel="welcome_info_holder_custom" class="mac-tooltip btn btn-xs btn-default" data-placement="bottom" data-original-title="{phrase var='subscribe.membership_membership_name' membership_name=$sMacUserGroupFullName}">
			<i class="icon-star"></i>
		</a>
		{/if}

		<a href="{url link='profile'}" class="btn btn-xs btn-default" rel="tooltip" data-placement="bottom" data-original-title="{$iMacTotalProfileViews|number_format} {phrase var='core.profile_views'}">
			<i class="icon-user"></i>
		</a>

	</div>		

</div>
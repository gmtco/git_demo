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

{if Phpfox::getParam('friend.load_friends_online_ajax') && !PHPFOX_IS_AJAX}
<script type="text/javascript">
$Behavior.macSetTimeoutFriends = function(){l}
	setTimeout('$.ajaxCall(\'macore.getOnlineFriends\', \'\', \'GET\')', 1000);
	$Behavior.macSetTimeoutFriends = function(){l}{r}
{r}
</script>
{else}

	{if isset($aFriends) && count($aFriends)}
		<div class="block_listing_inline">
			<ul>
				{foreach from=$aFriends name=friend item=aFriend}
				<li>	
					<a href="{url link=$aFriend.user_name}" class="mac-tooltip" data-placement="right" title="{$aFriend.full_name}">
						<img src="{img user=$aFriend suffix='_120_square' return_url=true}">
					</a>
				</li>	
				{/foreach}
			</ul>
			<div class="clear"></div>
		</div>
	{else}
		{phrase var='friend.no_friends_online'}
	{/if}

{/if}

{if Phpfox::getParam('friend.load_friends_online_ajax') && PHPFOX_IS_AJAX}
<script type="text/javascript">$('#js_total_block_friends_onlin').html('{$iTotalFriendsOnline}');</script>
{/if}
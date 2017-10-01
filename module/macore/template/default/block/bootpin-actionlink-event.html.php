<?php
/**
 * Pin by Macagoraga
 */
defined('PHPFOX') or exit('NO DICE!'); 
?>   
{if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
<li>
	<a title="{phrase var='macore.delete_event'}" href="{url link='event' delete=$aPin.ITEMID}" onclick="if(confirm('Are you sure you want delete this post? This action can\'t be undo.'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=event&feedid={$aPin.feed_id}');return false;">
		<i class="icon-remove"></i> Delete this event
	</a>
</li>
{/if}
{if ($aPin.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event')}
<li>
	<a href="{url link='event.add' id=$aPin.ITEMID}" title="{phrase var='event.edit_event'}">
		<i class="icon-edit"></i> {phrase var='poll.edit'}
	</a>
</li>
{/if}

                
                
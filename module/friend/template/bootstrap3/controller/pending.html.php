{if count($aPendingRequests)}
{foreach from=$aPendingRequests name=friend item=aFriend}
		<div class="friend_row_holder {if is_int($phpfox.iteration.friend/2)}row1{else}row2{/if}{if $phpfox.iteration.friend == 1 && !PHPFOX_IS_AJAX} row_first{/if}">
			<div class="friend_image">	
				{img user=$aFriend suffix='_50_square' max_width=50 max_height=50}
			</div>
			<div class="friend_user_name">
				{$aFriend|user} 
				<br>
				<a href="{url link='friend.pending' id=$aFriend.request_id}" class="friend_action_delete">
					{phrase var='friend.remove_this_request'}
				</a>
			</div>			
		</div>
{/foreach}
{pager}
{else}
<div class="extra_info">
	{phrase var='friend.there_are_no_pending_friends_requests'}
</div>
{/if}
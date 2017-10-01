{if $iTotalFriendRequests > 0}
<a href="{url link='friend.accept'}" class="global_notification_site btn btn-danger btn-block">
	{if $iTotalFriendRequests == 1}
	{phrase var='friend.you_have_1_new_friend_request'}
	{else}
	{phrase var='friend.you_have_total_new_friend_requests' total=$iTotalFriendRequests}
	{/if}
	<i class="icon-exclamation"></i>
</a>
<br>
{/if}
{if $iList > 0 && !PHPFOX_IS_AJAX}
<div class="friend_list_holder">
	<div class="friend_list_form">

		<form method="post" action="#" class="friend_list_form_post">
			<div><input type="hidden" name="list_id" value="{$aList.list_id}" /></div>
			<div><input type="hidden" name="old_name" value="{$aList.name|clean}" class="friend_list_form_post_old" /></div>
			<input type="text" name="name" value="{$aList.name|clean}" size="30" class="friend_list_form_input form-control" /> 
			<span class="friend_list_edit_ajax">
				<i class="icon-spinner icon-spin"></i>
			</span>
		</form>
	</div>
	<a 
	href="{url link='friend' dlist=$iList}" 
	class="friend_list_delete" 
	rel="tooltip" 
	data-placement="left" 
	data-toggle="tooltip" 
	data-original-title="{phrase var='friend.delete_list'}"
	>{phrase var='friend.delete_list'} <i class="icon-remove"></i></a>
	<ul>
		<li><a href="#" class="friend_list_edit_name" rel="{$iList}">{phrase var='friend.edit_name'}</a></li>
		<li>&middot;</li>
		<li{if $aList.is_profile} style="display:none;"{/if}><a href="#" class="friend_list_display_profile" rel="{$iList}">{phrase var='friend.display_on_profile'}</a></li>
		<li{if !$aList.is_profile} style="display:none;"{/if}><a href="#" class="friend_list_remove_profile" rel="{$iList}">{phrase var='friend.remove_from_profile'}</a></li>
		{if count($aFriends)}
		<li>&middot;</li>
		<li><a href="#" class="friend_list_change_order">{phrase var='friend.change_order'}</a></li>
		{/if}
	</ul>
</div>
{/if}
{if count($aFriends)}
{if !PHPFOX_IS_AJAX}
<form method="post" action="#" id="js_friend_list_order_form">	
	{if $iList > 0}
	<div><input type="hidden" name="list_id" value="{$iList}" /></div>
	{/if}
	<div id="js_friend_sort_holder">
{/if}
		{foreach from=$aFriends item=aFriend name=friend}		
		<div id="js_friend_{$aFriend.friend_id}" class="friend_row_holder js_selector_class_{$aFriend.friend_id} {if is_int($phpfox.iteration.friend/2)}row1{else}row2{/if}{if $phpfox.iteration.friend == 1 && !PHPFOX_IS_AJAX} row_first{/if}">
			<div><input type="hidden" name="friend_id[]" value="{$aFriend.friend_user_id}" class="js_friend_actual_user_id" /></div>
			<div class="friend_image" id="js_image_div_{$aFriend.friend_id}">	
				{img id='sJsUserImage_'$aFriend.friend_id'' user=$aFriend suffix='_50_square' max_width=50 max_height=50}
			</div>
			<div class="friend_user_name">
				{$aFriend|user:'':'':50} 
			</div>
			<div class="friend_action">
				<div class="js_friend_sort_handler js_friend_edit_order"></div>
					<div class="dropdown">
						<a href="#" class="btn btn-default{if Phpfox::isMobile()} btn-xs{/if}" data-toggle="dropdown">
							{phrase var='friend.edit_lists'} <i class="icon-chevron-down"></i>
						</a>
						<ul class="dropdown-menu">
						{foreach from=$aFriend.lists name=lists item=aList}
							<li>
								<a href="#" 
								rel="{$aList.list_id}|{$aFriend.friend_user_id}"
								{if $aList.is_active} class="active"{/if}
								>
								<i class="icon-chevron-right"></i> {$aList.name|clean}
								</a>
							</li>
						{/foreach}
						<li>
							<a href="#" class="friend_action_delete" rel="{$aFriend.friend_id}"><i class="icon-remove"></i> {phrase var='friend.remove_this_friend'}</a>
						</li>
						</ul>
					</div>
			</div>			
		</div>
		{/foreach}
	{if !PHPFOX_IS_AJAX}
	<div id="js_view_more_friends"></div>		
	{/if}	
{if !PHPFOX_IS_AJAX}
	</div>	
	<div class="p_top_8 js_friend_edit_order js_friend_edit_order_submit">		
		<ul class="table_clear_button">
			<li><input type="submit" value="{phrase var='friend.save_changes'}" class="btn btn-primary" /></li>
			<li class="table_clear_ajax"></li>
		</ul>
		<div class="clear"></div>		
	</div>	
</form>
{/if}
{pager}
{else}

<div class="alert alert-info">
	{phrase var='friend.no_friends'}
</div>
{/if}
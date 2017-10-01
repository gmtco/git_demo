{if Phpfox::getParam('macajaxmail.show_friend_without_conversation')}
		{foreach from=$aFriends name=friend item=aFriend}
			{if $aFriend.thread_id > 0}
			<div class="row1">
				<div class="row_title_image">
					<a href="{url link='mail.thread' id=$aFriend.thread_id}" title="{phrase var='macajaxmail.continue_conversation_with'} {$aFriend.full_name}" onclick="$.ajaxCall('macajaxmail.changeThread','id={$aFriend.thread_id}&user_id={$aFriend.user_id}');return false;">
						<img src="{img user=$aFriend suffix='_50_square' max_width=50 max_height=50 return_url=true}" alt="" class="js_hover_title" />
					</a>
				</div>
				<div class="row_title_info">
					 <a href="{url link='mail.thread' id=$aFriend.thread_id}" title="{phrase var='macajaxmail.continue_conversation_with'} {$aFriend.full_name}" onclick="$.ajaxCall('macajaxmail.changeThread','id={$aFriend.thread_id}&user_id={$aFriend.user_id}');return false;">
						<span class="js_hover_title">{$aFriend.full_name}</span>
					</a>
					
					<p>{$aFriend.text|shorten:60:'...'}</p>
				</div>
			</div>
			{else}
			<div class="row1">
				<div class="row_title_image">

					<a href="#" onclick="$Core.macComposeMessage({l}user_id: {$aFriend.user_id}{r}); return false;" title="{phrase var='macajaxmail.start_new_conversation_with'} {$aFriend.full_name}">
						<img src="{img user=$aFriend suffix='_50_square' max_width=50 max_height=50 return_url=true}" alt="" class="js_hover_title" />
					</a>
					
				</div>
				<div class="row_title_info">
					<a href="#" onclick="$Core.macComposeMessage({l}user_id: {$aFriend.user_id}{r}); return false;" title="{phrase var='macajaxmail.start_new_conversation_with'} {$aFriend.full_name}">
						<span class="js_hover_title">{$aFriend.full_name}</span>
					</a>
				</div>
			</div>
			{/if}
		{/foreach}
{else}
		 {foreach from=$aFriends name=friend item=aFriend}
			 <div class="row1">
				<div class="row_title_image">
					<a href="{url link='mail.thread' id=$aFriend.thread_id}" title="{phrase var='macajaxmail.continue_conversation_with'} {$aFriend.full_name}" onclick="$.ajaxCall('macajaxmail.changeThread','id={$aFriend.thread_id}&user_id={$aFriend.user_id}');return false;">
						<img src="{img user=$aFriend suffix='_50_square' max_width=50 max_height=50 return_url=true}" alt="" class="js_hover_title" />
					</a>
				</div>
				<div class="row_title_info">
					 <a href="{url link='mail.thread' id=$aFriend.thread_id}" title="{phrase var='macajaxmail.continue_conversation_with'} {$aFriend.full_name}" onclick="$.ajaxCall('macajaxmail.changeThread','id={$aFriend.thread_id}&user_id={$aFriend.user_id}');return false;">
						<span class="js_hover_title">						
							{foreach from=$aFriend.users name=mailusers item=aMailUser}
								{if count($aFriend.users) == $phpfox.iteration.mailusers && count($aFriend.users) > 1} 
									&amp; 
								{else}
								 {if $phpfox.iteration.mailusers != 1 && count($aMail.users) != 2}
								 , 
							 {/if}
							{/if}
							{$aMailUser.full_name|clean|shorten:35:'...'}
						 {/foreach}
						</span>
					</a>
					
					<p>{$aFriend.preview|shorten:60:'...'}</p>
				</div>
			</div>		
		{/foreach}		
{/if}		

{if count($aFriends)}
<div id="feed_view_more">
	<div id="js_feed_pass_info" style="display:none;"></div>
	<div id="feed_view_more_loader">{img theme='ajax/add.gif'}</div>
	<a href="javascript:void(0)" onclick="$(this).hide(); $('#feed_view_more_loader').show(); $.ajaxCall('macajaxmail.viewMore', 'iNextPage={$iNextPage}&bIsAjaxRequest=1', 'GET'); return false;" class="global_view_more no_ajax_link">
	{phrase var='feed.view_more'}
	</a>
</div>
{else}
<br />
<div class="message js_no_feed_to_show">{phrase var='feed.there_are_no_new_feeds_to_view_at_this_time'}</div>
{/if}
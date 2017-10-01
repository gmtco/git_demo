<div class="{if Phpfox::getParam('feed.enable_check_in') && Phpfox::getParam('core.google_api_key') != '' && isset($aFeed.location_name)}media-location {/if}media row_feed_loop js_parent_feed_entry {if isset($aFeed.feed_mini)} row_mini {else}{if isset($bChildFeed)} row1{else}{if isset($phpfox.iteration.iFeed)}{if is_int($phpfox.iteration.iFeed/2)}row1{else}row2{/if}{if $phpfox.iteration.iFeed == 1 && !PHPFOX_IS_AJAX} row_first{/if}{else}row1{/if}{/if}{/if} js_user_feed" id="js_item_feed_{$aFeed.feed_id}">
	{if false && ((defined('PHPFOX_FEED_CAN_DELETE')) || (Phpfox::getUserParam('feed.can_delete_own_feed') && $aFeed.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('feed.can_delete_other_feeds'))}
		<div class="feed_delete_link">
			<a href="#" class="btn btn-danger btn-xs" onclick="$.ajaxCall('feed.delete', 'id={$aFeed.feed_id}{if isset($aFeedCallback.module)}&amp;module={$aFeedCallback.module}&amp;item={$aFeedCallback.item_id}{/if}', 'GET'); return false;">
				<i class="icon-remove"></i> {phrase var='feed.delete_this_feed'}
			</a>
		</div>
	{/if}

	<span class="pull-left">
	{if !isset($aFeed.feed_mini)}		
		{if isset($aFeed.is_custom_app) && $aFeed.is_custom_app && ((isset($aFeed.view_id) && $aFeed.view_id == 7) || (isset($aFeed.gender) && $aFeed.gender < 1))}
			{img class='media-object' server_id=0 path='app.url_image' file=$aFeed.app_image_path suffix='_square' max_width=46 max_height=46}
		{else}
			{if isset($aFeed.user_name) && !empty($aFeed.user_name)}
				{img user=$aFeed suffix='_50_square' class='media-object' max_width=46 max_height=46}
			{else}
				{if !empty($aFeed.parent_user_name)}
					{img user=$aFeed suffix='_50_square' class='media-object' max_width=46 max_height=46 href=$aFeed.parent_user_name}
				{else}
					{img user=$aFeed suffix='_50_square' class='media-object' max_width=46 max_height=46 href=''}
				{/if}
			{/if}
		{/if}
	{/if}
  	</span>

  	<div class="media-body">
	{plugin call='feed.template_block_entry_1'}
	
	{template file='feed.block.content'}
	
	{plugin call='feed.template_block_entry_3'}	
	</div>

</div><!-- // #js_item_feed_{$aFeed.feed_id} -->
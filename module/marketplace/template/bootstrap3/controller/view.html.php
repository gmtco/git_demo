{if (Phpfox::getParam('marketplace.days_to_expire_listing') > 0) && ( $aListing.time_stamp < (PHPFOX_TIME - (Phpfox::getParam('marketplace.days_to_expire_listing') * 86400)) )}
	<div class="error_message">
		{phrase var='marketplace.listing_expired_and_not_available_main_section'}
	</div>
{/if}
{if $aListing.view_id == '1'}
<div class="message js_moderation_off">
	{phrase var='marketplace.listing_is_pending_approval'}
</div>
{/if}
{if ($aListing.user_id == Phpfox::getUserId() && Phpfox::getUserParam('marketplace.can_edit_own_listing')) || Phpfox::getUserParam('marketplace.can_edit_other_listing')
	|| ($aListing.user_id == Phpfox::getUserId() && Phpfox::getUserParam('marketplace.can_delete_own_listing')) || Phpfox::getUserParam('marketplace.can_delete_other_listings')
	|| (Phpfox::getUserParam('marketplace.can_feature_listings'))
}
<div>
	<div class="dropdown">
		{if (Phpfox::getUserParam('marketplace.can_approve_listings') && $aListing.view_id == '1')}
		<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">
			<i class="icon-spinner icon-spin"></i>
		</a>			
		<a href="#" class="btn btn-default btn-xs" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('marketplace.approve', 'inline=true&amp;listing_id={$aListing.listing_id}'); return false;">{phrase var='marketplace.approve'}</a>
		{/if}
		<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
			<i class="icon-cogs"></i> {phrase var='marketplace.actions'}
		</a>	
		<ul class="dropdown-menu">
			{template file='marketplace.block.menu'}
		</ul>			
	</div>
</div>
{/if}




<div class="item_view_content" itemprop="description">
	{$aListing.description|parse|shorten:250:'feed.view_more':true|split:55|max_line}
</div>



<div class="item_view">

	<div {if $aListing.view_id != 0}style="display:none;" class="js_moderation_on"{/if}>
		{module name='feed.comment'}
	</div>
</div>
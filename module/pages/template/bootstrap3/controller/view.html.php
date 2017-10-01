{if $aPage.view_id == '1'}
	<div class="message js_moderation_off" id="js_approve_message">
		{phrase var='pages.this_page_is_pending_an_admins_approval_before_it_can_be_displayed_publicly'}
	</div>
{/if}
{if !Phpfox::isMobile() && (Phpfox::getUserParam('pages.can_moderate_pages') || $aPage.is_admin)}

    <div class="dropdown">
		{if $aPage.view_id == '1' && Phpfox::getUserParam('pages.can_moderate_pages')}
			<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">
				<i class="icon-spinner icon-spin icon-2x"></i>
			</a>			
			<a href="#" class="btn btn-link" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('pages.approve', 'page_id={$aPage.page_id}'); return false;">
				{phrase var='pages.approve'}
			</a>
		{/if}

	 	<button type="button" class="pull-right btn-xs btn btn-default dropdown-toggle" data-toggle="dropdown">
	    <i class="icon-cogs"></i> {phrase var='pages.actions'}
	  	</button>
		
		<ul class="pull-right dropdown-menu">

			{template file='pages.block.link'}
		</ul>			
		<br>
	</div>
{/if}

{if $bCanViewPage}
	{if isset($aWidget)}
		<div class="item_view_content">
			{$aWidget.text|parse}
		</div>
	{elseif $sCurrentModule == 'info' && !$iViewCommentId}
		<div class="item_view_content">
			{$aPage.text|parse}
		</div>
	{elseif $sCurrentModule == 'pending'}
		{if count($aPendingUsers)}
			{foreach from=$aPendingUsers name=pendingusers item=aPendingUser}
				<div id="js_pages_user_entry_{$aPendingUser.signup_id}" class="row1{if $phpfox.iteration.pendingusers == 1} row_first{/if}">
					<div class="go_left" style="width:50px;">
						{img user=$aPendingUser suffix='_50_square' max_width='50' max_height='50'}
						<a href="#{$aPendingUser.signup_id}" class="moderate_link" rel="pages">{phrase var='pages.moderate'}</a>
					</div>
					<div style="margin-left:55px">
						<span class="row_title_link">{$aPendingUser|user|shorten:50:'...'}</span>
					</div>
					<div class="clear"></div>
				</div>
			{/foreach}
			{moderation}
		{else}
		{/if}
	{else}
		{if $bHasPermToViewPageFeed}
			
		{else}
			{phrase var='pages.unable_to_view_this_section_due_to_privacy_settings'}
		{/if}
	{/if}
{else}
	<div class="message">
		{if isset($aPage.is_invited) && $aPage.is_invited}	
			{phrase var='pages.you_have_been_invited_to_join_this_community'}	
		{else}
			{phrase var='pages.due_to_privacy_settings_this_page_is_not_visible'}
			{if $aPage.page_type == '1' && $aPage.reg_method == '2'}
				{phrase var='pages.this_page_is_also_invite_only'}
			{/if}
		{/if}
	</div>
{/if}
<div class="item_view">
	<div class="item_info">
		{phrase var='blog.by_user' full_name=$aItem|user:'':'':50:'':'author'}
	</div>
	
	{if $aItem.is_approved != 1}
	<div class="message js_moderation_off" id="js_approve_message">
		{phrase var='blog.this_blog_is_pending_an_admins_approval'}
	</div>
	{/if}	
	
	{if Phpfox::getUserParam('blog.can_approve_blogs')
		|| (Phpfox::getUserParam('blog.edit_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.edit_user_blog')
		|| (Phpfox::getUserParam('blog.delete_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.delete_user_blog')
	}	
	<div>
		{if $aItem.is_approved != 1 && Phpfox::getUserParam('blog.can_approve_blogs')}
			<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
			<a href="#" class="btn btn-xs btn-default" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('blog.approve', 'inline=true&amp;id={$aItem.blog_id}'); return false;">{phrase var='blog.approve'}</a>
		{/if}	

		<div class="dropdown">
			<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
				<i class="icon-cogs"></i> {phrase var='blog.actions'}
			</a>		
			<ul class="dropdown-menu">
				{template file='blog.block.link'}
			</ul>
		</div>			

	</div>	
	<hr class="invisible">
	{/if}
	
	{template file='blog.block.entry'}
	
	{plugin call='blog.template_controller_view_end'}
	<div {if $aItem.is_approved != 1}style="display:none;" class="js_moderation_on"{/if}>
		{module name='feed.comment'}
	</div>
</div>
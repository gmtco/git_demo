<div id="js_blog_entry{$aItem.blog_id}"{if !isset($bBlogView)} class="mac-browsing-blog moderation_row js_blog_parent {if is_int($phpfox.iteration.blog/2)}mac-row1{else}mac-row2{/if}{if $phpfox.iteration.blog == 1 && !PHPFOX_IS_AJAX} mac-row-first{/if}{if $aItem.is_approved != 1} mac-item-not-approved{/if}"{/if}>	
<div class="mac-element col-xs-12{if !isset($bBlogView)} col-sm-6 col-md-4 col-lg-3{/if}">
{item name='BlogPosting'}
			
	{if !isset($bBlogView)}

		{if Phpfox::getUserParam('blog.can_approve_blogs')
			|| (Phpfox::getUserParam('blog.edit_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.edit_user_blog')
			|| (Phpfox::getUserParam('blog.delete_own_blog') && Phpfox::getUserId() == $aItem.user_id) || Phpfox::getUserParam('blog.delete_user_blog')
		}	
		<div class="row_edit_bar_parent">
			<div class="row_edit_bar_holder">
				<ul>
					{template file='blog.block.link'}
				</ul>			
			</div>
			<div class="row_edit_bar">				
					<a href="#" class="row_edit_bar_action"><span>{phrase var='blog.actions'}</span></a>							
			</div>
		</div>
		{/if}

		{if Phpfox::getUserParam('blog.can_approve_blogs') || Phpfox::getUserParam('blog.delete_user_blog')}
		<a href="#{$aItem.blog_id}" class="moderate_link" rel="blog">Moderate</a>
		{/if}	

		{if $aItem.post_status == 2}
		{phrase var='blog.draft_info'}
		{/if}	

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title" id="js_blog_edit_title{$aItem.blog_id}" itemprop="name">
					<a href="{permalink module='blog' id=$aItem.blog_id title=$aItem.title}" id="js_blog_edit_inner_title{$aItem.blog_id}" class="link ajax_link" itemprop="url">
						{$aItem.title|clean|shorten:100:'...'}
					</a>
				</h3>
			</div>

			<div class="panel-body mac-html-preview">
				{$aItem.text|highlight:'search'|shorten:300:'...'}
			</div>

			<div class="panel-footer">
				{img user=$aItem suffix='_50_square' max_width=32 max_height=32 class='mac-round-pic'}&nbsp;
				{phrase var='blog.by_full_name' full_name=$aItem|user:'':'':50:'':'author'}
				{plugin call='blog.template_block_entry_date_end'}
			</div>
		</div>

	{else}

		<div class="blog_content">

			<div id="js_blog_edit_text{$aItem.blog_id}">

				<div class="item_content item_view_content" itemprop="articleBody">

					{$aItem.text|parse|highlight:'search'|split:55}
						
				</div>			
			</div>	
			
			{if $aItem.total_attachment}
			{module name='attachment.list' sType=blog iItemId=$aItem.blog_id}
			{/if}	

			{if isset($aItem.tag_list)}			
			{module name='tag.item' sType=$sTagType sTags=$aItem.tag_list iItemId=$aItem.blog_id iUserId=$aItem.user_id sMicroKeywords='keywords'}			
			{/if}
			
			{if !isset($bBlogView)}
				{module name='feed.comment' aFeed=$aItem.aFeed}
			{/if}
			
			{plugin call='blog.template_block_entry_text_end'}		

		</div>
	
		{plugin call='blog.template_block_entry_end'}

	{/if}

{/item}
</div>
</div>
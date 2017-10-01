{if !Phpfox::isModule('pinblog') || defined('PHPFOX_IS_PAGES_VIEW') || isset($aPage)}

	{if !count($aItems)}
	<div class="alert alert-info">
		{phrase var='blog.no_blogs_found'}
	</div>
	{else}

	{if Phpfox::getUserParam('blog.can_approve_blogs') || Phpfox::getUserParam('blog.delete_user_blog')}
	{moderation}
	<hr class="invisible">
	{/if}

	<div class="mac-isotope2-wrapper">

		<div id="mac-isotope2" class="row mac-blog-browse">

			{foreach from=$aItems name=blog item=aItem}
				
				{template file='blog.block.entry'}
				
			{/foreach}

		</div>

	</div>

	{unset var=$aItems}
	{pager}
	{/if}

{/if}
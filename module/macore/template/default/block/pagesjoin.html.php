{if !Phpfox::getUserBy('profile_page_id') && Phpfox::isUser()}
	{if isset($aPage) && $aPage.reg_method == '2' && !isset($aPage.is_invited) && $aPage.page_type == '1'}
	{else}
		{if isset($aPage) && isset($aPage.is_reg) && $aPage.is_reg}
		{else}
			
			{if isset($aPage) && !isset($aPage.is_liked) && $aPage.is_liked != true}
				{if !isset($aUser) || !isset($aUser.use_timeline)}<span id="pages_like_join_position"{if $aPage.is_liked} style="display:none;"{/if}> {/if}
					<a href="#" class="btn btn-primary btn-block" id="pages_like_join" {if isset($aUser) && isset($aUser.use_timeline) && $aUser.use_timeline}style=""{/if}onclick="$(this).parent().hide(); $('#js_add_pages_unlike').show(); {if $aPage.page_type == '1' && $aPage.reg_method == '1'} $.ajaxCall('pages.signup', 'page_id={$aPage.page_id}'); {else}$.ajaxCall('like.add', 'type_id=pages&amp;item_id={$aPage.page_id}');{/if} return false;">
						<i class="icon-thumbs-up"></i>
						{if $aPage.page_type == '1' }
							{phrase var='pages.join'}
						{else}
							{phrase var='pages.like'}
						{/if}
					</a>
				{if !isset($aUser) || !isset($aUser.use_timeline)}</span>{/if}
			{/if}
		{/if}
	{/if}
{/if}
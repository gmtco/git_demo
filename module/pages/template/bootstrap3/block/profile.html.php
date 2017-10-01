{foreach from=$aPagesList name=pages item=aPageDetails}
<div class="pages_profile_block"{if $phpfox.iteration.pages > 11} style="display:none;"{/if}>
	<a href="{$aPageDetails.url}" title="{$aPageDetails.title|clean}">
		{if $aPageDetails.is_app}
			{img server_id=0 path='app.url_image' file=$aPageDetails.aApp.image_path suffix='_200' max_width=75 max_height=75 force_max=true no_link=true}
		{else}		
			{if isset($aPageDetails.image_overwrite)}
				<img src="{$aPageDetails.image_overwrite}" width=75 height=75>
			{else}
				{img user=$aPageDetails suffix='_50_square' max_width=75 max_height=75 no_link=true is_page_image=true}
			{/if}
		{/if}
	</a>
	<div>		
		<a href="{$aPageDetails.url}" title="{$aPageDetails.title|clean}">{$aPageDetails.title|clean|shorten:20:'...'}</a>
	</div>
</div>
{/foreach}
<div class="clear"></div>
{if count($aPagesList) > 11}
<a href="#" class="btn btn-default btn-block" onclick="$('.pages_profile_block').show(); $(this).hide(); return false;">{phrase var='pages.more'}</a>
{/if}
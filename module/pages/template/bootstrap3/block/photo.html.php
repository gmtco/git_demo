<div class="profile_image">
    <div class="profile_image_holder">
		{if $aPage.is_app}
		{img server_id=0 path='app.url_image' file=$aPage.aApp.image_path suffix='_200_square' title=$aPage.aApp.app_title}
		{else}

{if Phpfox::getParam('core.keep_non_square_images')}
{img thickbox=true server_id=$aPage.image_server_id title=$aPage.title path='core.url_user' file=$aPage.image_path suffix='_200_square'}
{else}
{img thickbox=true server_id=$aPage.image_server_id title=$aPage.title path='core.url_user' file=$aPage.image_path suffix='_200_square'}
{/if}
		
		{/if}
	</div>
</div>

<div class="profile_no_timeline">

	{if isset($aPage.title)}
	{template file='pages.block.joinpage'}
	{/if}

</div>
{if $bCanViewPage}
<div class="mac_sub_section_menu">
	<ul class="list-group">		
		{foreach from=$aPageLinks item=aPageLink}
			<li class="list-group-item">
				<a href="{$aPageLink.url}" class="ajax_link">

			      {if strpos($aPageLink.icon, 'video')!==false}
			       <i class="icon-facetime-video"></i>
			       {elseif strpos($aPageLink.icon, 'comment')!==false}
			       <i class="icon-comments"></i>
			       {elseif strpos($aPageLink.icon, 'application_view_list')!==false}
			       <i class="icon-info-sign"></i>
			       {elseif strpos($aPageLink.icon, 'blog')!==false}
			       <i class="icon-edit"></i>
			       {elseif strpos($aPageLink.icon, 'event')!==false}
			       <i class="icon-calendar"></i>
			       {elseif strpos($aPageLink.icon, 'photo')!==false}
			       <i class="icon-camera"></i>
			       {elseif strpos($aPageLink.icon, 'music')!==false}
			       <i class="icon-music"></i>
			       {elseif strpos($aPageLink.icon, 'forum')!==false}
			       <i class="icon-bullhorn"></i>
			       {elseif strpos($aPageLink.icon, 'job')!==false}
			       <i class="icon-tags"></i>
			       {/if}
				  {$aPageLink.phrase}{if isset($aPageLink.total)}<span>({$aPageLink.total|number_format})</span>{/if}
				</a>				
				
				{if isset($aPageLink.sub_menu) && is_array($aPageLink.sub_menu) && count($aPageLink.sub_menu)}
				<ul>
				{foreach from=$aPageLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aPageLink.url}{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
				{/foreach}
				</ul>
				{/if}				
			</li>
		{/foreach}
	</ul>
    <div class="clear"></div>
</div>
{/if}
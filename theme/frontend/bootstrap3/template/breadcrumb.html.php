{if count($aBreadCrumbs)}
<div id="breadcrumb_holder"{if !$bIsUsersProfilePage && count($aSubMenus)} class="has_section_menu"{/if} itemscope itemtype="http://schema.org/WebPage">
	<div id="breadcrumb_content" itemprop="breadcrumb">
		{if empty($aBreadCrumbTitle)}
		{foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}
		{if $phpfox.iteration.link == 1}
		<div class="page-header">{if count($aBreadCrumbTitle)}<div class="h1">{else}<h1>{/if}{if !empty($sLink)}<a href="{$sLink}" class="ajax_link">{/if}{$sCrumb|clean}{if !empty($sLink)}</a>{/if}{if count($aBreadCrumbTitle)}</div>{else}</h1>{/if}</div>
		{/if}
		{/foreach}			
		{/if}
		{breadcrumb_list}
	</div>	
	 {breadcrumb_menu}	
</div>
{/if}
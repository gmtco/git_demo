{if count($aBreadCrumbs) > 1 || !empty($aBreadCrumbTitle)}
		{if $iBreadTotal = count($aBreadCrumbs)}{/if}
		
			<ul class="breadcrumb">
				{if Phpfox::isMobile()}
				<li>
					<a href="#" onclick="window.history.back(); return false;" class="mobile_back">{phrase var='core.back'}</a>
				</li>
				{else}
				<li>
					<a href="{url link=''}" class="home" title="{phrase var='core.home'}"><i class="icon-home"></i> {phrase var='core.home'}</a>
				</li>
				{/if}
				{foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}
				<li{if !empty($sLink)} class="active"{/if}>
					{if !empty($sLink)}<a href="{$sLink}" class="ajax_link{if $phpfox.iteration.link == '1'} first{/if}">{/if}{$sCrumb|clean}{if !empty($sLink)}</a>{/if}
				</li>
				{/foreach}
			</ul>
			
	
		{/if}
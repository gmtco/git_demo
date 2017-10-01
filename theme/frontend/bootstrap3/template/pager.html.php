<div class="js_pager_view_more_link">
	{if isset($iPagerNextPageCnt)}
	<div class="mac_pager_view_more_link">
		<a href="{$aPager.nextAjaxUrlPager}" class="mac-btn-next global_view_more{if isset($aPager.lastAjaxUrl)} no_ajax_link{/if}" {if isset($aPager.lastAjaxUrl)}onclick="$Core.addUrlPager(this); $.ajaxCall('blog.viewMore', 'page={$iPagerNextPageCnt}&amp;do=' + $Core.getRequests(this, true), 'GET'); return false;"{/if}>{phrase var='core.view_more'}</a>
	</div>
	{elseif isset($sAjax)}
	<div class="pager_view_more_holder">

		{if Phpfox::getLib('module')->getFullControllerName() == 'user.browse'}
		<div class="mac_pager_view_more_link">
			{if !empty($aPager.nextAjaxUrl)}		
			<a href="{if $atemp = Phpfox::getParam('core.url_static')}{/if}{$atemp}ajax.php?&core[ajax]=true&core[call]=macore.mainBrowse{$aPager.sParamsAjax}&page={$aPager.nextAjaxUrl}" class="mac-btn-next pager_next_link btn btn-default btn-block no_ajax_link" onclick="$.ajaxCall('{$sAjax}', 'page={$aPager.nextAjaxUrl}{$aPager.sParamsAjax}', 'GET'); return false;">
				{if !empty($aPager.icon)}		
				{img theme=$aPager.icon class='v_middle'}
				{/if}				
				{if !empty($aPager.phrase)}{$aPager.phrase}{else}{phrase var='core.view_more'}{/if}
				
				{*
				<span>{phrase var='core.displaying_of_total' displaying=$aPager.displaying total=$aPager.totalRows}</span>
				*}

			</a>
			{/if}
		</div>		
		{else}
		<div class="mac_pager_view_more_link">
			{if !empty($aPager.nextAjaxUrl)}		
			<a href="{$aPager.nextUrl}" class="mac-btn-next pager_next_link btn btn-default btn-block no_ajax_link" onclick="$.ajaxCall('{if $sAjax=='photo.browse'}macore.photoBrowse{else}{$sAjax}{/if}', 'page={$aPager.nextAjaxUrl}{$aPager.sParamsAjax}', 'GET'); return false;">
				{if !empty($aPager.icon)}		
				{img theme=$aPager.icon class='v_middle'}
				{/if}				
				{if !empty($aPager.phrase)}{$aPager.phrase}{else}{phrase var='core.view_more'}{/if}
			{*
			<span>{phrase var='core.displaying_of_total' displaying=$aPager.displaying total=$aPager.totalRows}</span>
			*}

			</a>
			{/if}
		</div>	
		{/if}

	</div>
	{else}
	{if isset($aPager) && $aPager.totalPages > 1}
	{if !defined('PHPFOX_PAGER_FORCE_COUNT')}
	<div class="pager_links_holder">
		<div class="pager_links mac_pager_view_more_link">
			<a class="btn btn-default pager_previous_link{if !isset($aPager.prevUrl)} pager_previous_link_not{/if}" {if !isset($aPager.prevUrl)} href="#" onclick="return false;" {else}{if $sAjax}href="{$aPager.prevUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.prevAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;"{else}href="{$aPager.prevUrl}"{/if}{/if}>{phrase var='core.previous'}</a>
			<a class="btn btn-default mac-btn-next pager_next_link{if !isset($aPager.nextUrl)} pager_next_link_not{/if}" {if !isset($aPager.nextUrl)} href="#" onclick="return false;" {else}{if $sAjax}href="{$aPager.nextUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.nextAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;" href="{$aPager.nextUrl}"{else}href="{$aPager.nextUrl}"{/if}{/if}>{phrase var='core.next'}</a>				
			<div class="clear"></div>
		</div>
		<span class="extra_info">{phrase var='core.fromrow_torow_of_totalrows_results' fromRow=$aPager.fromRow|number_format toRow=$aPager.toRow|number_format totalRows=$aPager.totalRows|number_format}</span>
	</div>
	{else}
	<div class="pager_outer">
			<ul class="pager">
	{if !isset($bIsMiniPager)}
				<li class="pager_total">{phrase var='core.page_x_of_x' current=$aPager.current total=$aPager.totalPages}</li>
	{/if}
	{if isset($aPager.firstUrl)}
		<li class="first">
			<a {if $sAjax}href="{$aPager.firstUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.firstAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;"{else}href="{$aPager.firstUrl}"{/if}>
				{phrase var='core.first'}
			</a>
		</li>
	{/if}
	{if isset($aPager.prevUrl)}
		<li>
			<a {if $sAjax}href="{$aPager.prevUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.prevAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;"{else}href="{$aPager.prevUrl}"{/if}>
				{phrase var='core.previous'}
			</a>
		</li>
	{/if}
	{foreach from=$aPager.urls key=sLink name=pager item=sPage}
		<li {if !isset($aPager.firstUrl) && $phpfox.iteration.pager == 1} class="first"{/if}>
			<a {if $sAjax}href="{$sLink}" onclick="{if $sLink}$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$sPage}{$aPager.sParams}'); $Core.addUrlPager(this);{/if} return false;{else}href="{if $sLink}{$sLink}{else}javascript:void(0);{/if}{/if}"{if $aPager.current == $sPage} class="active"{/if}>
				{$sPage}
			</a>
		</li>
	{/foreach}
	{if isset($aPager.nextUrl)}
		<li class="mac_pager_view_more_link">
			<a class="mac-btn-next pager_next_link" {if $sAjax}href="{$aPager.nextUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.nextAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;"{else}href="{$aPager.nextUrl}"{/if}>
				{phrase var='core.next'}
			</a>
		</li>
	{/if}
				{if isset($aPager.lastUrl)}<li><a {if $sAjax}href="{$aPager.lastUrl}" onclick="$(this).parent().parent().parent().parent().find('.sJsPagerDisplayCount').html($.ajaxProcess('{phrase var='core.loading'}')); $.ajaxCall('{$sAjax}', 'page={$aPager.lastAjaxUrl}{$aPager.sParams}'); $Core.addUrlPager(this); return false;"{else}href="{$aPager.lastUrl}"{/if}>{phrase var='core.last'}</a></li>{/if}
			</ul>	
			<div class="clear"></div>		
	</div>
	{/if}
	{/if}
	{/if}
</div>
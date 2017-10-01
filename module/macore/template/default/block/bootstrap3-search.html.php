<?php
/*

bootstrapped by

 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');

?>
{if !defined('PHPFOX_IS_FORCED_404') && !empty($aSearchTool) && is_array($aSearchTool)}

<div class="{if Phpfox::isMobile()}mac-navbar-search-mobile {else}mac-navbar-search {/if}navbar navbar-default">
  <div class="mac-filters-container">
  	<div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-search">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
    </div>
    <div class="navbar-collapse collapse mac-navbar-search-filters navbar-collapse-search">
		{if isset($aSearchTool.filters) && count($aSearchTool.filters)}

		<ul class="nav navbar-nav">

			{foreach from=$aSearchTool.filters key=sSearchFilterName item=aSearchFilters}
				{if !isset($aSearchFilters.is_input)}
				<li class="dropdown hidden-xs hidden-sm">
					<a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
					<i class="icon-{$aSearchFilters.param}"></i> {if isset($aSearchFilters.active_phrase)}{$aSearchFilters.active_phrase}{else}{$aSearchFilters.default_phrase}{/if}
					</a>
					<ul class="dropdown-menu">
					{foreach from=$aSearchFilters.data item=aSearchFilter}
						<li>
							<a href="{$aSearchFilter.link}" class="ajax_link {if isset($aSearchFilter.is_active)}active{/if}"{if isset($aSearchFilters.width)} style="width:{$aSearchFilters.width};"{/if} {if isset($aSearchFilter.nofollow)}rel="nofollow"{/if}>
								{$aSearchFilter.phrase}
							</a>
						</li>
					{/foreach}
					</ul>
				</li>

				{/if}

			{/foreach}


			{if isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus)}
			<li class="dropdown">
				<a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
					<i class="icon-filter"></i> {phrase var='macore.filter'}
				</a>
				<ul class="dropdown-menu">
				{foreach from=$aFilterMenus name=filtermenu item=aFilterMenu}
					{if isset($aFilterMenu.name)}
					<li{if $aFilterMenu.active} class="active"{/if}>
						{if !$aFilterMenu.active} 
						<a href="{$aFilterMenu.link}" class="mac-ajaxify">{$aFilterMenu.name}</a>
						{else}
						<a class="active">{$aFilterMenu.name}</a>
						{/if}
					</li>
					{/if}
				{/foreach}
				</ul>
			</li>
			{/if}


			<li class="dropdown visible-sm visible-xs">

			<a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
				<i class="icon-gears"></i> {phrase var='macore.sort'}
			</a>
			<ul class="dropdown-menu">
			{foreach from=$aSearchTool.filters key=sSearchFilterName item=aSearchFilters}
				{if !isset($aSearchFilters.is_input)}
					{foreach from=$aSearchFilters.data item=aSearchFilter}
						<li>
							<a href="{$aSearchFilter.link}" class="ajax_link {if isset($aSearchFilter.is_active)}active{/if}"{if isset($aSearchFilters.width)} style="width:{$aSearchFilters.width};"{/if} {if isset($aSearchFilter.nofollow)}rel="nofollow"{/if}>
								{$aSearchFilter.phrase}
							</a>
						</li>
					{/foreach}
				{/if}
			{/foreach}
			</ul>

			</li>

			{if Phpfox::isModule('input') && isset($bHasInputs) && $bHasInputs == true}
			<li>
				<a href="#" onclick="$('#js_search_input_holder').show(); return false;" class="no_ajax_link header_bar_advanced_filters">
					{phrase var='input.advanced_filters'}
				</a>
			</li>
			{/if}

			{template file="macore.block.categories"}
		</ul>
		{/if}

    	{if isset($aSearchTool.search)}
		<form id="mac-search-filter-input-form" class="navbar-left navbar-form" method="post" action="{$aSearchTool.search.action|clean}" onbeforesubmit="$Core.Search.checkDefaultValue(this,\'{$aSearchTool.search.default_value}\');">
			
			<div>
				<input type="hidden" name="search[submit]" value="1" />
			</div>

			<div class="input-group">
			  <input id="mac-search-filters-input" name="search[{$aSearchTool.search.name}]" value="{if isset($aSearchTool.search.actual_value)}{$aSearchTool.search.actual_value|clean}{else}{/if}" class="form-control col-lg-8" type="text" placeholder="{$aSearchTool.search.default_value}">
			  <span class="input-group-addon"><i class="icon-search"></i></span>
			</div>

			<div id="js_search_input_holder">
				<div id="js_search_input_content">
					{if isset($sModuleForInput)}
						{module name='input.add' module=$sModuleForInput bAjaxSearch=true}
					{/if}
				</div>
			</div>

		</form>
		{/if}

			{if Phpfox::getParam('macore.bootstrap_disable_switch_view')}
			<div class="dropdown mac-infsc-controls navbar-right" style="display:none;overflow:visible!important">
				<a href="#" class="no_ajax_link dropdown-toggle btn btn-default navbar-btn" data-toggle="dropdown">
					<i class="icon-gears"></i> {phrase var='macore.options'}
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="javascript:void(0);" id="js-make-4col">
							<i class="icon-undo"></i> {phrase var='macore.default_view'}
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="js-make-1col">
							<i class="icon-align-justify"></i> {phrase var='macore.switch_to_one_column'}
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="js-make-2col">
							<i class="icon-th-large"></i> {phrase var='macore.switch_to_two_column'}
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" id="js-make-3col">
							<i class="icon-th"></i> {phrase var='macore.switch_to_three_column'}
						</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="javascript:void(0);" class="mac-infsc-pause">
							<i class="icon-pause"></i> {phrase var='macore.pause_auto_scrolling'}
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="mac-infsc-resume">
							<i class="icon-play"></i> {phrase var='macore.restart_auto_scrolling'}
						</a>
					</li>
				</ul>
			</div>
			{/if}

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->

{/if}


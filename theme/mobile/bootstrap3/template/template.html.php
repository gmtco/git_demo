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
?>{template file="macore.block.bootstrap3-vars"}{if !PHPFOX_IS_AJAX_PAGE}<!DOCTYPE html>
<html dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    {header}
    <script>
	var macBodyPageClassName = '{$sMacBodyClass}';
	</script>
  </head>
  <body class="mac-bp-v8 page-header-type-{$sMacHeaderType} mac-new-mobile mac-theme-{$sMacActiveTheme} mac-feed-{$sMacFeedLinkClass} page-is-mobile {if $bMacFeedLinkVisible}mac-feed-link-visible{/if} mac-cover-{if $sMacCoverType}fixed{else}fluid{/if} {if $bMacEnableTour}mac-enabled-tour {/if}mac-theme-{$sMacActiveTheme} {if $bMacIsBootPin}mac-is-bootpin{/if} {$sMacBodyClass} page-no-mobile page-{if $bMacFullWidth}fullgrid{else}no-fullgrid{/if} page-{if $sMacBootNavbarInverse}navbar-inverse{else}navbar-no-inverse{/if} page-{$sMacBootNavbarPos} page-{if $bUseFullSite}fullwidth{else}no-full-width{/if} page-{if isset($bMacLoadLeftBlock)}left{else}no-left{/if} page-{if isset($bMacLoadRightBlock)}right{else}no-right{/if}{if Phpfox::getParam('core.site_wide_ajax_browsing')} page-ajax-browse{else} page-no-ajax-browse{/if} page-{if !Phpfox::getParam('macore.mac_bootstrap_submenu_off')}hide-smenu{else}show-smenu{/if} page-{if Phpfox::getService('profile')->timeline()}timeline{else}no-timeline{/if} page-{if (defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES'))}is-profile{else}no-profile{/if}{if Phpfox::getParam('macore.mac_enable_mediaelement')} mac-enable-mediaelement{/if} {if defined('PHPFOX_IS_PAGES_VIEW')}page-is-page-profile{/if} {if defined('PHPFOX_IS_USER_PROFILE')}page-is-user-profile{/if}" id="{$sMacBodyClass}">	
  	
  	<div id="wrap">
  	{plugin call='theme_template_body__start'}	
   	
	<div id="mac-main-topbar" class="navbar navbar-mobile {if $sMacBootNavbarInverse}navbar-inverse{else}navbar-default{/if} navbar-fixed-top mac-boot-megamenu mac-notify-menu" role="navigation">
		<ul id="mac-right-menu" class="nav navbar-nav pull-left">
			<li>
			<a id="menu-trigger" href="javascript:void(0)">
				<i class="icon-align-justify"></i>
			</a>
			</li>
			{if Phpfox::getUserId()}{notification}{/if}
		</ul>
		{logo}
	</div>    


    {block location='9'}
	{module name='profile.logo'}	
	{if isset($aUser) && 
	(
	(defined('PHPFOX_IS_USER_PROFILE') && (empty($aUser.cover_photo))) || 
	(defined('PHPFOX_IS_PAGES_VIEW') && empty($aUser.cover_photo_id))
	)
	}		
	<div class="cover_photo_link" style="background-position:center center;background-image: url('{img theme='covers/default-cover.png' return_url=true}');">
	<h1>&nbsp;</h1>
	</div>
	<br>
	{/if}


    {template file="macore.block.bootstrap3-tpl-mainmenu-mobile"}

	<div class="container" id="mac_main_container">

    <div class="row" id="mac_inner_container">

{else}
<div class="body-ajax page-is-mobile page-{if $bMacFullWidth}fullgrid{else}no-fullgrid{/if} page-{if $bUseFullSite}fullwidth{else}no-full-width{/if} page-{if isset($bMacLoadLeftBlock)}left{else}no-left{/if} page-{if isset($bMacLoadRightBlock)}right{else}no-right{/if} page-ajax-browse{if $bMacLoadMediaElement} mac-enable-mediaelement{/if}">
{/if}

	<div {holder_name}>		
		<div {is_page_view}>
			<div id="content_holder"{if isset($sMicroPropType)} itemscope itemtype="http://schema.org/{$sMicroPropType}"{/if}>		
				{block location='13'}
				{block location='7'}				
				{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
				{breadcrumb}
				{block location='12'}
				{/if}
				{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle) && !defined('PHPFOX_IS_PAGES_VIEW')}
				<div class="page-header">
				  <h1{if isset($sMicroPropType)} itemprop="name"{/if} class="mac_main_page_title">
				  	<a href="{$aBreadCrumbTitle[1]}"{if isset($sMicroPropType)} itemprop="url"{/if}>{$aBreadCrumbTitle[0]|clean|split:30}</a>
				  </h1>
				</div>
				{/if}
				{template file="macore.block.bootstrap3-tpl-maincontent-mobile"}
				{template file="macore.block.bootstrap3-tpl-left"}
				{template file="macore.block.bootstrap3-tpl-right"}
			</div><!-- end #content_holder -->		
			{block location='8'}
		</div><!-- end is_page_view -->								
	</div><!-- end holder_name -->	
	<div class="clear"></div>
{if !PHPFOX_IS_AJAX_PAGE}	
	</div> <!-- end inner container -->
    </div> <!-- end main container -->


	</div><!-- end #wrap -->

    {template file="macore.block.bootstrap3-footer"}
    {footer}

    {if false}
    <div id="mac-mobile-ad">
		{module name='macore.mobilead'}
    </div>
    {/if}

  </body>
</html>
{else}
</div>
{/if}
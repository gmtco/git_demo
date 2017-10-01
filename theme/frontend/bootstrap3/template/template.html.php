{template file="macore.block.bootstrap3-vars"}{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" dir="{$sLocaleDirection}" lang="{$sLocaleCode}"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" dir="{$sLocaleDirection}" lang="{$sLocaleCode}"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" dir="{$sLocaleDirection}" lang="{$sLocaleCode}"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" dir="{$sLocaleDirection}" lang="{$sLocaleCode}"> <!--<![endif]-->
  <head>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    {header}
    {$sMacHeader}
  </head>
  <body class="mac-bp-v8 page-header-type-{$sMacHeaderType} mac-feed-{$sMacFeedLinkClass} {if $bMacFeedLinkVisible}mac-feed-link-visible{/if} mac-cover-{if $sMacCoverType}fixed{else}fluid{/if} {if $bMacEnableTour}mac-enabled-tour {/if}mac-theme-{$sMacActiveTheme} {if $bMacIsBootPin}mac-is-bootpin{/if} {$sMacBodyClass} page-no-mobile page-{if $bMacFullWidth}fullgrid{else}no-fullgrid{/if} page-{if $sMacBootNavbarInverse}navbar-inverse{else}navbar-no-inverse{/if} page-{$sMacBootNavbarPos} page-{if $bUseFullSite}fullwidth{else}no-full-width{/if} page-{if isset($bMacLoadLeftBlock)}left{else}no-left{/if} page-{if isset($bMacLoadRightBlock)}right{else}no-right{/if}{if Phpfox::getParam('core.site_wide_ajax_browsing')} page-ajax-browse{else} page-no-ajax-browse{/if} page-{if !Phpfox::getParam('macore.mac_bootstrap_submenu_off')}hide-smenu{else}show-smenu{/if} page-{if Phpfox::getService('profile')->timeline()}timeline{else}no-timeline{/if} page-{if (defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES'))}is-profile{else}no-profile{/if}{if Phpfox::getParam('macore.mac_enable_mediaelement')} mac-enable-mediaelement{/if} {if defined('PHPFOX_IS_PAGES_VIEW')}page-is-page-profile{/if} {if defined('PHPFOX_IS_USER_PROFILE')}page-is-user-profile{/if}" id="{$sMacBodyClass}">
	
	<div id="wrap">

	{body}

	{if $bMacUseMegaMenu}
    {template file="macore.block.bootstrap3-megamenu"}
    {else}
	    {if $sMacHeaderType == 'style1'}
	    {template file="macore.block.bootstrap3-tpl-mainmenu"}
	    {elseif $sMacHeaderType == 'style2'}
	    {template file="macore.block.bootstrap3-tpl-mainmenu2"}
	    {/if}
    {/if}
    
    {block location='9'}

    {if !$bMacEnableBackstretch || (defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::isModule('pages'))}
	{module name='profile.logo'}	
	{else}
	{module name='macore.covers'}	
	{/if}

	{if  
	(defined('PHPFOX_IS_USER_PROFILE') && isset($aUser) && (empty($aUser.cover_photo))) || 
	(defined('PHPFOX_IS_PAGES_VIEW') && !isset($aCoverPhoto))
	}	
	<div class="cover_photo_link" style="background-position:center center;background-image: url('{img theme='covers/default-cover.png' return_url=true}');">
	<h1>&nbsp;</h1>
	{if !Phpfox::getService('profile')->timeline()}<div class="mac-cover-pic-info"></div>{/if}
	</div>
	<br>
	{/if}

	{if $sMacBodyClass == 'page-core-index-visitor'}
	{template file="macore.block.bootstrap3-landing"}
	{/if}
	
    <div class="mac-container" id="mac_main_container">
	<div class="mac-row" id="main_content_holder">
{else}
<div class="body-ajax page-no-mobile page-{if $bMacFullWidth}fullgrid{else}no-fullgrid{/if} page-{if $bUseFullSite}fullwidth{else}no-full-width{/if} page-{if isset($bMacLoadLeftBlock)}left{else}no-left{/if} page-{if isset($bMacLoadRightBlock)}right{else}no-right{/if} page-ajax-browse{if Phpfox::getParam('macore.mac_enable_mediaelement')} mac-enable-mediaelement{/if}">
{/if}

	<div {holder_name}>		
		<div {is_page_view}>	
			
			<div class="container" id="content_holder"{if isset($sMicroPropType)} itemscope itemtype="http://schema.org/{$sMicroPropType}"{/if}>		
				
				{block location='13'}
				{block location='7'}				
				{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
				{breadcrumb}
				{block location='12'}
				{/if}
				{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle)}
				<div class="page-header">
				  <h1{if isset($sMicroPropType)} itemprop="name"{/if} class="mac_main_page_title">
				  	<a rel="prettySociable" href="{$aBreadCrumbTitle[1]}"{if isset($sMicroPropType)} itemprop="url"{/if}>{$aBreadCrumbTitle[0]|clean|split:30}</a>
				  </h1>
				</div>
				{/if}
				<div class="row">
					{template file="macore.block.bootstrap3-tpl-maincontent"}
					{template file="macore.block.bootstrap3-tpl-left"}
					{template file="macore.block.bootstrap3-tpl-right"}
				</div>

			</div><!-- end #content_holder -->		
			
			{block location='8'}
		</div><!-- end is_page_view -->								
	</div><!-- end holder_name -->	
	<div class="clear"></div>
{if !PHPFOX_IS_AJAX_PAGE}
	</div> <!-- end inner container -->
    </div> <!-- end main container -->

    <hr class="clear invisible">

	</div><!-- end #wrap -->

    {template file="macore.block.bootstrap3-footer"}

    {footer}

    <a class="mac-go-top-2 btn btn-default hide" href="javascript:void(0);" onclick="$Core.macCore.scrollTop();return false;">Go to top</a>
  	<span id="mac-ajax-spinner"><i class="icon-spinner icon-spin icon-4x"></i></span>

  </body>
</html>
{else}
</div><!-- close .body-ajax -->
{/if}
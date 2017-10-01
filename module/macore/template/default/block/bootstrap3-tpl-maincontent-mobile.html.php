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
{if isset($bMacLoadRightBlock) && isset($bMacLoadLeftBlock)}
<div id="mac-content" class="col-md-push-2 col-xs-12 col-sm-12 col-md-7 col-lg-7 col-main-{$sMacBodyClass}">
{elseif isset($bMacLoadRightBlock)}
<div id="mac-content" class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-main-{$sMacBodyClass}">
{elseif isset($bMacLoadLeftBlock)}
<div id="mac-content" class="col-xs-12 col-sm-8 col-md-9 col-lg-10 col-sm-push-4 col-md-push-3 col-lg-push-2 col-main-{$sMacBodyClass}">
{else}
<div id="mac-content" class="col-xs-12 col-main-{$sMacBodyClass}">
{/if}
{if !defined('PHPFOX_IS_USER_PROFILE') && !defined('PHPFOX_IS_PAGES_VIEW')}
{template file='macore.block.bootstrap3-search'}
{/if}

{if defined('PHPFOX_IS_USER_PROFILE') || defined('PHPFOX_IS_PAGES_VIEW') || (isset($aPage) && isset($aPage.use_timeline) && $aPage.use_timeline)}
{if $bLoadedProfileHeader = true}{/if}
{module name='profile.header'}
{/if}

{error}
{block location='2'}
{content}
{block location='4'}
</div>
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
{if Phpfox::getUserId()}
<a {if !$aPin.ITEMFAVORITES} style="display:none" {/if} id="pin_remove_favorites_{$aPin.feed_id}" 
title="{phrase var='macore.remove_favorites'}" href="javascript:;" 
class="btn btn-default btn-xs mac-tooltip no_ajax_link"
data-placement="bottom"
onclick="$.ajaxCall('pinfavorites.removeFavorites', 'feed_id={$aPin.feed_id}');$(this).hide();$('#pin_add_favorites_{$aPin.feed_id}').show();">
<i class="icon-remove"></i> <span>{phrase var='macore.remove_favorites'}</span>
</a> 
<a {if $aPin.ITEMFAVORITES} style="display:none" {/if} id="pin_add_favorites_{$aPin.feed_id}" 
title="{phrase var='macore.add_favorites'}" href="javascript:;" 
class="btn btn-default btn-xs mac-tooltip no_ajax_link"
data-placement="bottom"
onclick="$.ajaxCall('pinfavorites.addFavorites', 'feed_id={$aPin.feed_id}');$(this).hide();$('#pin_remove_favorites_{$aPin.feed_id}').show();">
<i class="icon-plus"></i> <span>{phrase var='macore.add_favorites'}</span>
</a> 
{/if}
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
{if isset($bMacLoadRightBlock) && $bMacLoadRightBlock == 1}
<div class="clearfix visible-xs"></div>{if isset($bMacLoadLeftBlock) && $bMacLoadLeftBlock == 1}<div id="mac-right" class="animated fadeInRight col-xs-12 col-sm-12 col-md-3 col-lg-3 col-1-{$sMacBodyClass}">{else}<div id="mac-right" class="animated fadeInRight col-xs-12 col-sm-9 col-md-3 col-lg-3 col-1-{$sMacBodyClass}">{/if}{if Phpfox::getLib('module')->getFullControllerName() == 'core.index-member' && !Phpfox::getParam('macore.mac_bootstrap_userpic_position_left')}{template file="macore.block.bootstrap3-userpic"}{/if}{block location='3'}</div>
{/if}
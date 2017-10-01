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

if(!isset($this->_aVars['sMacBodyClass']) || empty($this->_aVars['sMacBodyClass'])):
	$this->_aVars['sMacBodyClass'] = 'page-'.str_replace('.', '-', Phpfox::getLib('module')->getFullControllerName());
endif;
?>
{assign var='bMacFullWidth' value=1}{if !$bUseFullSite && (count($aBlocks1) || count($aAdBlocks1)) || (!Phpfox::getParam('macore.mac_bootstrap_submenu_off') && isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus))}{assign var='bMacLoadLeftBlock' value=1}{assign var='bMacFullWidth' value=0}{/if}{if !$bUseFullSite && (count($aBlocks3) || count($aAdBlocks3))}{assign var='bMacLoadRightBlock' value=1}{assign var='bMacFullWidth' value=0}{/if}
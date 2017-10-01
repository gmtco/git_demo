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
<div id="mac-landing-wrapper"{if Phpfox::getParam('macore.bootstrap_landing_type') == 'mac'} class="mac-landing-type-mac"{/if}>
{if Phpfox::getParam('macore.bootstrap_landing_type') == 'mac'}
{template file='macore.block.bootstrap3-landing-mac'}
{elseif Phpfox::getParam('macore.bootstrap_landing_type') == 'classic'}
{template file='macore.block.bootstrap3-landing-classic'}
{elseif Phpfox::getParam('macore.bootstrap_landing_type') == 'registration'}
{template file='macore.block.bootstrap3-landing-registration'}
{elseif Phpfox::getParam('macore.bootstrap_landing_type') == 'custom'}
{template file='macore.block.bootstrap3-landing-custom'}
{/if}
</div>
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
{if isset($aLoggedInUsers) && count($aLoggedInUsers)}

	<div class="block_listing_inline">
		<ul>
			{foreach from=$aLoggedInUsers name=loggedusers item=aLoggedInUser}
			<li>
				<a href="{url link=$aLoggedInUser.user_name}" class="mac-tooltip" data-placement="right" title="{$aLoggedInUser.full_name}">
					<img src="{img user=$aLoggedInUser suffix='_120_square' max_width=80 max_height=80 return_url=true}">
				</a>
			</li>
			{/foreach}
		</ul>
		<div class="clear"></div>
	</div>

{/if}
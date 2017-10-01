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
<div id="footer">
	<div class="container">
		<div id="mac_footer_nav">
			<p class='text-muted credit'>
				{menu_footer} 
				<span class="pull-right"><a href="javascript:void(0)" onclick="$.scrollTo(0,1000);return false;" style="text-decoration:none" data-placement="left" data-original-title="Scroll to top" class="mac-tooltip"><i class="icon-arrow-top icon-large"></i></a></span>
				<br>
				{copyright}
			</p>
		</div>		
		<div class="clear"></div>
    	{block location='5'}
	</div>
</div>
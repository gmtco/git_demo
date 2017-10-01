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

<li>
<a title="{phrase var='pin.view_all_post_of_this_user'}" href="{url link='pin' user=$aPin.user_name}">
<i class="icon-user"></i> {phrase var='pin.view_all_post_of_this_user'}
</a> 
</li> 

<li>
<a href="{$aPin.ITEMBOOKMARK}" target="_blank" title="{phrase var='pin.open_in_a_new_window'}">
<i class="icon-external-link"></i> {phrase var='pin.open_in_a_new_window'}
</a>
</li>
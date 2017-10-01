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
<h4 class="mac-social-connect-heading">{phrase var='macore.sign_in_using'}</h4>
<div class="col-lg-12 mac-mrg-tp mac-mrg-btm mac-social-connect">

<div class="btn-group btn-group-justified">
<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Facebook" data-placement="bottom" href="{url link='auth' provider='Facebook'}" id="provider_Facebook" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/facebook.png" alt="Facebook" /> Facebook
</a>
<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Google" data-placement="bottom" href="{url link='auth' provider='Google'}" id="provider_Google" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/google.png" alt="Google" /> Google
</a>
<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Twitter" data-placement="bottom" href="{url link='auth' provider='Twitter'}" id="provider_Twitter" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/twitter.png" alt="Twitter" /> Twitter
</a>
</div>
<!--&nbsp;and others: &nbsp;
<a href="#" 
onclick="tb_show('Social Connect', $.ajaxBox('auth.getLinks', 'height=400&width=350&title=quicklogin'));
return false;">
{phrase var='auth.quick_login'}
</a>-->
</div>
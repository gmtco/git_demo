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
<div id="mac-main-topbar" class="navbar{if Phpfox::isMobile()} navbar-mobile{/if} {if $sMacBootNavbarInverse}navbar-inverse{else}navbar-default{/if} {$sMacBootNavbarPos} mac-boot-megamenu mac-notify-menu" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <p class="navbar-text">{logo}</p>
    </div>
    <div class="navbar-collapse collapse mac-navbar-main navbar-collapse-top">
    {if Phpfox::getUserId()}
    <ul id="mac-main-menu" class="nav navbar-nav">
       {notification}
    </ul>
    <ul id="mac-right-menu" class="nav navbar-nav navbar-right">
    </ul>
    {else}  
    <a class="mac-ajaxify btn-user-register btn btn-danger navbar-btn pull-right" href="{url link='user.register'}" rel="tooltip" data-original-title="{phrase var='macore.first_time_join_us_you_are_welcome_to_our_community'}" data-placement="bottom">{phrase var='macore.sign_up_and_icon'}</a>
    <a class="mac-ajaxify btn-user-login btn btn-default navbar-btn pull-right" href="{url link='user.login'}" rel="tooltip" data-original-title="{phrase var='macore.already_our_member_connect_with_your_account'}" data-placement="bottom">{phrase var='macore.sign_in_and_icon'}</a>
    {/if}
    </div>
  </div>
</div>

<div class="well" role="navigation" id="side-menu">
<ul class="nav nav-list">
  {foreach from=$aMacMobileMenu key=iKey item=aMenu name=menu}
    <li>
      <a href="{$aMenu.link}" class="ajax_link mac-ajaxify">
      {$aMenu.phrase}
      </a>
    </li>
  {/foreach}

  {if Phpfox::getUserId()}
    <li>
      <a href="{url link='profile.my'}" class="ajax_link mac-ajaxify">
      {phrase var='profile.menu_my_profile'}
      </a>
    </li>
    <li>
      <a href="{url link='friend'}" class="ajax_link mac-ajaxify">
      {phrase var='friend.my_friends'}
      </a>
    </li>
    <li>
      <a href="{url link='friend'}" class="ajax_link mac-ajaxify">
      {phrase var='mail.see_all_messages'}
      </a>
    </li>
    <li>
      <a href="{url link='notification'}" class="ajax_link mac-ajaxify">
      {phrase var='notification.see_all_notifications'}
      </a>
    </li>
    <li>
      <a href="{url link='user.logout'}" class="ajax_link mac-ajaxify">
      {phrase var='mobile.logout'}
      </a>
    </li>
  {else}
    <li>
      <a href="{url link='user.login'}" class="ajax_link mac-ajaxify">
      {phrase var='macore.sign_in_using'} <i class="icon-signin"></i> 
      </a>
    </li>
    <li>
      <a href="{url link='user.register'}" class="ajax_link mac-ajaxify">
      {phrase var='user.sign_up'} <i class="icon-share-alt"></i>
      </a>
    </li>
  {/if}
</ul>
</div>



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

<div id="mac-main-topbar" class="navbar-masthead mac-megamenu navbar{if Phpfox::isMobile()} navbar-mobile{/if} {if $sMacBootNavbarInverse}navbar-inverse{else}navbar-default{/if} {$sMacBootNavbarPos} mac-boot-megamenu mac-notify-menu" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-top">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      {logo}
    </div>
    <div class="navbar-collapse collapse mac-navbar-main navbar-collapse-top">

      {if Phpfox::getParam('user.hide_main_menu') && !Phpfox::isUser()}

      {else}
      <ul id="mac-main-menu" class="nav navbar-nav">
	  
	  
	  
	  
          {plugin call='core.template_block_template_menu_1'}
          {if Phpfox::getUserBy('profile_page_id') <= 0}
            {plugin call='theme_template_core_menu_list'} 
            <li class="dropdown mac-megamenu-fullwidth">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
              <i class="icon-align-justify"></i> Navigation 
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="mac-megamenu-content">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-2">
                          <ul class="mac-tab-ajax nav-pills nav nav-stacked">
                            <li class="active">
                              <a href="#allmedia" data-macajax-type="" data-macajax-filter="" data-toggle="tab">
                                <i class="icon-time"></i> Quick Menu</a>
                            </li>
                            <li>
                              <a href="#photo" data-macajax-type="photo" data-macajax-filter="latestsharedphoto" data-toggle="tab">
                                <i class="icon-camera"></i> Photos
                              </a>
                            </li>
                            <li>
                              <a href="#video" data-macajax-type="video" data-macajax-filter="latestsharedvideo" data-toggle="tab">
                                <i class="icon-facetime-video"></i> Videos
                              </a>
                            </li>
                            <li>
                              <a href="#blog" data-macajax-type="blog" data-macajax-filter="latestsharedblog" data-toggle="tab">
                                <i class="icon-comments"></i> Blogs
                              </a>
                            </li>
                            <li>
                              <a href="#pages" data-macajax-type="pages" data-macajax-filter="latestsharedpages" data-toggle="tab">
                                <i class="icon-star"></i> Pages
                              </a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-xs-10">
                          <div class="tab-content">
                            <div class="tab-pane active" id="allmedia">
                              {template file='macore.block.bootstrap3-mm-dashboard'}
                            </div>
                            <div class="tab-pane" id="photo"></div>
                            <div class="tab-pane" id="video"></div>
                            <div class="tab-pane" id="blog"></div>
                            <div class="tab-pane" id="pages"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>  
            </li>
			

        <li id="mac-form-top-search">
          <div id="header_sub_menu_search">
          <form id='header_search_form' class="navbar-form" method="post" action="{url link='search'}" role="search">
            <div class="input-group">
            <input id="header_sub_menu_search_input" name="q" value="" class="form-control col-lg-8" type="search" placeholder="{phrase var='core.search_dot'}" autocomplete="off">
            <span class="input-group-addon"><i class="icon-search"></i></span>
            </div>
            <div id="header_sub_menu_search_input"></div>
          </form>
          </div>
        </li>

			
			
          {/if}   
      </ul>
      {/if}

      {if Phpfox::getUserId()}
      <ul id="mac-right-menu" class="nav navbar-nav navbar-right">

        {if Phpfox::isAdmin() && !Phpfox::isMobile()}
        <li>
          <a class="no_ajax_link" href="{url link='admincp'}" target="_blank" data-placement="bottom" data-toggle="tooltip" data-original-title="Go to admincp" rel="tooltip">
            <i class="icon-external-link"></i>
          </a>
        </li>
        {/if}        
        {notification}
        {if Phpfox::getUserBy('profile_page_id') > 0}             
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {phrase var='pages.account'}
          </a>

          <ul class="dropdown-menu">
            <li class="header_menu_user_link">
              <div id="header_menu_user_image">
                {img user=$aGlobalUser suffix='_50_square' max_width=50 max_height=50}
              </div>
              <div id="header_menu_user_profile">
                {$aGlobalUser|user:'':10:20}
              </div>
            </li>   
            <li class="header_menu_user_link_page">
              <a href="#" onclick="$.ajaxCall('pages.logBackIn'); return false;">
                <div class="page_profile_image">
                  {img user=$aGlobalProfilePageLogin suffix='_50_square' max_width=32 max_height=32 no_link=true}
                </div>
                <div class="page_profile_user">
                  {phrase var='core.log_back_in_as_global_full_name' global_full_name=$aGlobalProfilePageLogin.full_name|clean}                           
                </div>
              </a>
            </li>
            <li><a href="{url link='pages.add' id=$iGlobalProfilePageId}">{phrase var='core.edit_page'}</a></li>
          </ul>
        </li>                   
        {else}   


        {if Phpfox::getParam('macore.mac_bootstrap_enable_theme_switcher')}
        {template file="macore.block.bootstrap3-theme-switcher"}
        {/if}
        

                       
        {foreach from=$aRightMenus key=iKey item=aMenu}
          {if $aMenu.url == 'user.setting'}
            <li{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)} class="dropdown"{if Phpfox::isUser() && $aMenu.url == 'user.setting'} id="mac-user-setting-top-menu"{/if}{/if}>
              <a href="{url link=$aMenu.url}"{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)} class="dropdown-toggle no_ajax_link{if $aMenu.url == 'user.setting'} mac-tooltip{/if}"{if $aMenu.url == 'user.setting'} data-original-title="{phrase var='macore.manage_your_account'}" data-placement="bottom"{/if} data-toggle="dropdown"{/if}>
              {if $aMenu.url == 'user.setting'} <span>{phrase var='core.hello'} {$aGlobalUser.user_name}&nbsp;</span><img id="mac-header-userpic" alt="" src="{img user=$aGlobalUser suffix='_50_square' return_url=true}" style="width:32px;height:32px"> {else} {phrase var=$aMenu.module'.'$aMenu.var_name}{if isset($aMenu.suffix)}{$aMenu.suffix}{/if}{if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)}{/if}   {/if}
              </a>          
              {if isset($aMenu.children) && count($aMenu.children) && is_array($aMenu.children)}
              <ul class="dropdown-menu">
                {if Phpfox::isUser() && $aMenu.url == 'user.setting'}
                  {if Phpfox::isModule('pages') && Phpfox::getUserParam('pages.can_add_new_pages')}
                  <li>
                    <a class="mac-btn-login-as-page btn btn-default btn-xs no_ajax_link" href="#" onclick="$Core.box('pages.login', 400); return false;">
                      {phrase var='core.login_as_page'}
                    </a>
                  </li>
                  {/if}
                {/if}
                {foreach from=$aMenu.children item=aChild name=child_menu}
                <li{if $phpfox.iteration.child_menu == 1} class="first"{/if}><a {if $aChild.url == 'pages.login'}id="js_login_as_page"{/if} href="{url link=$aChild.url}"{if $aChild.url == 'profile.designer' || $aChild.url == 'pages.login'} class="no_ajax_link"{/if}>{phrase var=$aChild.module'.'$aChild.var_name}</a></li>
                {/foreach}
                {if Phpfox::getUserBy('fb_user_id') && Phpfox::isUser() && $aMenu.url == 'user.setting'}
                  <li><a href="{url link='facebook.unlink'}"><i class="icon-facebook"></i> {phrase var='facebook.unlink_facebook_account'}</a>
                {/if}                       
              </ul>
              {/if}
            </li>
          {/if}
        {/foreach}                 
        {unset var=$aRightMenus var1=$aMenu}
        {/if}

      </ul>
      {else}
       

      <ul class="nav navbar-nav nav-right">

        {if Phpfox::getParam('macore.mac_bootstrap_enable_theme_switcher')}
        {template file="macore.block.bootstrap3-theme-switcher"}
        {/if}

      </ul>

      {if $sMacBodyClass != 'page-core-index-visitor' && $sMacBodyClass != 'page-user-register'}
      <a class="mac-ajaxify btn-user-register btn btn-primary navbar-btn pull-right" href="{url link='user.register'}" rel="tooltip" data-original-title="{phrase var='macore.first_time_join_us_you_are_welcome_to_our_community'}" data-placement="bottom">
        {phrase var='macore.sign_up_and_icon'}
      </a>
      {/if}

      {if $sMacBodyClass != 'page-user-login'}

        {if Phpfox::getParam('macore.show_login_form_into_modal')}
        <a data-toggle="modal" data-target="#loginFormModal" class="mac-ajaxify btn-user-login btn btn-default navbar-btn pull-right" href="javascript:;" rel="tooltip" data-original-title="{phrase var='macore.already_our_member_connect_with_your_account'}" data-placement="bottom">
          {phrase var='macore.sign_in_and_icon'}
        </a>
        <div class="modal fade" id="loginFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
              </div>
              <div class="modal-body">
                {module name='macore.maclogin'}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        {else}
        <a class="mac-ajaxify btn-user-login btn btn-default navbar-btn pull-right" href="{url link='user.login'}" rel="tooltip" data-original-title="{phrase var='macore.already_our_member_connect_with_your_account'}" data-placement="bottom">{phrase var='macore.sign_in_and_icon'}</a>
        {/if}

      {/if}

      {/if}
    </div><!--/.nav-collapse -->
  </div>
</div>
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

    <!-- Sidebar -->
    <aside id="sidemenu-container">
      <div id="sidemenu">
        {if Phpfox::getUserId()}
        <div id="author-profile">
          <div class="author-profile-photo">
            {img user=$aGlobalUser suffix='_120_square' max_width='60' max_height='60'}
          </div>
          <div class="author-profile-content">
            <p class="title">{$aGlobalUser.full_name}</p>
            <p class="subtitle">@{$aGlobalUser.user_name}</p>
          </div>
        </div>
        {/if}

        {if Phpfox::isUser()}
        <div id="mac_mobile_search">
          <div id="mac_header_search">  
            <div id="mac_header_menu_space" class="row">
              <div id="mac_header_sub_menu_search" class="col-xs-10 col-xs-push-1">
                <form method="post" id='mac_header_search_form' action="{url link='search'}">  

                  <div class="input-group">

                    <input placeholder="{phrase var='core.mobile_search'}" class="form-control" type="text" name="q" value="" id="mac_header_sub_menu_search_input" autocomplete="off"/>                     
              
                    <span class="input-group-btn">
                      <button onclick='$("#mac_header_search_form").submit(); return false;' class="btn btn-default" type="button"><i class="icon-search"></i></button>
                    </span>

                  </div><!-- /input-group -->

                </form>
              </div>
            </div><!-- // header_menu_space -->
          </div>  
        </div>      
        {/if}

        <nav id="nav-container">
          <ul class="mac-mobile-nav">
            <li><a href="{url link=''}" class="mac-mobile-menu-link"><i class="icon-home"></i> Home</a></li>
            {if Phpfox::getUserId()}
            <li><a href="{url link='core.index-member'}" class="mac-mobile-menu-link"><i class="icon-home"></i> News Feed</a></li>
            <li>
              <a href="{url link='profile.my'}" class="mac-mobile-menu-link"><i class="icon-user"></i> My Profile</a>
            </li>
            <li>
              <a href="{url link='mail'}" class="mac-mobile-menu-link"><i class="icon-envelope"></i> Private Message</a>
            </li>
            <li>
              <a href="{url link='friend'}" class="mac-mobile-menu-link"><i class="icon-heart"></i> My Friends</a>
            </li>
            {else}
            <li>
              <a href="{url link='feed'}" class="mac-mobile-menu-link"><i class="icon-comments"></i> What's up inside</a>
            </li>
            {/if}

            <li>
              <a href="{url link='user.browse'}" class="mac-mobile-menu-link"><i class="icon-group"></i> Members</a>
            </li>

            {if Phpfox::isModule('photo')}
            <li>
              <a href="{url link='photo'}" class="nav-with-ul"><i class="icon-camera"></i> Photo</a>
              <span class="nav-child-container"><span class="nav-child-trigger"><i class="icon-plus"></i></span></span>
              <ul style="height: 0;">
                <li><a href="{url link='photo'}"><i class="icon-chevron-right"></i> All Photos</a></li>
                {if Phpfox::getUserId()}
                <li><a href="{url link='photo' view='my'}"><i class="icon-chevron-right"></i> My Photos</a></li>
                <li><a href="{url link='photo' view='friend'}"><i class="icon-chevron-right"></i> Friends Photos</a></li>
                {/if}
              </ul>
            </li>
            {/if}
            {if Phpfox::isModule('video')}
            <li><a href="{url link='video'}" class="nav-with-ul"><i class="icon-facetime-video"></i> Video</a>
              <span class="nav-child-container"><span class="nav-child-trigger"><i class="icon-plus"></i></span></span>
              <ul style="height: 0;">
                <li><a href="{url link='video'}"><i class="icon-chevron-right"></i> All Videos</a></li>
                {if Phpfox::getUserId()}
                <li><a href="{url link='video' view='my'}"><i class="icon-chevron-right"></i> My Videos</a></li>
                <li><a href="{url link='video' view='friend'}"><i class="icon-chevron-right"></i> Friends Videos</a></li>
                {/if}
              </ul>
            </li>
            {/if}
            {if Phpfox::isModule('blog')}
            <li>
              <a href="{url link='blog'}" class="nav-with-ul"><i class="icon-comment"></i> Blog</a>
              <span class="nav-child-container"><span class="nav-child-trigger"><i class="icon-plus"></i></span></span>
              <ul style="height: 0;">
                <li><a href="{url link='blog'}"><i class="icon-chevron-right"></i> All Blogs</a></li>
                {if Phpfox::getUserId()}
                <li><a href="{url link='blog' view='my'}"><i class="icon-chevron-right"></i> My Blogs</a></li>
                <li><a href="{url link='blog' view='friend'}"><i class="icon-chevron-right"></i> Friends Blogs</a></li>
                {/if}
              </ul>
            </li>
            {/if}

            {if Phpfox::isModule('pages')}
            <li>
              <a href="{url link='pages'}" class="mac-mobile-menu-link"><i class="icon-star"></i> Pages</a>
            </li>
            {/if}

            {if Phpfox::isModule('marketplace')}
            <li>
              <a href="{url link='marketplace'}" class="mac-mobile-menu-link"><i class="icon-shopping-cart"></i> Marketplace</a>
            </li>
            {/if}
            {if Phpfox::isModule('quiz')}
            <li>
              <a href="{url link='quiz'}" class="mac-mobile-menu-link"><i class="icon-question"></i> Quiz</a>
            </li>
            {/if}
            {if Phpfox::isModule('poll')}
            <li>
              <a href="{url link='poll'}" class="mac-mobile-menu-link"><i class="icon-tasks"></i> Poll</a>
            </li>
            {/if}

            {if Phpfox::getUserId()}
            <li>
              <a href="{url link='user.logout'}" class="btn btn-default btn-block"><i class="icon-signout"></i> Logout</a>
            </li>
            {else}
            <li>
              <a href="{url link='user.login'}" class="btn btn-primary btn-block"><i class="icon-signin"></i> Sign In</a>
            </li>
            <li>
              <a href="{url link='user.register'}" class="btn btn-primary btn-block"><i class="icon-share"></i> Sign Up</a>
            </li>
            {/if}
          </ul>
        </nav>
      </div>
    </aside>
    <!-- =Sidebar -->
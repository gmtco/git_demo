<?php 

/*
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  

 Pin Addon by Macagoraga.com
 File: search-pin.html.php
 Last update: 16.07.2013
 Version: 2.2
*/
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if true || !Phpfox::isMobile()}


<div id="mac_filter_pin_wrap" class="{if Phpfox::isMobile()}mac-navbar-search-mobile {else}mac-navbar-search {/if}navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-search">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse mac-navbar-search-filters navbar-collapse-search">
 
    <ul class="nav navbar-nav">


      <li class="dropdown">
        <a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
          <i class="icon-star"></i> {if empty($sMedia)}{phrase var='pin.allmedia'}{else}{phrase var='pin.'.$sMedia}{/if}
        </a>
        <ul class="dropdown-menu">
          {if !empty($sMedia)}
          <li>
            <a href="{url link='pin' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-star"></i> {phrase var='pin.allmedia'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinphoto') && $sMedia != 'photo' && (strpos(Phpfox::getParam('pin.media_types'), 'photo')!==false)}
          <li>
            <a href="{url link='pin' media='photo' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-camera"></i> {phrase var='pin.photo'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinvideo') && $sMedia != 'video' && (strpos(Phpfox::getParam('pin.media_types'), 'video')!==false)}
          <li>
            <a href="{url link='pin' media='video' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-facetime-video"></i> {phrase var='pin.video'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinblog') && $sMedia != 'blog' && (strpos(Phpfox::getParam('pin.media_types'), 'blog')!==false)}
          <li>
            <a href="{url link='pin' media='blog' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-comments"></i> {phrase var='pin.blog'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinquiz') && $sMedia != 'quiz' && (strpos(Phpfox::getParam('pin.media_types'), 'quiz')!==false)}
          <li>
            <a href="{url link='pin' media='quiz' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-question"></i> {phrase var='pin.quiz'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinpoll') && $sMedia != 'poll' && (strpos(Phpfox::getParam('pin.media_types'), 'poll')!==false)}
          <li>
            <a href="{url link='pin' media='poll' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-tasks"></i> {phrase var='pin.poll'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinmusic') && $sMedia != 'music_song' && (strpos(Phpfox::getParam('pin.media_types'), 'music_song')!==false)}
          <li>
            <a href="{url link='pin' media='music_song' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-music"></i> {phrase var='pin.music'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinforum') && $sMedia != 'forum' && (strpos(Phpfox::getParam('pin.media_types'), 'forum')!==false)}
          <li>
            <a href="{url link='pin' media='forum' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-bullhorn"></i> {phrase var='pin.forum'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinmarketplace') && $sMedia != 'marketplace' && (strpos(Phpfox::getParam('pin.media_types'), 'marketplace')!==false)}
          <li>
            <a href="{url link='pin' media='marketplace' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-shopping-cart"></i> {phrase var='pin.marketplace'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinevent') && $sMedia != 'event' && (strpos(Phpfox::getParam('pin.media_types'), 'event')!==false)}
          <li>
            <a href="{url link='pin' media='event' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-calendar"></i> {phrase var='pin.event'}
            </a>
          </li>
          {/if}
          {if Phpfox::isModule('pinstatus') && $sMedia != 'user_status' && (strpos(Phpfox::getParam('pin.media_types'), 'user_status')!==false)}
          <li>
            <a href="{url link='pin' media='user_status' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-comment"></i> {phrase var='pin.status'}
            </a>
          </li>
          {/if}
          
          {if Phpfox::isModule('pinlink') && $sMedia != 'link' && (strpos(Phpfox::getParam('pin.media_types'), 'link')!==false)}
          <li>
            <a href="{url link='pin' media='link' sort=$sSort when=$sWhen user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-link"></i> {phrase var='pin.link'}
            </a>
          </li>
          {/if}
   
        </ul>
      </li>


      {if $sMedia == 'photo' or $sMedia == 'video' or $sMedia == 'blog' or $sMedia == 'marketplace' or $sMedia == 'music_song' or $sMedia == 'event' or $sMedia == 'board'} 
      <li class="dropdown">
        <a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
           <i class="icon-align-justify"></i> {phrase var='pin.'.$sMedia} {if $sMedia == 'music'}{phrase var='pin.genres'}{else}{phrase var='pin.categories'}{/if}
        </a>
        <ul class="dropdown-menu">
          <li>        
            <a href="{url link='pin' media=$sMedia sort=$sSort when=$sWhen category='' user=$sUser follow=$sFollow favorites=$favorites}">
            {phrase var='macore.all_categories'}
            </a>           
          </li>
          {foreach from=$aCategories name=category item=aCategory}
            <li>
              <a href="{url link='pin' media=$sMedia sort=$sSort when=$sWhen category=$aCategory.category_id user=$sUser follow=$sFollow favorites=$favorites}">
              {$aCategory.name|convert|clean}
              </a>
            </li>
            {/foreach}
        </ul>
      </li>
      {/if}



      <li class="dropdown">
        <a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
          <i class="icon-th"></i> {if empty($sSort)}{phrase var='pin.latest'}{else}{phrase var='pin.'.$sSort}{/if}
        </a>
        <ul class="dropdown-menu">
          {if $sSort != 'latest' && $sSort != ''}
          <li>                                      
            <a href="{url link='pin' media=$sMedia sort='latest' when=$sWhen category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-star-empty"></i> {phrase var='pin.latest'}
            </a>                                  
          </li>
          {/if}
          {if $sSort != 'mostviewed'}
          <li>
            <a href="{url link='pin' media=$sMedia sort='mostviewed' when=$sWhen category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-eye"></i> {phrase var='pin.mostviewed'}
            </a>                                  
          </li>
          {/if}
          {if $sSort != 'mostcommented'}
          <li>
            <a href="{url link='pin' media=$sMedia sort='mostcommented' when=$sWhen category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-comments"></i> {phrase var='pin.mostcommented'}
            </a>                                  
          </li>
          {/if}
          {if $sSort != 'mostliked'}
          <li>
            <a href="{url link='pin' media=$sMedia sort='mostliked' when=$sWhen category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-thumbs-up"></i> {phrase var='pin.mostliked'}
            </a>                                  
          </li>
          {/if}
          {if $sSort != 'random'}
          <li>
            <a href="{url link='pin' media=$sMedia sort='random' when=$sWhen category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-random"></i> {phrase var='pin.random'}
            </a>                                  
          </li>
          {/if}
        </ul>
      </li>


      <li class="dropdown">
        <a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">
          <i class="icon-clock-o"></i> {if empty($sWhen)}{phrase var='pin.alltime'}{else}{phrase var='pin.'.$sWhen}{/if}
        </a>
        <ul class="dropdown-menu">
          {if $sWhen != 'alltime' && $sWhen != ''}
          <li>
            <a href="{url link='pin' media=$sMedia sort=$sSort when='alltime' category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-clock-o"></i> {phrase var='pin.alltime'}
            </a>                                  
          </li>
          {/if}
          {if $sWhen != 'thismonth'}
          <li>
            <a href="{url link='pin' media=$sMedia sort=$sSort when='thismonth' category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-clock-o"></i> {phrase var='pin.thismonth'}
            </a>                                  
          </li>
          {/if}
          {if $sWhen != 'thisweek'}
          <li>
            <a href="{url link='pin' media=$sMedia sort=$sSort when='thisweek' category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-clock-o"></i> {phrase var='pin.thisweek'}
            </a>                                  
          </li>
          {/if}
          {if $sWhen != 'today'}
          <li>
            <a href="{url link='pin' media=$sMedia sort=$sSort when='today' category=$sCategory user=$sUser follow=$sFollow favorites=$favorites}">
              <i class="icon-clock-o"></i> {phrase var='pin.today'}
            </a>                                  
          </li>
          {/if}
        </ul>
      </li>

      {if Phpfox::isModule('pinfollow')} 
        {if Phpfox::getUserId()}
        <li>
          <a class="mac_filter_link" href="{url link='pin' media=$sMedia sort=$sSort when=$sWhen category=$sCategory follow='my' favorites=$favorites}">
            <i class="icon-group"></i> {phrase var='pin.my_follow'}
          </a>
        </li>
        {/if}
      {/if}

      {if Phpfox::getUserId()}
      <li>
        <a class="mac_filter_link" href="{url link='pin' media=$sMedia sort=$sSort when=$sWhen category=$sCategory user=$aGlobalUser.user_name favorites=$favorites}">
          <i class="icon-user"></i> {phrase var='pin.my_post'}
        </a> 
      </li>
      {/if}

      {if Phpfox::getUserId() && Phpfox::isModule('pinfavorites')}
      <li>
        <a class="mac_filter_link" href="{url link='pin' favorites=1 media=$sMedia sort=$sSort when=$sWhen category=$sCategory user=$sUser}">
          <i class="icon-heart"></i> Favorites
        </a>
      </li>
      {/if}


    {if Phpfox::getUserId()}
  
      {if !empty($sMedia) && $sMedia != 'allmedia' && $sMedia != 'user_status' && $sMedia != 'link' && $sMedia != 'forum'}
      <li>
        <a class="mac_filter_link" href="{url link='pin.share' media=$sMedia}?iframe=true&width=800&height=500" rel="prettyPhoto[share]">
          <i class="icon-share"></i> {phrase var='pin.share'} {phrase var='pin.'.$sMedia}
        </a>
      </li>
     {else}
     <li class="dropdown">

        <a href="#" class="no_ajax_link dropdown-toggle" data-toggle="dropdown">{phrase var='pin.share'} </a>
        <ul class="dropdown-menu">
          {if Phpfox::isModule('pinphoto')}
          <li>
            <a href="{url link='pin.share' media='photo'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-camera"></i> {phrase var='pin.photo'}
            </a>                                  
          </li>
         {/if}
         {if Phpfox::isModule('pinvideo')} 
          <li>
            <a href="{url link='pin.share' media='video' type='url'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-facetime-video"></i> {phrase var='pin.video'}
            </a>                                  
          </li>
         {/if}
         {if Phpfox::isModule('pinblog')} 
          <li>
            <a href="{url link='pin.share' media='blog'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-comments"></i> {phrase var='pin.blog'}
            </a>                                  
          </li>
          {/if}
         {if Phpfox::isModule('pinquiz')} 
          <li>
            <a href="{url link='pin.share' media='quiz'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-question"></i> {phrase var='pin.quiz'}
            </a>                                  
          </li>
          {/if}
         {if Phpfox::isModule('pinpoll')} 
          <li>
            <a href="{url link='pin.share' media='poll'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-tasks"></i> {phrase var='pin.poll'}
            </a>                                  
          </li>
          {/if}
         {if Phpfox::isModule('pinmusic')} 
          <li>
            <a href="{url link='pin.share' media='music'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-music"></i> {phrase var='pin.music'}
            </a>                                  
          </li>
          {/if}
         {if Phpfox::isModule('pinmarketplace')} 
          <li>
            <a href="{url link='pin.share' media='marketplace'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-shopping-cart"></i> {phrase var='pin.marketplace'}
            </a>                                  
          </li>
          {/if}
         {if Phpfox::isModule('pinevent')} 
          <li>
            <a href="{url link='pin.share' media='event'}?iframe=true&width=800&height=500" rel="prettyPhoto[share]" title="{phrase var='pin.share'}">
              <i class="icon-calendar"></i> {phrase var='pin.event'}
            </a>                                  
          </li>
          {/if}
        </ul>
      </li>  
      {/if}
    {/if}


     </ul>
 

<a class="mac-go-top btn btn-default navbar-btn navbar-right" href="javascript:void(0);" onclick="$Core.macCore.scrollTop();return false;">Go to top</a>

    <form class="mac-bootpin-search-form animated fadeInDown navbar-left navbar-form" action="{$sFormActionUrl}" method="post">
      <div class="input-group">
        <input value="{if empty($sSearch)}{else}{$sSearch}{/if}" name="search"  class="form-control col-lg-8" type="search" placeholder="{phrase var='core.start_search'}">
        <span class="input-group-addon"><i class="icon-search"></i></span>
      </div>
    </form>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->

<hr class="invisible">

{/if}
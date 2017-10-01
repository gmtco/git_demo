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
{if isset($aPages)}
<div class="panel panel-default" id="mac_dashboard_pages_block">
  <div class="panel-heading">
   <h3 class="panel-title">{phrase var='macore.last_pages'}</h3>
  </div>
  <div class="panel-body">
      {foreach from=$aPages name=pages item=aPage}
        <div class="media">
          <a href="{$aPage.link}" title="{$aPage.title}" class="pull-left">
          {img server_id=$aPage.image_server_id title=$aPage.title path='pages.url_image' file=$aPage.image_path suffix='_50_square' height='50' width='50' class='js_hover_title'}
          </a>
          <div class="media-body">    
            <h4 class="media-heading">{$aPage.title}</h4>
            <p>
            {$aPage.typeid|convert} 
            {if !empty($aPage.typeid) && !empty($aPage.categoryid)}/{/if}
            {$aPage.categoryid|convert}
            </p>
          </div>
        </div>
      {/foreach}
  </div>
  <div class="panel-footer">
    <a href="{url link='pages'}">{phrase var='pages.all_pages'}</a>
  </div>
</div>
{/if}
{if isset($aVideos)}
<div class="panel panel-default" id="mac_dashboard_video_block">
  <div class="panel-heading">
   <h3 class="panel-title">{phrase var='video.rss_title_5'}</h3>
  </div>
  <div class="panel-body">
      {foreach from=$aVideos item=aMiniVideo}  
        <div class="media">
          <a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.item_title}" class="pull-left">
          {img server_id=$aMiniVideo.image_server_id path='video.url_image' file=$aMiniVideo.image_path suffix='_120' width=50 height=50 class='mac_user_round_pic_big js_mp_fix_width' title=$aMiniVideo.item_title}
          </a>

          <div class="media-body">    
            <h4 class="media-heading">
              <a href="{permalink module='video' id=$aMiniVideo.video_id title=$aMiniVideo.item_title}" class="row_sub_link">
              {$aMiniVideo.item_title|clean|shorten:55:'...'}
              </a>
            </h4>
            {phrase var='video.by_lowercase'} {$aMiniVideo|user}
            <br />
            {if $aMiniVideo.total_view == 0}1 {phrase var='video.view'}{else}{$aMiniVideo.total_view|number_format} {phrase var='video.views'}{/if}
          </div>
        </div>
      {/foreach}
  </div>
  <div class="panel-footer">
     <a href="{url link='video'}">{phrase var='video.all_videos'}</a>
  </div>
</div>
{/if}

{if isset($aBlogs)}
<div class="panel panel-default" id="mac_dashboard_blog_block">
  <div class="panel-heading">
   <h3 class="panel-title">{phrase var='blog.rss_title_1'}</h3>
  </div>
  <div class="panel-body">
      {foreach from=$aBlogs name=popblog item=aBlog}
        <div class="media">
          <a href="#" class="pull-left">
          <img src="{img user=$aBlog max_width=50 max_height=50 suffix='_50_square' return_url=true}" alt="" class='v_middle mac_user_round_pic_big js_hover_title' />
          </a>

          <div class="media-body">    
            <h4 class="media-heading">
              <a href="{permalink module='blog' id=$aBlog.blog_id title=$aBlog.item_title}" title="{phrase var='newsletter.read_more'} &raquo;">
              <strong class="js_hover_title">{$aBlog.item_title|clean|shorten:50:'...'}</strong>
              </a>
            </h4>
            {$aBlog.item_posted_on}
            <br>
            {$aBlog.item_content|strip_tags|shorten:100:'...'} 
            <br>
            <a href="{permalink module='blog' id=$aBlog.blog_id title=$aBlog.item_title}">{phrase var='newsletter.read_more'} &raquo;</a>
           </div>
        </div>
      {/foreach}
  </div>
  <div class="panel-footer">
     <a href="{url link='blog'}">{phrase var='blog.all_blogs'}</a>
  </div>
</div>
{/if}
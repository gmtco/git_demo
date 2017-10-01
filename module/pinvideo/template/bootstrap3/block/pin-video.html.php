<div class="box-image box-video">

    <img class="img-responsive" src="{img 
    server_id=$aPin.ITEMSERVERID 
    path='video.url_image' 
    file=$aPin.ITEMDESTINATION 
    suffix='_120'
    return_url=true}">

      <div class="thumbnail-caption">
        <div class="aligment">
          <div class="aligment">
            <a data-placement="bottom" href={if isset($aPin.ITEMYOUTUBEURL)}"//www.youtube.com/watch?v={$aPin.ITEMYOUTUBEURL}" rel="prettyPhoto[video]" {else}"{$aPin.ITEMBOOKMARK}" onclick="$Core.box('video.play', 700, 'id={$aPin.ITEMID}&popup=true', 'GET'); return false;"{/if} 
              class="play_link no_ajax_link mac-tooltip" 
              title="{phrase var='macore.watch_this_video'}">
              <div class="hover-iframe"></div>
            </a>
            <a data-placement="bottom" data-original-title="{phrase var='pin.open_in_a_new_window'}" rel="tooltip" target="_blank" href="{$aPin.ITEMBOOKMARK}"><div class="hover-url"></div></a>
          </div>
        </div>  
      </div>

    <div class="lightbox-text">
      <span>{phrase var='macore.by'} {$aPin.full_name}</span>
    </div>

</div>


<div class="box-caption">
  <div class="box-title">{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}</div>

  <div class="media">
    <a class="pull-left" href="#">
      <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
    </a>
    <div class="media-body">
      <h4 class="media-heading">        
      <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.video'}
      <span class="mac-post-time">
        {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
      </span>
      </h4>
      <!--{$aPin.ITEMDESCRIPTION|feed_strip|shorten:100:'feed.view_more':true|split:55}-->

    </div>
  </div>
   
    <div class="box-caption-bottom clearfix">

        <div class="mac-favorites-link">

            
            {if Phpfox::getParam('pin.use_prettyphoto') != 'dont_use_lightbox'}
            <a href={if isset($aPin.ITEMYOUTUBEURL)}"//www.youtube.com/watch?v={$aPin.ITEMYOUTUBEURL}" rel="prettyPhoto[video]" {else}"{$aPin.ITEMBOOKMARK}" onclick="$Core.box('video.play', 700, 'id={$aPin.ITEMID}&popup=true', 'GET'); return false;"{/if}
            title="Watch this video"
            class="btn play_link btn-xs no_ajax_link btn-default mac-tooltip"
            data-placement="bottom">
            <i class="icon-fullscreen"></i> <span>Play</span>
            </a>
            {/if}

            {template file='macore.block.bootpin-favoriteslink'}

          <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="icon-reorder"></i> <span>{phrase var='macore.mac_more_link'}</span>
          </a>
            <ul class="dropdown-menu" role="menu">
              {template file='macore.block.bootpin-box-link1'}

              {template file='macore.block.bootpin-reportlink'}

              {if ($aPin.user_id == Phpfox::getUserId() && Phpfox::getUserParam('video.can_edit_own_video')) || Phpfox::getUserParam('video.can_edit_other_video')}
              <li>
              <a title="{phrase var='video.edit'}" href="{url link='video.edit' id=$aPin.ITEMID}">
              <i class="icon-edit"></i> {phrase var='video.edit_this_video_menu'}
              </a>
              </li>
              {/if}

              {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
              <li>
              <a title="{phrase var='core.delete'}" href="{url link='video' delete=$aPin.ITEMID}" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=video&feedid={$aPin.feed_id}');return false;">
              <i class="icon-remove"></i> {phrase var='core.delete'}
              </a>
              </li>
              {/if}
            </ul>

        </div>
    </div> 

</div>

<div class="clear"></div>
<div class="pin_comments js_parent_feed_entry">
{module 
name='pin.comments' 
feedType='video'   
feedCommentItemId=$aPin.ITEMID 
feedUserId=$aPin.user_id 
feedUrl=$aPin.ITEMBOOKMARK 
feedTitle=$aPin.ITEMTITLE 
feedTotalComment=$aPin.ITEMTOTALCOMMENT 
feedTotalLike=$aPin.ITEMTOTALLIKE 
feedPrivacy=$aPin.ITEMPRIVACY 
feedCommentPrivacy=$aPin.ITEMPRIVACYCOMMENT
feedId = $aPin.feed_id
feedComment = $aPin.comments
}
</div>
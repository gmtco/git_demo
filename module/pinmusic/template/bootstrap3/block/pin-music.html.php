<div class="box-image">
    <a class="no_ajax_link btn btn-link btn-lg text-center" href="#" title="{phrase var='pin.play_this_song'}" onclick="$('#js_music_player_{$aPin.ITEMID}').show();$.ajaxCall('macore.playInFeed', 'id={$aPin.ITEMID}', 'GET'); $(this).hide(); $('audio').show();return false;">
      <i class="icon-play icon-4x"></i> {phrase var='pin.play_this_song'}
    </a>
    <div id="js_controller_music_play_{$aPin.ITEMID}" class="mac-mrg-tp"></div>
    <div class="lightbox-text"><span>{phrase var='macore.by'} {$aPin.full_name}</span></div>
</div>
<div class="box-caption">
    <div class="box-title">{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}</div>
    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
      </a>
      <div class="media-body">
        <h4 class="media-heading">        
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.'.$aPin.ITEMTYPENAME}
        <span class="mac-post-time">{phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}</span>
        </h4>
        <br/>
        {$aPin.ITEMDESCRIPTION|feed_strip|shorten:50:'feed.view_more':true|split:55}

      </div>
    </div>

    {if Phpfox::getUserId()}  
    <div class="box-caption-bottom clearfix">
        <div class="mac-favorites-link">
          {template file='macore.block.bootpin-favoriteslink'}

          <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="icon-reorder"></i> <span>{phrase var='macore.mac_more_link'}</span>
          </a>
          <ul class="dropdown-menu" role="menu">
            {template file='macore.block.bootpin-box-link1'}
            {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
            <li>
              <a title="{phrase var='music.delete'}" href="{url link='music' delete=$aPin.ITEMID}" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=music&feedid={$aPin.feed_id}');return false;">
                <i class="icon-remove"></i> {phrase var='music.delete'}
              </a> 
            </li>
            {/if}
            {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
            <li>
              <a href="{url link='music.upload' id=$aPin.ITEMID}" title="{phrase var='core.edit'}">
                <i class="icon-edit"></i> {phrase var='core.edit'}
              </a>  
            </li>
            {/if}
          </ul>

        </div>
    </div>
    {/if} 

</div>
<div class="clear"></div>
<div class="pin_comments js_parent_feed_entry">
{module 
name='pin.comments' 
feedType='music_song'   
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
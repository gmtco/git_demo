<div class="box-image">
    <a href="{$aPin.ITEMBOOKMARK}" title="{$aPin.ITEMTITLE}">
      {img 
      server_id=$aPin.ITEMSERVERID 
      title=$aPin.ITEMTITLE 
      path='poll.url_image' 
      file=$aPin.ITEMDESTINATION 
      class='img-responsive'}
    </a> 
</div>


<div class="box-caption">
    <div class="box-title">{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}</div>

    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
      </a>
      <div class="media-body">
        <h4 class="media-heading">        
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.poll'} 
        <span class="mac-post-time">
            {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
        </span>
        </h4>
        <!--
        <br/>
        {$aPin.ITEMDESCRIPTION|feed_strip|shorten:100:'feed.view_more':true|split:55}
        -->
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

                {template file='macore.block.bootpin-reportlink'}

                {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
                <li>
                  <a href="{url link='poll.add' id=$aPin.ITEMID}" title="{phrase var='poll.edit'}">
                    <i class="icon-edit"></i> {phrase var='poll.edit'}
                  </a> 
                </li> 
                {/if}
                {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
                <li>
                  <a class="mac_pin_delete_post" title="{phrase var='core.delete'}" href="#" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=poll&feedid={$aPin.feed_id}');return false;">
                    <i class="icon-remove"></i> {phrase var='core.delete'}
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
feedType='poll'   
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
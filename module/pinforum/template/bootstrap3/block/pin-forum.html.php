<div class="box-image">
    <a title="{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}" href="{url link='forum.thread.'.$aPin.ITEMEXTRAID}">
    {img 
      server_id=$aPin.user_server_id 
      path='core.url_user' 
      file=$aPin.user_image 
      suffix='_200_square'
      class='js_mp_fix_width js_hover_title' 
      title=$aPin.full_name
    }
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
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.forum'}
        <span class="mac-post-time">
            {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
        </span>
        </h4>
        <br/>
        {$aPin.ITEMDESCRIPTION|feed_strip|shorten:50:'feed.view_more':true|split:55}
      </div>
    </div>
    {if Phpfox::getUserId()}  
    <div class="box-caption-bottom clearfix">
        <div class="social">
            <div class="btn-group">
              <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">           
              <i class="icon-reorder"></i> 
              <span>{phrase var='macore.mac_more_link'}</span>         
              </a>
              <ul class="dropdown-menu" role="menu">
                {template file='macore.block.bootpin-box-link1'}


                {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
                <li>
                  <a title="{phrase var='forum.delete_thread'}" href="#" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=forum&feedid={$aPin.feed_id}');return false;">
                   <i class="icon-remove"></i> {phrase var='forum.delete_thread'}
                  </a>
                </li>
                {/if}
                {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
                <li>
                  <a onclick="$Core.box('forum.reply', 800, 'id={$aPin.ITEMEXTRAID}&edit={$aPin.ITEMID}'); return false;" href="#" title="{phrase var='core.edit'}">
                    <i class="icon-edit"></i> {phrase var='core.edit'}
                  </a>
                </li>
                {/if}
              </ul>
            </div>
        </div>
    </div>    
    {/if} 
</div>
<div class="box-image">
    <a href="{$aPin.ITEMEXTRADESTINATION}">
    <img src="{$aPin.ITEMDESTINATION}" alt="{$aPin.full_name}" />
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
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.link'}
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
                  <a title="{phrase var='core.delete'}" href="#" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=link&feedid={$aPin.feed_id}');return false;">
                  <i class="icon-remove"></i> {phrase var='core.delete'}
                </a>
                </li>
                {/if}
                {if Phpfox::isModule('report')}
                  {if $aPin.user_id != Phpfox::getUserId()}
                  <li>
                    <a href="#?call=report.add&amp;height=100&amp;width=400&amp;type={$aPin.ITEMTYPENAME}&amp;id={$aPin.ITEMID}" class="inlinePopup" title="Report">
                      <i class="icon-exclamation-sign"></i> {phrase var='report.reports'}
                    </a>
                  </li>
                  {/if}
                {/if}
              </ul>
            </div>
        </div>
    </div>    
    {/if} 
</div>
<div class="clear"></div>    
<div class="pin_comments js_parent_feed_entry">
{module 
name='pin.comments' 
feedType='link'   
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
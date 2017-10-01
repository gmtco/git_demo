<?php
/**
 * Pin by Macagoraga
 */
defined('PHPFOX') or exit('NO DICE!'); 
?>
<div class="box-image">
    <a href="{$aPin.ITEMBOOKMARK}" title="{$aPin.ITEMTITLE}">
      {img 
      server_id=$aPin.ITEMSERVERID 
      title=$aPin.ITEMTITLE 
      path=$aPin.ITEMTYPENAME.'.url_image' 
      file=$aPin.ITEMDESTINATION 
      class='img-responsive'
      suffix='_200_square'}
    </a> 
    {*
    <div class="thumbnail-caption">
        <div class="aligment">
            <div class="aligment">
                <div class="hover-lightbox open-lightbox" style="display: inline-block; top: 0px;"></div>
                <a href="{$aPin.ITEMBOOKMARK}" title="{$aPin.ITEMTITLE}">
                    <div class="hover-url" style="display: inline-block; top: 0px;"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="lightbox-text">
    <span>{phrase var='macore.by'} {$aPin.full_name}</span>
    </div>
    *}
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
        <div class="mac-favorites-link">
          {template file='macore.block.bootpin-favoriteslink'}
          <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="icon-reorder"></i> <span>{phrase var='macore.mac_more_link'}</span>
          </a>
          <ul class="dropdown-menu" role="menu">
            {template file='macore.block.bootpin-box-link1'}
            {if $aPin.ITEMTYPENAME == 'event'}
            {template file='macore.block.bootpin-actionlink-event'}
            {/if}
          </ul>
        </div>
    </div>
    {/if} 

</div>
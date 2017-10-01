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
</div>
<div class="box-caption">
    <div class="box-title"> 
      {$aPin.full_name}&nbsp;{phrase var='pinmarketplace.isellthis'}
      &nbsp;{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}
    </div>
    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
      </a>
      <div class="media-body">
        <h4 class="media-heading">        
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> 
        {phrase var='pin.user_shared_x'} {phrase var='pin.'.$aPin.ITEMTYPENAME}
        <span class="mac-post-time">
            {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
        </span>
        </h4>
        <br/>
        {$aPin.ITEMDESCRIPTION|feed_strip|shorten:50:'feed.view_more':true|split:55}
        <br/>
        {assign var='aListing' value=$aPin}
        {module name="macore.marketplaceprice" aListing=$aPin}
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
          </ul>
        </div>
    </div>
    {/if} 

</div>
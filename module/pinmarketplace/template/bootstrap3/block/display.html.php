{if count($aPins)}   
<div id="init-loading" style="margin:0 auto;width:100px;display:none">
  {phrase var='pin.loading_new_post'}<br>
  <img src="{module_path}pin/static/image/preloader2.gif" alt="">
</div>
<div id="mac-bootpin" class="mac-bootpin-single dont-unbind mac-bootpin-marketplace" style="opacity:0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"> <!-- #start -->
  {foreach from=$aPins name=pin item=aPin}
    {if false && Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
  		{module name='pin.display'}
  	{/if}
    <div class="mac-element mac-browsing-{$aPin.ITEMTYPENAME} mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}" id="mac_pin_element_{$aPin.feed_id}">
      <div class="box-type-{$aPin.ITEMTYPENAME} box" data-category="{$aPin.ITEMTYPENAME}">
        {template file='pinmarketplace.block.pin-marketplace'}
      </div>
    </div>
  {/foreach}
</div> <!-- #end -->    
<div class="clear"></div>
<nav id="page_nav"><a href="{$sAjaxFilterUrl}"></a></nav>
{unset var=$aPins var=$aPin}
{else}
<div class="alert alert-info mac-mrg-tp">{phrase var='pin.no_post_found'}</div>
{/if}
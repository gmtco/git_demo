{if count($aPins)}
<div id="mac-bootpin" class="mac-bootpin-single dont-unbind mac-bootpin-blog">
{foreach from=$aPins name=pin item=aPin}
  {if false && Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
    {module name='pinad.display'}
  {/if}
  <div class="mac-element mac-browsing-{$aPin.ITEMTYPENAME} mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}" id="mac_pin_element_{$aPin.feed_id}">
    <div class="box-type-{$aPin.ITEMTYPENAME} box" data-category="{$aPin.ITEMTYPENAME}">
      {template file='pinblog.block.pin-blog'}
    </div>
  </div>
{/foreach}
</div>
<div class="clear"></div>
<nav id="page_nav"><a href="{$sAjaxFilterUrl}"></a></nav>
{unset var=$aPins var=$aPin}
{else}
<div class="alert alert-info mac-mrg-tp">{phrase var='pin.no_post_found'}</div>
{/if}
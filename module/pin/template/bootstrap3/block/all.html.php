{if count($aPins)}
<div id="mac-bootpin" class="mac-bootpin-main dont-unbind" style="opacity:0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"> <!-- #start -->
  {foreach from=$aPins name=pin item=aPin}  

    {if false && Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
        {module name='pinad.display'}   
    {/if}

    <div class="mac-browsing-{$aPin.ITEMTYPENAME} mac-element mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}" id="mac_pin_element_{$aPin.feed_id}">
        <div {if isset($bAjaxRequest) && $bAjaxRequest > 0}data-show="yes"{/if} class="dont-unbind box-type-{$aPin.ITEMTYPENAME} box" data-category="{$aPin.ITEMTYPENAME}">
            {if $aPin.ITEMTYPENAME == 'photo'}
                {template file='pinphoto.block.pin-photo'}
            {elseif $aPin.ITEMTYPENAME == 'video'}
                {template file='pinvideo.block.pin-video'}
            {elseif $aPin.ITEMTYPENAME == 'blog'}
                {template file='pinblog.block.pin-blog'}
            {elseif $aPin.ITEMTYPENAME == 'user_status'}
                {template file='pinstatus.block.pin-status}
            {elseif $aPin.ITEMTYPENAME == 'quiz'}
                {template file='pinquiz.block.pin-quiz'}
            {elseif $aPin.ITEMTYPENAME == 'poll'}
                {template file='pinpoll.block.pin-poll'}
            {elseif $aPin.ITEMTYPENAME == 'music_song'}
                {template file='pinmusic.block.pin-music'}
            {elseif $aPin.ITEMTYPENAME == 'forum'}
                {template file='pinforum.block.pin-forum'}
            {elseif $aPin.ITEMTYPENAME == 'marketplace'}
                {template file='pinmarketplace.block.pin-marketplace'}
            {elseif $aPin.ITEMTYPENAME == 'event'}
                {template file='macore.block.bootpin-pinelement'}
            {elseif $aPin.ITEMTYPENAME == 'link'}
                {template file='pinlink.block.pin-link'}
            {/if}
        </div>
    </div>
  {/foreach}
</div> <!-- #end -->    
<div class="clear"></div>
{unset var=$aPins var=$aPin}
{else}
<div class="alert alert-info mac-mrg-tp">{phrase var='pin.no_post_found'}</div>
{/if}
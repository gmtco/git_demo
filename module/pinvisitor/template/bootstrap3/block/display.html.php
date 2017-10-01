{if !$bAjaxRequest} 
<div id="init-loading" style="margin:0 auto;width:100px;display:none">
  {phrase var='pin.loading_new_post'}<br>
  <img src="{module_path}pin/static/image/preloader2.gif" alt="">
</div>
<div class="row hidden-xs hidden-sm">
  <div class="col-xs-12">
	<h1 class="text-center">Welcome! Start Sharing your story in pictures, videos, and blog.</h1>
  </div>
	<div class="col-xs-4 text-center">
		<img src="//static.viame-cdn.com/assets/skin_new/welcome_share-c19137871172c15a6bbebca0c5359fa7.png" class="text-center" alt="Welcome_share">
	</div>
  <div class="col-xs-4 text-center">
      <img src="//static.viame-cdn.com/assets/skin_new/welcome_choose-0384494fe977a73e6eb4c9d6fd9a9cf7.png" class="text-center" alt="Welcome_choose">
	</div>
  <div class="col-xs-4 text-center">
      <img src="//static.viame-cdn.com/assets/skin_new/welcome_discover-5dde4b00f4d4321eab5dd215289a507b.png" class="text-center" alt="Welcome_discover">
  </div>
  <hr class="invisible clear">
  <div class="col-xs-12">
	<p class="lead text-center">Explore, connect, share, and become part of a whole new media sharing Community!
	<a class="btn btn-primary" href="{url link='about'}"> Learn more </a>
	 or 
	<a class="btn btn-danger" href="{url link='user.register'}"> Signup </a>
  </p>
  </div>
</div>
<hr class="invisible clear">
{/if}
         
{if count($aPins)}
<div id="mac-bootpin" class="mac-bootpin-visitor dont-unbind" style="opacity:0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"> <!-- #start -->
  {foreach from=$aPins name=pin item=aPin}
    {if false && Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
      {module name='pinad.display'}   
    {/if}
    <div class="mac-browsing-{$aPin.ITEMTYPENAME} mac-element mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}">
        <div {if isset($bAjaxRequest) && $bAjaxRequest > 0}data-show="yes"{/if} class="box-type-{$aPin.ITEMTYPENAME} box" data-category="{$aPin.ITEMTYPENAME}">
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
                {template file='macore.block.bootpin-pinelement'}
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
<nav id="page_nav"><a href="{$sAjaxFilterUrl}"></a></nav>
{unset var=$aPins var=$aPin}
{else}
<div class="alert alert-info mac-mrg-tp">{phrase var='pin.no_post_found'}</div>
{/if}
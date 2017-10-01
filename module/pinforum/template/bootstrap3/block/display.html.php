{if count($aPins)}
        
<div id="init-loading" style="margin:0 auto;width:100px">
  {phrase var='pin.loading_new_post'}<br>
  <img src="{module_path}pin/static/image/preloader2.gif" alt="">
</div>

<div id="macagoraga-container" class="transitions-enabled infinite-scroll clearfix" style="opacity:0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"> <!-- #start -->
  {foreach from=$aPins name=pin item=aPin}
  
    {if Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
  	
  		{module name='pinad.display'}
  	
  	{/if}
  	
    <div class="element" id="mac_pin_element_{$aPin.feed_id}">
    	<div class="element_inner">
	
      		{template file='pinforum.block.pin-forum'}

      	<div class="clear"></div>
    	</div>
    </div>
  {/foreach}
</div> <!-- #end -->    
<div class="clear"></div>

<nav id="page_nav">
  <a href="{$sAjaxFilterUrl}"></a>
</nav>

{unset var=$aPins var=$aPin}

{else}

<div class="message" style="margin-top:20px;font-size:13px">{phrase var='pin.no_post_found'}</div>

{/if}
{if count($aPins)}  

<div id="init-loading" style="margin:0 auto;width:100px;display:none">
  {phrase var='pin.loading_new_post'}<br>
  <img src="{module_path}pin/static/image/preloader2.gif" alt="">
</div>

<div id="mac-bootpin" class="mac-bootpin-single dont-unbind mac-bootpin-pages" style="opacity:0;-ms-filter: 'progid:DXImageTransform.Microsoft.Alpha(Opacity=0)';filter: alpha(opacity=0);-moz-opacity: 0;-khtml-opacity: 0;"> <!-- #start -->
  {foreach from=$aPins name=pin item=aPin}
    {if false && Phpfox::isModule('pinad') && $phpfox.iteration.pin == $iRandomForAd}
  		{module name='pinad.display'}
  	{/if}
    <div class="mac-element mac-browsing-pages mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}">
      <div class="box-type-pages box" data-category="{$aPin.typeid|convert}{if !empty($aPin.typeid) && !empty($aPin.categoryid)}/{/if}{$aPin.categoryid|convert}" id="mac_pin_element_{$aPin.page_id}">
        <div class="box-image">

            {if is_null($aPin.is_liked)}
             <div class="mac-like-btn-wrap">
              <a class="btn btn-default btn-sm" onclick="$(this).parent().hide(); $('#js_add_pages_unlike').show(); $.ajaxCall('like.add', 'type_id=pages&amp;item_id={$aPin.page_id}'); return false;" id="pages_like_join" href="#" data-placement="bottom" rel="tooltip" data-original-title="{phrase var='macore.like_this_page'}">
              <i class="icon-thumbs-up"></i>  {phrase var='pages.like'}           
              </a>
            </div>
            {/if}

            <a href="{url link='pages'}{$aPin.page_id}" title="{$aPin.title|clean|shorten:10:'...'}">
              {img 
              server_id=$aPin.image_server_id 
              title=$aPin.title 
              path='pages.url_image' 
              file=$aPin.image_path 
              suffix=''  
              class='img-responsive'}
            </a>
        </div>
        <div class="box-caption">
          <div class="box-title">
            <a href="{url link='pages'}{$aPin.page_id}" class="lead">
              {$aPin.title}
            </a>
            <br/> <br/>        
            {$aPin.typeid|convert} 
            {if !empty($aPin.typeid) && !empty($aPin.categoryid)}/{/if}
            {$aPin.categoryid|convert}
            <br/> <br/>  
            <div class="btn-group btn-group-justified">
              <a class="btn btn-default" href="{url link='pages'}{$aPin.page_id}" data-placement="bottom" rel="tooltip" data-original-title="{phrase var='pages.view_this_page_lower'}">
                <i class="icon-link"></i> {phrase var='pin.view_page'}
              </a>
              <a class="btn btn-default" onclick="tb_show('{phrase var='pin.share'}', $.ajaxBox('share.popup', 'height=300&width=550&type=feed&url={url link='pages'}{$aPin.page_id}&title={$aPin.title}&sharemodule=profile')); return false;" href="javascript:void(0)" data-placement="bottom" rel="tooltip" data-original-title="{phrase var='pin.share'}">
                <i class="icon-share"></i> {phrase var='pin.share'}
              </a>
            </div>
          </div> 
        </div>
      </div>
    </div>
  {/foreach}
</div>
<nav id="page_nav"><a href="{$sAjaxFilterUrl}"></a></nav>
{unset var=$aPins var=$aPin}
{else}
<div class="alert alert-info mac-mrg-tp">{phrase var='pin.no_post_found'}</div>
{/if}
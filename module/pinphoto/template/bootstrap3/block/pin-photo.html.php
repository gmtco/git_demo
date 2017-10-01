<div class="box-image">
    <img class="img-responsive" src="{img 
        server_id=$aPin.ITEMSERVERID 
        path='photo.url_photo' 
        file=$aPin.ITEMDESTINATION suffix='_500' return_url=true}">
    <div class="thumbnail-caption">
        <div class="aligment">
            <div class="aligment">
                <a data-placement="bottom" href="{if Phpfox::getParam('pin.on_click_on_photo') == 'prettyphoto_lightbox' || Phpfox::getParam('pin.on_click_on_photo') == 'phpfox_lightbox'}{img server_id=$aPin.ITEMSERVERID path='photo.url_photo' suffix='_1024' file=$aPin.ITEMDESTINATION return_url=true}{else}{$aPin.ITEMBOOKMARK}{/if}" {if Phpfox::getParam('pin.on_click_on_photo') == 'theater_mode' || Phpfox::getParam('pin.on_click_on_photo') == 'phpfox_lightbox'} class="thickbox photo_holder_image hover-lightbox open-lightbox mac-tooltip" rel="{$aPin.ITEMID}"{else} class="hover-lightbox open-lightbox mac-tooltip"{/if} {if Phpfox::getParam('pin.on_click_on_photo') == 'prettyphoto_lightbox'} rel="prettyPhoto[photos]" {elseif Phpfox::getParam('pin.on_click_on_photo') == 'external_page_new_window'} target="_blank" {/if} title="{phrase var='macore.zoom_photo'}"></a>
                <a data-placement="bottom" data-original-title="{phrase var='macore.open_in_a_new_window'}" rel="tooltip" href="{$aPin.ITEMBOOKMARK}" target="_blank">
                    <div class="hover-url"></div>
                </a>
            </div>
        </div>
    </div>
    <div class="lightbox-text">
        <span>{phrase var='macore.by'} {$aPin.full_name}</span>
    </div>
</div>


<div class="box-caption">
    <div class="box-title">{$aPin.ITEMTITLE|feed_strip|shorten:50:'...'|split:55}</div>

    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
      </a>
      <div class="media-body">
        <h4 class="media-heading">        
        <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.photo'} 
        <span class="mac-post-time">
            {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
        </span>
        </h4>
        <!--
        <br/>
        {$aPin.ITEMDESCRIPTION|feed_strip|shorten:100:'feed.view_more':true|split:55}
        -->
       
      </div>
    </div>

    <div class="box-caption-bottom clearfix">

        <div class="mac-favorites-link">

            {if Phpfox::getParam('pin.use_prettyphoto') != 'dont_use_lightbox'}
            <a href="{img server_id=$aPin.ITEMSERVERID path='photo.url_photo' suffix='_1024' file=$aPin.ITEMDESTINATION return_url=true}"
            rel="prettyPhoto[photo]"
            title="{phrase var='macore.open_slideshow'}"
            class="btn btn-xs btn-default mac-tooltip"
            data-placement="bottom">
            <i class="icon-fullscreen"></i> <span>{phrase var='macore.zoom'}</span>
            </a>
            {/if}
            {template file='macore.block.bootpin-favoriteslink'}
          <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">
            <i class="icon-reorder"></i> <span>{phrase var='macore.mac_more_link'}</span>
          </a>
              <ul class="dropdown-menu" role="menu">
    
                <li>
                    <a href="{url url='photo' id=$aPin.ITEMID title=$aPin.ITEMTITLE all='1'}">
                        {phrase var='macore.view_all_photo_size'}
                    </a>
                </li>

                {if $aPin.user_id == Phpfox::getUserId() && !defined('PHPFOX_IS_HOSTED_SCRIPT')}

                    <li>    
                        <a href="#" title="{phrase var='photo.set_this_photo_as_your_profile_image'}" onclick="tb_show('', '', null, '{phrase var='photo.setting_this_photo_as_your_profile_picture_please_hold'}', true); $.ajaxCall('photo.makeProfilePicture', 'photo_id={$aPin.ITEMID}', 'GET'); return false;">
                            {phrase var='photo.make_profile_picture'}
                        </a>
                    </li>
                    {if Phpfox::getUserParam('profile.can_change_cover_photo')}
                    <li>
                        <a href="#" title="{phrase var='user.set_this_photo_as_your_profile_cover_photo'}" onclick="$.ajaxCall('user.setCoverPhoto', 'photo_id={$aPin.ITEMID}', 'GET'); return false;">
                            {phrase var='user.set_as_cover_photo'}
                        </a>
                    </li>
                    {/if}

                {/if}
                
                {template file='macore.block.bootpin-box-link1'}

                {if isset($aPage) && isset($aPage.page_id)}
                <li>
                    <a href="#" title="{phrase var='photo.set_this_as_your_page_s_cover_photo'}" onclick="$Core.Pages.setAsCover({$aPage.page_id},{$aPin.ITEMID}); return false;">
                        {phrase var='photo.set_as_your_page_s_cover_photo'}
                    </a>
                </li>
                {/if}

                {if (Phpfox::getUserParam('photo.can_edit_own_photo') && $aPin.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_edit_other_photo')}
                <li>
                    <a title="{phrase var='photo.edit_this_photo'}" href="#" onclick="if ($Core.exists('.js_box_image_holder_full')) {l} js_box_remove($('.js_box_image_holder_full').find('.js_box_content')); {r} $Core.box('photo.editPhoto', 700, 'photo_id={$aPin.ITEMID}'); $('#js_tag_photo').hide();return false;">
                    <i class="icon-edit"></i> {phrase var='photo.edit_this_photo'}
                    </a> 
                </li> 
                {/if}
                
                {if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
                <li>
                    <a class="mac_pin_delete_post" title="{phrase var='photo.delete_photo'}" href="{url link='photo' delete=$aPin.ITEMID}" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=photo&feedid={$aPin.feed_id}');return false;">
                    <i class="icon-remove"></i> {phrase var='photo.delete_photo'}
                    </a> 
                </li> 
                {/if}

                {template file='macore.block.bootpin-reportlink'}

              </ul>

        </div>
    </div>    

</div>

<div class="clear"></div>

<div class="pin_comments js_parent_feed_entry">
{module 
 name='pin.comments' 
 feedType='photo'   
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
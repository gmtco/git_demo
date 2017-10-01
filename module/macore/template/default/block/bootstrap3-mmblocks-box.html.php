<div class="mac-mm-box col-xs-3">
  <div class="mac-mm-box-body">    
    <h5>
      <a href="{permalink module=$sMacTypeMedia id=$aItem.item_id title=$aItem.item_title}" title="{phrase var='newsletter.read_more'}">
      {$aItem.item_title|clean|shorten:50:'...'}
      </a>
    </h5>
    <br class="clear">
    <p class="mac-media-content">
      {if isset($aItem.page_id)}
      <a href="{$aItem.link}">
        {img 
        server_id=$aItem.image_server_id 
        title=$aItem.title 
        path='core.url_user' 
        file=$aItem.image_path 
        suffix='_240' 
        max_width='240' 
        max_height='200' 
        is_page_image=true
        }
      </a>
      {/if}

      {if isset($aItem.item_content)}
      {$aItem.item_content|strip_tags|shorten:100:'...'}
      {/if}

      {if isset($aItem.photo_id)}
      <a href="{if Phpfox::isMobile()}{img server_id=$aItem.server_id path='photo.url_photo' file=$aItem.destination suffix='_1024' return_url=true}{else}{$aItem.link}{if isset($iForceAlbumId)}albumid_{$iForceAlbumId}/{/if}{/if}"
               class="{if !Phpfox::isMobile()}thickbox photo_holder_image{else}mac-photoswipe{/if}"
               rel="{$aItem.photo_id}"
               title="{phrase var='photo.title_by_full_name' title=$aItem.title|clean full_name=$aItem.full_name|clean}">
              {img 
              server_id=$aItem.server_id 
              path='photo.url_photo' 
              file=$aItem.destination 
              suffix='_240' 
              title=$aItem.title
              max_width='240' 
              max_height='200'
              class='img-responsive'
              }
            </a>
      {/if}
    </p>


    <a href="{permalink module=$sMacTypeMedia id=$aItem.item_id title=$aItem.item_title}" title="{phrase var='newsletter.read_more'}" class="btn btn-xs btn-default">
      {phrase var='newsletter.read_more'} &raquo;
    </a>
  </div>
  <div class="mac-mm-box-footer">
    <p>
    {img user=$aItem max_width=31 max_height=31 suffix='_50_square' class='pull-left v_middle mac_user_round_pic_big js_hover_title'} 
    Posted on {$aItem.item_posted_on}
    <br>
    by {$aItem.full_name}
    </p>
  </div>
</div>
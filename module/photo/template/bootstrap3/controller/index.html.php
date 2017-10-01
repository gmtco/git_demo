{if !Phpfox::isModule('pinphoto') || defined('PHPFOX_IS_PAGES_VIEW') || isset($aPage)}


{if isset($bSpecialMenu) && $bSpecialMenu == true}
    {template file='photo.block.specialmenu'}
{/if}
{if $sView == 'my' && count($aPhotos)}
<div>
	<div class="dropdown">				
		<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
			{phrase var='photo.actions'}
		</a>		
		<ul class="dropdown-menu">
			<li>
				<a href="{url link='photo' view='my' mode='edit'}">
					{phrase var='photo.mass_edit_photos'}
				</a>
			</li>
		</ul>			
	</div>		
</div>	    
{/if}


{if !defined('PHPFOX_IS_AJAX_CONTROLLER')}
<div id="js_actual_photo_content">
	<div id="js_album_outer_content" class="mac-isotope2-wrapper">
{/if}


		{if count($aPhotos)}

		    {if isset($bIsEditMode)}
		    <form method="post" action="#" onsubmit="$('#js_photo_multi_edit_image').show(); $('#js_photo_multi_edit_submit').hide(); $(this).ajaxCall('photo.massUpdate'{if $bIsMassEditUpload}, 'is_photo_upload=1'{/if}); return false;">
			    {foreach from=$aPhotos item=aForms}
				    {template file='photo.block.edit-photo'}
			    {/foreach}
			    <div class="photo_table_clear">
				    <div id="js_photo_multi_edit_image" style="display:none;">
					    {img theme='ajax/add.gif'}
				    </div>		
				    <div id="js_photo_multi_edit_submit">
					    <input type="submit" value="{phrase var='photo.update_photo_s'}" class="btn btn-primary btn-block" />
				    </div>
			    </div>
			    {pager}
		    </form>
		    
		    {else}

			{if !defined('PHPFOX_IS_AJAX_CONTROLLER') && !Phpfox::isMobile() && (Phpfox::getUserParam('photo.can_approve_photos') || Phpfox::getUserParam('photo.can_delete_other_photos'))}
			    {moderation}
			    <br>
			{/if}

			{template file='photo.block.photo-entry'}			

		    {/if}
		{else}
		    <div class="alert alert-info">
			    {phrase var='photo.no_photos_found'}			
		    </div>
		{/if}	

{if !defined('PHPFOX_IS_AJAX_CONTROLLER')}
	</div><!-- #js_album_outer_content -->
</div><!-- #js_actual_photo_content -->
{/if}

{/if}
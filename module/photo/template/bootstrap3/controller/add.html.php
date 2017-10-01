<?php
/*

bootstrapped by

 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
?>
{if false && Phpfox::isMobile()}
<div class="extra_info">
	{phrase var='photo.photos_unfortunately_cannot_be_uploaded_via_mobile_devices_at_this_moment'}
</div>
{else}
<div id="js_upload_error_message"></div>

<div id="js_photo_form_holder">
	<form class="mac-form-photo-upl form-horizontal" method="post" action="{url link='photo.frame'}" id="js_photo_form" enctype="multipart/form-data" target="js_upload_frame" onsubmit="return startProcess(true, true);">
		
	{if $sModuleContainer}
		<div><input type="hidden" name="val[callback_module]" value="{$sModuleContainer}" /></div>
	{/if}
	{if $iItem}
		<div><input type="hidden" name="val[callback_item_id]" value="{$iItem}" /></div>
		<div><input type="hidden" name="val[group_id]" value="{$iItem}" /></div>
		<div><input type="hidden" name="val[parent_user_id]" value="{$iItem}" /></div>
	{/if}		
		
		{plugin call='photo.template_controller_upload_form'}
		{if Phpfox::getUserParam('photo.can_create_photo_album')}
			<div class="form-group" id="album_table">
				<div class="col-lg-12">
					<label>{phrase var='photo.photo_album'}</label>
					<span id="js_photo_albums"{if !count($aAlbums)} style="display:none;"{/if}>
						<select class="form-control" name="val[album_id]" id="js_photo_album_select" onchange="if (empty(this.value)) {l} $('#js_photo_privacy_holder').slideDown(); {r} else {l} $('#js_photo_privacy_holder').slideUp(); {r}">
							<option value="">{phrase var='photo.select_an_album'}:</option>
								{foreach from=$aAlbums item=aAlbum}
									<option value="{$aAlbum.album_id}"{if $iAlbumId == $aAlbum.album_id} selected="selected"{/if}>{$aAlbum.name|clean}</option>
								{/foreach}
						</select>
					</span>
					<p class="help-block">
						<a href="#" onclick="$Core.box('photo.newAlbum', 500, 'module={$sModuleContainer}&amp;item={$iItem}'); return false;">{phrase var='photo.create_a_new_photo_album'}</a>
					</p>
				</div>
			</div>		
		{/if}		
		
		{if !$sModuleContainer && Phpfox::getParam('photo.allow_photo_category_selection') && Phpfox::getService('photo.category')->hasCategories()}
		<div class="form-group">
			<div class="col-lg-12">
				<label for="category">{phrase var='photo.category'}:</label>
				{module name='photo.drop-down'}
			</div>
		</div>		
		{/if}
		
		<div id="js_photo_privacy_holder" {if $iAlbumId} style="display:none;"{/if}>
			{if $sModuleContainer}
			<div><input type="hidden" id="privacy" name="val[privacy]" value="0" /></div>
			<div><input type="hidden" id="privacy_comment" name="val[privacy_comment]" value="0" /></div>
			{else}

				{if Phpfox::isModule('privacy')}
				<div class="form-group">

					<div class="col-md-6">
						<label>{phrase var='photo.photo_s_privacy'}:</label>
						{module name='privacy.form' privacy_name='privacy' privacy_info='photo.control_who_can_see_these_photo_s' default_privacy='photo.default_privacy_setting'}
					</div>	

					{if Phpfox::isModule('comment')}
					
					<div class="col-md-6">
						<label>{phrase var='photo.comment_privacy'}:</label>
						{module name='privacy.form' privacy_name='privacy_comment' privacy_info='photo.control_who_can_comment_on_these_photo_s' privacy_no_custom=true}
					</div>

					{/if}

				</div>
				{/if}

			{/if}
		</div>		
		{if isset($sMethod) && $sMethod == 'massuploader'}
			<div><input type="hidden" name="val[method]" value="massuploader" /></div>

			<div class="form-group mass_uploader_table">

				<div class="col-lg-12">

					<div id="swf_photo_upload_button_holder">
						<div class="swf_upload_holder">
							<div id="swf_photo_upload_button"></div>
						</div>
						
						<div class="swf_upload_text_holder">
							<div class="swf_upload_progress"></div>
							<div class="swf_upload_text">
								{phrase var='photo.select_photo_s'}
							</div>
						</div>				
					</div>

					<br>
					<div class="alert alert-info">
						<a class="close" data-dismiss="alert" href="#">&times;</a>
						{phrase var='photo.you_can_upload_a_jpg_gif_or_png_file'}
						{if $iMaxFileSize !== null}
							<br />
							{phrase var='photo.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
						{/if}	
					</div>

				</div>			
			</div>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert" href="#">&times;</a>
				{phrase var='photo.upload_problems_try_the_basic_uploader' link=$sMethodUrl}
			</div>	
		{else}				
			<div class="form-group">
				<div class="col-lg-12">
					<label>{phrase var='photo.select_photo_s'}:</label>

					<div id="js_photo_upload_input"></div>		
					
					<br>
					<div class="alert alert-info">
						<a class="close" data-dismiss="alert" href="#">&times;</a>
						{phrase var='photo.you_can_upload_a_jpg_gif_or_png_file'}
						{if $iMaxFileSize !== null}
						<br />
						{phrase var='photo.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
						{/if}				
					</div>
				</div>
			</div>
			
			{if isset($bRawFileInput) && $bRawFileInput}
				<input class="btn btn-primary btn-block" type="button" name="Filedata" id="Filedata" value="Choose photo">
			{else}		
			<div class="table_clear">
				<input type="submit" value="{phrase var='photo.upload'}" class="btn btn-primary btn-block" />
			</div>		
			{/if}			
		{/if}		
		
	</form>
</div>
<div id="js_photo_form_holder_loading" class="t_center" style="display:none;">
	<span style="margin-left:4px; margin-right:4px; font-size:9pt; font-weight:normal;">
		<i class="icon-spinner icon-spin icon-2x"></i>
		{phrase var='core.uploading'}
	</span>
</div>
{/if}
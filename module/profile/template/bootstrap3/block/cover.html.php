<div id="js_cover_photo_iframe_loader_error"></div>
<div id="js_cover_photo_iframe_loader_upload" style="display:none;">
	<i class="icon-spinner icon-spin"></i> {phrase var='user.uploading_image'}
</div>
<form class="form-inline" id="js_activity_feed_form" enctype="multipart/form-data" action="{url link='photo.frame'}" method="post" target="js_cover_photo_iframe_loader">
	<input type="hidden" name="val[action]" value="upload_photo_via_share" />
	<input type="hidden" name="val[is_cover_photo]" value="1" />
	{if isset($iPageId) && !empty($iPageId)}
		<div>
			<input type="hidden" name="val[page_id]" value="{$iPageId}" />
		</div>
	{/if}
	<label>
	{phrase var='user.select_a_photo'}
	<input type="file" name="image[]" id="global_attachment_photo_file_input" value="" />
	</label>
	<input type="submit" value="{phrase var='user.upload'}" class="btn btn-primary" onclick="$('#js_cover_photo_iframe_loader_error').hide(); $('#js_cover_photo_iframe_loader_upload').show(); $('#js_activity_feed_form').hide();" />
	<iframe id="js_cover_photo_iframe_loader" name="js_cover_photo_iframe_loader" height="200" width="500" frameborder="1" style="display:none;"></iframe>
</form>
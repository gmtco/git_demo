{if isset($aForms.album_id) && $aForms.profile_id > 0}
	{else}
	<div class="input-group">
	<span class="input-group-addon"><i class="icon-question"></i></span>
	<input class="form-control input-lg" placeholder="{phrase var='photo.name'}" type="text" name="val[name]" id="name" value="{value type='input' id='name'}" size="30" maxlength="150" />	
	</div>
	{/if}

	<div class="form-group">
		{if isset($aForms.album_id) && $aForms.profile_id > 0}
		<input type="hidden" name="val[name]" id="name" value="{phrase var='photo.profile_pictures'}" size="30" maxlength="150" />	
		{phrase var='photo.profile_pictures'}
		{/if}
	</div>

	<div class="form-group">
		<div class="col-lg-12">
			<textarea class="form-control input-lg" placeholder="{phrase var='photo.description'}" name="val[description]" id="description">{value type='textarea' id='description'}</textarea>
		</div>
	</div>

	{if isset($sModule) && $sModule}
	{else}

		{if Phpfox::isModule('privacy')}
		<div class="form-group">

			<div class="col-lg-6">
				<label>{phrase var='photo.album_s_privacy'}:</label>
				{module name='privacy.form' privacy_name='privacy' privacy_info='photo.control_who_can_see_this_photo_album_and_any_photos_associated_with_it' privacy_custom_id='js_custom_privacy_input_holder_album'}
			</div>	

			{if Phpfox::isModule('comment')}
			
			<div class="col-lg-6">
				<label>{phrase var='photo.comment_privacy'}:</label>
				{module name='privacy.form' privacy_name='privacy_comment' privacy_info='photo.control_who_can_comment_on_this_photo_album_and_any_photos_associated_with_it' privacy_no_custom=true}
			</div>

			{/if}

		</div>
		{/if}

	{/if}
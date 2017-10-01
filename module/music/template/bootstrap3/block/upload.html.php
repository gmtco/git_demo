<div id="js_music_form_holder">
	{if !$bIsEdit}
	<div class="alert alert-info">
		<a class="close" href="#" data-dismiss="alert">×</a>
		<p>
			{phrase var='music.you_retain_all_rights_in_your_music_that_you_upload_you_must_only_upload_music_in_which_you_own_all'}
		</p>
		<p>
			{phrase var='music.uploading_copyrighted_music_without_the_explicit_consent_of_the_copyright_owner_will_result_in_your'}
		</p>
	</div>		
	
	<div class="alert alert-success" id="js_music_upload_valid_message" style="display:none;">
		<a class="close" href="#" data-dismiss="alert">×</a>
		{phrase var='music.successfully_uploaded_the_mp3'}
	</div>	
			
	<div class="main_break"></div>
	{/if}
	{if isset($sModule) && $sModule}
	
	{else}
	<div id="js_custom_privacy_input_holder">
	{if $bIsEdit && Phpfox::isModule('privacy')}
		{if isset($bIsEditAlbum)}
		{module name='privacy.build' privacy_item_id=$aForms.album_id privacy_module_id='music_album'}
		{else}
		{module name='privacy.build' privacy_item_id=$aForms.song_id privacy_module_id='music_song'}
		{/if}
	{/if}
	</div>	
	{/if}
	{if isset($bIsEditAlbum) && $bIsEdit}
	<div><input type="hidden" name="val[inline]" value="1" /></div>
	<div><input type="hidden" name="val[album_id]" value="{$aForms.album_id}" /></div>
	{/if}
	
	{if !isset($bIsEditAlbum)}
	<div class="table">
		<div class="table_left">
			<label>
			{if isset($aUploadAlbums) && count($aUploadAlbums)}
			{phrase var='music.album'}: 
			{else}
			{phrase var='music.album_name'}
			{/if}
			</label>
		</div>
		<div class="table_right">
			{if isset($aUploadAlbums) && count($aUploadAlbums)}
			<select class="form-control" name="val[album_id]" id="music_album_id_select" onchange="if (empty(this.value)) {l} $('#js_song_privacy_holder').slideDown(); {r} else {l} $('#js_song_privacy_holder').slideUp(); {r}">
				<option value="">{phrase var='music.select'}:</option>
			{foreach from=$aUploadAlbums item=aAlbum}
				<option value="{$aAlbum.album_id}"{value type='select' id='album_id' default=$aAlbum.album_id}>{$aAlbum.name|clean}</option>
			{/foreach}
			</select>
			<div class="extra_info_link"><a href="#" onclick="$('#js_create_new_music_album').show(); $('#js_create_new_music_album input').focus(); return false;">{phrase var='music.or_create_a_new_album'}</a></div>
			<div id="js_create_new_music_album" class="p_top_8" style="display:none;">
				
				<input placeholder="{phrase var='music.album_name'}" class="form-control" type="text" name="val[new_album_title]" value="{value type='input' id='new_album_title'}" size="30" />
			
			</div>
			{else}
			<input placeholder="{phrase var='music.album_name'}" class="form-control" type="text" name="val[new_album_title]" value="{value type='input' id='new_album_title'}" size="30" /> 
			<span class="help-block">{phrase var='music.optional'}</span>
			{/if}
		</div>
	</div>	
	{/if}
	
	<div class="table song_name">
		<div class="table_left">
			<label>{required}{phrase var='music.song_name'}</label>
		</div>
		<div class="table_right">
			<input placeholder="{phrase var='music.song_name'}" class="form-control" type="text" name="val[title]" value="{value type='input' id='title'}" size="30" id="title" />
		</div>
	</div>
	
	<div class="table song_name">
		<div class="table_left">
			<label>{phrase var='music.genre'}:</label>
		</div>
		<div class="table_right">
			<select class="form-control" name="val[genre_id]">
				<option value="">{phrase var='music.select'}:</option>
			{foreach from=$aGenres item=aGenre}
				<option value="{$aGenre.genre_id}"{value type='select' id='genre_id' default=$aGenre.genre_id}>{$aGenre.name|convert}</option>
			{/foreach}
			</select>
		</div>
	</div>	
	
	{if isset($sModule) && $sModule}
	
	{else}	
	{if $bIsEdit && $aForms.album_id > 0}
	
	{else}
	{if !isset($bIsEditAlbum) && Phpfox::isModule('privacy')}
	<div id="js_song_privacy_holder" class="row">
		<div class="col-lg-6 col-6">
			<label>
				{phrase var='music.privacy'}
			</label>
			{module name='privacy.form' privacy_name='privacy' privacy_info='music.control_who_can_see_this_song' default_privacy='music.default_privacy_setting'}		
		</div>
		
		<div class="col-lg-6 col-6">
			<label>
				{phrase var='music.comment_privacy'}:
			</label>
			{module name='privacy.form' privacy_name='privacy_comment' privacy_info='music.control_who_can_comment_on_this_song' privacy_no_custom=true}
		</div>
	</div>
	{/if}
	{/if}
	{/if}
	
	{if !isset($bIsEditAlbum) && $bIsEdit}
	
	{else}	
	{if isset($sMethod) && $sMethod == 'massuploader'}
	<div class="table mass_uploader_table">
		<div id="swf_music_upload_button_holder">
			<div class="swf_upload_holder">
				<div id="swf_music_upload_button"></div>
			</div>
			
			<div class="swf_upload_text_holder">
				<div class="swf_upload_progress"></div>
				<div class="swf_upload_text">
					<label>{phrase var='music.select_mp3'}</label>
				</div>
			</div>				
		</div>
		<div class="alert alert-info mac-mrg-tp">
			<a class="close" href="#" data-dismiss="alert">×</a>
			{phrase var='music.max_file_size'}: {$iUploadLimit}
		</div>			
	</div>
	<div class="mass_uploader_link">{phrase var='music.upload_problems_try_the_basic_uploader' url=$sMethodUrl}</div>	
	{else}	
	<div><input type="hidden" name="val[method]" value="simple" /></div>
	<div class="table">
		<div class="table_left">
			<label>{required}{phrase var='music.select_mp3'}</label>
		</div>
		<div class="table_right">		
			<div id="js_progress_uploader"></div>
			<div class="alert alert-info mac-mrg-tp">
				<a class="close" href="#" data-dismiss="alert">×</a>
				<label>{phrase var='music.max_file_size'}: {$iUploadLimit}</label>
			</div>		
		</div>
	</div>	
	<div class="table_clear">
		<input type="submit" value="{phrase var='music.upload'}" class="btn btn-primary btn-block" />
	</div>
	{/if}
	{/if}
</div>
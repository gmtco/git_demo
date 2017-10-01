{if PHPFOX_IS_AJAX}
<div id="js_video_done" style="display:none;">
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		{phrase var='video.video_successfully_added'}
	</div>
</div>
{/if}
<div id="js_video_error" class="alert alert-error" style="display:none;"></div>
<form class="form-horizontal mac-form-video-share" method="post" action="{url link='video.add.url'}"{if PHPFOX_IS_AJAX} onsubmit="$(this).ajaxCall('video.addShare'); return false;"{/if}>
	{if $sModule}
		<div><input type="hidden" name="val[callback_module]" value="{$sModule}" /></div>
	{/if}
	{if $iItem}
		<div><input type="hidden" name="val[callback_item_id]" value="{$iItem}" /></div>
	{/if}	
	{if !empty($sEditorId)}
		<div><input type="hidden" name="editor_id" value="{$sEditorId}" /></div>
	{/if}

	{if !isset($sModule) || $sModule == false}
	<div class="form-group">
		<div class="col-lg-12">
			<label for="category">{phrase var='video.category'}:</label>
			{$sCategories}
		</div>
	</div>	
	{/if}

	<div class="input-group">
	  <span class="input-group-addon"><i class="icon-link"></i></span>
	  <input class="form-control input-lg" type="text" name="val[url]" value="{value type='input' id='url'}" placeholder="{phrase var='video.video_url'}" size="40" />
	</div>
	<br>
	<div class="alert alert-info">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		{phrase var='video.click_here_to_view_a_list_of_supported_sites'}
	</div>

	<div id="js_custom_privacy_input_holder_video">
	{if isset($aForms.video_id)}
		{module name='privacy.build' privacy_item_id=$aForms.video_id privacy_module_id='video'}	
	{/if}
	</div>	
	
	{if !$sModule}

	{if Phpfox::isModule('privacy')}
	<div class="form-group">

		<div class="col-lg-6">
			<label>{phrase var='video.privacy'}:</label>
			<br>
			{module name='privacy.form' privacy_name='privacy' privacy_info='video.control_who_can_see_this_video' privacy_custom_id='js_custom_privacy_input_holder_video' default_privacy='video.display_on_profile'}
		</div>	

		{if Phpfox::isModule('comment')}
		
		<div class="col-lg-6">
			<label>{phrase var='video.comment_privacy'}:</label>
			<br>
			{module name='privacy.form' privacy_name='privacy_comment' privacy_info='video.control_who_can_comment_on_this_video' privacy_no_custom=true}			
		</div>

		{/if}

	</div>
	{/if}
		


	{/if}
	
	<div class="form-group">
		<div class="col-lg-12">
			<input type="submit" value="{phrase var='video.add'}" class="btn btn-lg btn-primary btn-block" />
		</div>	
	</div>
</form>
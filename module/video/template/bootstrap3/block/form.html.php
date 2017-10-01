<div class="table">
			<div class="table_left">
				<label>{required}{phrase var='video.video_title'}</label>
			</div>
			<div class="table_right">
				<input class="form-control" placeholder="{phrase var='video.video_title'}" type="text" name="val[title]" value="{value type='input' id='title'}" size="30" id="js_video_title" maxlength="200" />
			</div>
		</div>
		
		{if !isset($sModule) || $sModule == false}
		<div class="table">
			<div class="table_left">
				<label for="category">{phrase var='video.category'}:</label>
			</div>
			<div class="table_right">
				{$sCategories}
			</div>
		</div>
		{/if}
		<div class="table">
			<div class="table_left">
				<label>{phrase var='video.description'}</label>
			</div>
			<div class="table_right">
				<textarea class="form-control" placeholder="{phrase var='video.description'}" name="val[text]" class="js_edit_video_form form-control">{value id='text' type='textarea'}</textarea>		
			</div>
		</div>	
		{if Phpfox::isModule('tag') && Phpfox::getUserParam('tag.can_add_tags_on_blogs')}
			{if isset($sModule) && $sModule != ''}
				{module name='tag.add' sType=video_group}
			{else}
				{module name='tag.add' sType=video}
			{/if}

		{/if}
		
	<div id="js_custom_privacy_input_holder">
	{if isset($aForms.video_id)}
		{module name='privacy.build' privacy_item_id=$aForms.video_id privacy_module_id='video'}	
	{/if}
	</div>		
		
	{if (isset($sModule) && $sModule) || (isset($aForms) && $aForms.item_id > 0)}
	
	{else}


		{if Phpfox::isModule('privacy')}
		<div class="form-group">

			<div class="col-lg-6 col-md-6 col-xs-12">
				<label>{phrase var='video.privacy'}:</label>
				<br>
				{module name='privacy.form' privacy_name='privacy' privacy_info='video.control_who_can_see_this_video' default_privacy='video.display_on_profile'}
			</div>	

			{if Phpfox::isModule('comment')}
			
			<div class="col-lg-6 col-md-6 col-xs-12">
				<label>{phrase var='video.comment_privacy'}:</label>
				<br>
				{module name='privacy.form' privacy_name='privacy_comment' privacy_info='video.control_who_can_comment_on_this_video' privacy_no_custom=true}
			</div>

			{/if}

		</div>
    <div class="clear"></div>
    <hr class="invisible">
		{/if}


	{/if}
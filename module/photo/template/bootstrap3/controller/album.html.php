<div class="item_view">
	<div class="item_info">
		{$aForms.time_stamp|convert_time} {phrase var='photo.by_lowercase'} {$aForms|user:'':'':50}
	</div>
	{if ((Phpfox::getUserId() == $aForms.user_id && Phpfox::getUserParam('photo.can_edit_own_photo_album')) || Phpfox::getUserParam('photo.can_edit_other_photo_albums'))
		|| (Phpfox::getUserId() == $aForms.user_id && $aForms.profile_id == '0')
		|| ($aForms.profile_id == '0' && (((Phpfox::getUserId() == $aForms.user_id && Phpfox::getUserParam('photo.can_delete_own_photo_album')) || Phpfox::getUserParam('photo.can_delete_other_photo_albums'))))
	}
	<div class="btn-group">

		<button type="button" class="btn-xs btn btn-default dropdown-toggle" data-toggle="dropdown">
	    	<i class="icon-cogs"></i> {phrase var='photo.actions'}
	  	</button>
	  	<ul class="dropdown-menu">
	  		{template file='photo.block.menu-album'}
	  	</ul>
  	</div>
	{/if}

	{if Phpfox::getUserParam('photo.can_approve_photos') || Phpfox::getUserParam('photo.can_delete_other_photos')}
	{moderation}
	<br>
	{/if}

	{if !empty($aForms.description)}
	<div id="js_album_description" class="lead">
		{$aForms.description|clean}
		<hr>
	</div>
	{/if}
	
	<div id="js_album_content" class="mac-isotope2-wrapper">
		{template file='photo.block.photo-entry'}
	</div>
	
	<div {if $aForms.view_id != 0}style="display:none;" class="js_moderation_on"{/if}>
		{module name='feed.comment'}
	</div>	

</div>
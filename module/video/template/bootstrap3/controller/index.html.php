{if !Phpfox::isModule('pinvideo') || defined('PHPFOX_IS_PAGES_VIEW') || isset($aPage)}

	{if !count($aVideos)}

	<div class="alert alert-info">

		{phrase var='video.no_videos_found'}

	</div>

	{else}


	<div id="js_video_edit_form_outer" style="display:none;">
		<form method="post" action="#" onsubmit="$(this).ajaxCall('video.viewUpdate'); return false;">
			<div id="js_video_edit_form"></div>
			<div class="table_clear">
				<ul class="table_clear_button">
					<li><input type="submit" value="{phrase var='video.update'}" class="btn btn-primary" /></li>
					<li><a href="#" id="js_video_go_advanced" class="btn btn-default">{phrase var='video.go_advanced_uppercase'}</a></li>
					<li><a href="#" onclick="$('#js_video_edit_form_outer').hide(); $('#js_video_outer_body').show(); return false;" class="btn btn-link">{phrase var='video.cancel_uppercase'}</a></li>
				</ul>
				<div class="clear"></div>
			</div>
		</form>
	</div>

	<div id="js_video_outer_body" class="mac-isotope2-wrapper">

		{if Phpfox::getUserParam('video.can_approve_videos') || Phpfox::getUserParam('video.can_delete_other_video')}
		{moderation}
		{/if}
		<div class="clear"></div>
		
		<div class="row" id="mac-isotope2">
			{foreach from=$aVideos name=videos item=aVideo}
				{template file='video.block.entry'}
			{/foreach}
		</div>

		<div class="clear"></div>
		
		{pager}	

	</div>

	{/if}

{/if}
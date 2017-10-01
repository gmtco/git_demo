{if isset($sImageProp)}
<meta itemprop="thumbnail" content="{$sImageProp}" />
{/if}
{if !empty($aVideo.duration)}
<meta itemprop="duration" content="{$aVideo.duration}" />
{/if}

<div class="item_view">
	<div id="js_video_edit_form_outer" style="display:none;">
		<form method="post" action="#" onsubmit="$(this).ajaxCall('video.viewUpdate'); return false;">
			<div><input type="hidden" name="val[is_inline]" value="true" /></div>
			<div id="js_video_edit_form"></div>
			<div class="table_clear">
				<ul class="table_clear_button">
					<li><input type="submit" value="{phrase var='video.update'}" class="button" /></li>
					<li><a href="#" id="js_video_go_advanced" class="button_off_link">{phrase var='video.go_advanced_uppercase'}</a></li>
					<li><a href="#" onclick="$('#js_video_edit_form_outer').hide(); $('#js_video_outer_body').show(); return false;" class="button_off_link">{phrase var='video.cancel_uppercase'}</a></li>
				</ul>
				<div class="clear"></div>
			</div>
		</form>
	</div>
	
	<div id="js_video_outer_body">	
	
		{if $aVideo.in_process > 0}
		<div class="message">
			{phrase var='video.video_is_being_processed'}
		</div>
		{else}
		{if $aVideo.view_id == 2}
		<div class="message js_moderation_off" id="js_approve_video_message">
			{phrase var='video.video_is_pending_approval'}
		</div>
		{/if}
		{/if}	
	
	
		<div class="t_center">
		{if !empty($aVideo.vidly_url_id)}
			{if $aVideo.in_process == 0}
				<iframe frameborder="0" width="560" height="315" name="vidly-frame" src="//s.vid.ly/embeded.html?link={$aVideo.vidly_url_id}&amp;width=560&amp;height=315&autoplay=false"></iframe>
			{/if}
		{else}		
			{if isset($aVideo.youtube_video_url)}

				{if $bMacLoadMediaElement}
				<video width="640" height="360" id="mac-youtube-player" style="width: 100%; height: 100%;">
				    <source type="video/youtube" src="//www.youtube.com/watch?v={$aVideo.youtube_video_url}" />
				</video>
				{else}
				<iframe width="560" height="315" src="//www.youtube.com/embed/{$aVideo.youtube_video_url}{if Phpfox::getParam('video.disable_youtube_related_videos')}?rel=0{/if}" frameborder="0" allowfullscreen></iframe>
				{/if}

			{else}
				{if !$aVideo.in_process}
				{if $aVideo.is_stream}
					{$aVideo.embed_code}
				{else}
				<div id="js_video_player"{if $aVideo.in_process > 0} style="display:none;"{/if}></div>		
				{/if}
				{/if}
			{/if}
		{/if}
		</div>

		{if (($aVideo.user_id == Phpfox::getUserId() && Phpfox::getUserParam('video.can_edit_own_video')) || Phpfox::getUserParam('video.can_edit_other_video'))
			|| (($aVideo.user_id == Phpfox::getUserId() && Phpfox::getUserParam('video.can_delete_own_video')) || Phpfox::getUserParam('video.can_delete_other_video'))
			|| (Phpfox::getUserParam('video.can_sponsor_video') && !defined('PHPFOX_IS_GROUP_VIEW'))
			|| (Phpfox::getUserParam('video.can_approve_videos') && $aVideo.view_id == 2)
		}		
		<hr class="invisible">

		<div>
			{if (Phpfox::getUserParam('video.can_approve_videos') && $aVideo.view_id == 2)}
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">
					<i class="icon-spinner icon-spin"></i>
				</a>			
				<a href="#" class="btn btn-default btn-xs" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('video.approve', 'inline=true&amp;video_id={$aVideo.video_id}'); return false;">{phrase var='video.approve'}</a>
			{/if}
			{if $bCanDeleteVideo || $bCanEditVideo}
			<div class="dropdown">
				<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
					<i class="icon-cogs"></i> {phrase var='video.actions'}
				</a>		
				<ul class="dropdown-menu">
					{template file='video.block.menu'}
				</ul>
			</div>			
			{/if}
		</div>	
		{/if}
		
		<hr class="invisible">		
		<hr class="invisible">


		{module name='video.detail'}	
		<div {if $aVideo.view_id}style="display:none;" class="js_moderation_on"{/if}>
			
		<div class="video_rate_body">
			<div class="video_rate_display">
				{module name='rate.display'}
			</div>
			{if Phpfox::isModule('share')}
				<a href="#" class="video_view_embed">{phrase var='video.embed'}</a>
				<div class="video_view_embed_holder">
					<input name="#" value="{$aVideo.embed}" type="text" size="22" onfocus="this.select();" style="width:490px;" />	
				</div>
			{/if}
		</div>				
		
		{plugin call='video.template_default_controller_view_extra_info'}
		
		{module name='feed.comment'}
		</div>
	</div>
</div>
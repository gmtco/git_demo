<div class="music_rate_body">
	<div class="music_rate_display">
		{module name='rate.display'}
	</div>
</div>
<div class="item_view">
    <div class="item_info">
		{$aSong.time_stamp|convert_time} {phrase var='music.by_lowercase'} {$aSong|user:'':'':50}{if $aSong.album_id} {phrase var='music.in'} <a href="{permalink module='music.album' id=$aSong.album_id title=$aSong.album_url}" title="{$aSong.album_url|clean}">{$aSong.album_url|clean|shorten:50:'...'|split:50}</a>{/if}
    </div>
    
	{if $aSong.view_id != 0}
	<div class="message js_moderation_off" id="js_approve_message">
		{phrase var='music.song_is_pending_approval'}
	</div>
	{/if}    

	{if Phpfox::getUserParam('music.can_approve_songs')
		|| (($aSong.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_edit_own_song')) || Phpfox::getUserParam('music.can_edit_other_song'))
		|| ($aSong.user_id == Phpfox::getUserId() && Phpfox::getUserParam('music.can_delete_own_track')) || Phpfox::getUserParam('music.can_delete_other_tracks')
		|| (Phpfox::getUserParam('music.can_purchase_sponsor_song') && $aSong.user_id == Phpfox::getUserId())
	}
	<div>
		<div class="dropdown">
			{if $aSong.view_id != 0 && Phpfox::getUserParam('music.can_approve_songs')}
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
				<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('music.approveSong', 'inline=true&amp;id={$aSong.song_id}', 'GET'); return false;">{phrase var='music.approve'}</a>
			{/if}
			<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
				<i class="icon-cogs"></i> {phrase var='music.actions'}
			</a>		
			<ul class="dropdown-menu">
				{template file='music.block.menu'}
			</ul>			
		</div>
	</div>
	<hr class="invisible">	       
	{/if}

	{*<div id="js_music_player" style="height:30px; width:500px;"></div>*}
	
	<div id="js_controller_music_play_{$aSong.song_id}"></div>
	<audio autoplay="autoplay" controls="controls">
	<source src="{$aSong.song_path}" type="audio/mpeg">
	<a href="#" onclick="$.ajaxCall('music.playInFeed', 'id={$aSong.song_id}', 'GET'); $(this).hide(); return false;" title="{phrase var='music.play'}: {$aSong.title|clean phpfox_squote=true}">{img theme='misc/play_button.png' class='v_middle'}</a>
	</audio> 
	
	<div class="music_view_total_play">
		{phrase var='music.total_plays' total=$aSong.total_play|number_format}
	</div>	
	<div {if $aSong.view_id != 0}style="display:none;" class="js_moderation_on"{/if}>
		{module name='feed.comment'}
	</div>
</div>
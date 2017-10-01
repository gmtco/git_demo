<li id="js_controller_music_play_{$aSong.song_id}" class="js_music_store_album_holder"{if isset($phpfox.iteration.songs) && $phpfox.iteration.songs > 10} {/if}>
	<div class="block_listing_image">
		<a class="mac-play-audio no_ajax_link" href="#" title="{phrase var='feed.play'}" onclick="$.ajaxCall('macore.playInFeed', 'id={$aSong.song_id}', 'GET'); $(this).hide(); return false;"><i class="icon-play icon-3x"></i></a>
	</div>
	<div class="block_listing_title" style="padding-left:38px;">
		<a href="{permalink module='music' id=$aSong.song_id title=$aSong.title}" title="{$aSong.title|clean}">
		{$aSong.title|clean|shorten:50:'...'|split:50}
		</a>
		<div class="extra_info">
			{$aSong.time_stamp|convert_time}
		</div>
	</div>
	<div class="clear"></div>
</li>
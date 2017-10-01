<?php

if(isset($this->_aVars['aFeed']['feed_image'])) :

	$mac_old_feed_image = $this->_aVars['aFeed']['feed_image'];
	$mac_new_size = '_' . Phpfox::getParam('macore.mac_bootstrap_feed_image_size') . '.';

	if(is_array($mac_old_feed_image)) :

		foreach($mac_old_feed_image as $k => $v) :

			$v = str_replace('_100.', $mac_new_size, $v);
			$mac_old_feed_image[$k] = str_replace('_500.', $mac_new_size, $v);

		endforeach;

	else :

		$mac_old_feed_image = str_replace('_500.', $mac_new_size, $mac_old_feed_image);
	
	endif;

	$this->_aVars['aFeed']['feed_image'] = $mac_old_feed_image;

endif;

?>

{if !Phpfox::getService('profile')->timeline()}
	<div class="activity_feed_content">							
{/if}
	<div class="activity_feed_content_text{if isset($aFeed.comment_type_id) && $aFeed.comment_type_id == 'poll'} js_parent_module_feed_{$aFeed.comment_type_id}{/if}">
		
		{if !isset($aFeed.feed_mini) && !Phpfox::getService('profile')->timeline()}
			<div class="activity_feed_content_info">
				{$aFeed|user:'':'':50}{if !empty($aFeed.parent_module_id)} {phrase var='feed.shared'}{else}{if isset($aFeed.parent_user)} {img theme='layout/arrow.png' class='v_middle'} {$aFeed.parent_user|user:'parent_':'':50} {/if}{if !empty($aFeed.feed_info)} {$aFeed.feed_info}{/if}{/if}
			</div>
		{/if}

		{if !empty($aFeed.feed_mini_content)}
			<div class="activity_feed_content_status">
				<div class="activity_feed_content_status_left">
					<img src="{$aFeed.feed_icon}" alt="" class="v_middle" /> 
					{$aFeed.feed_mini_content} 
				</div>
				<div class="activity_feed_content_status_right">
					{template file='feed.block.link'}
				</div>
				<div class="clear"></div>
			</div>
		{/if}

		{if isset($aFeed.feed_status) && (!empty($aFeed.feed_status) || $aFeed.feed_status == '0')}
			<div class="activity_feed_content_status">
				{$aFeed.feed_status|feed_strip|shorten:200:'feed.view_more':true|split:55|max_line}	
				{if Phpfox::getParam('feed.enable_check_in') && Phpfox::getParam('core.google_api_key') != '' && isset($aFeed.location_name)} 
					<span class="js_location_name_hover" {if isset($aFeed.location_latlng) && isset($aFeed.location_latlng.latitude)}onmouseover="$Core.Feed.showHoverMap('{$aFeed.location_latlng.latitude}','{$aFeed.location_latlng.longitude}', this);"{/if}> - <a href="http://maps.google.com/maps?daddr={$aFeed.location_latlng.latitude},{$aFeed.location_latlng.longitude}" target="_blank">{phrase var='feed.at_location' location=$aFeed.location_name}</a>
					</span> 
				{/if}
			</div>
		{/if}

		<div class="activity_feed_content_link">				
			{if $aFeed.type_id == 'friend' && isset($aFeed.more_feed_rows) && is_array($aFeed.more_feed_rows) && count($aFeed.more_feed_rows)}
				{foreach from=$aFeed.more_feed_rows item=aFriends}
					{$aFriends.feed_image}
				{/foreach}
				{$aFeed.feed_image}
			{else}
			{if !empty($aFeed.feed_image)}
			{if $aFeed.type_id == 'music_album' || $aFeed.type_id == 'music_song'}
			<div id="js_controller_music_play_{$aFeed.song.song_id}"></div>
			{/if}
			<div class="activity_feed_content_image"{if isset($aFeed.feed_custom_width)} style="width:{$aFeed.feed_custom_width};"{/if}>
				{if is_array($aFeed.feed_image)}
					<ul class="activity_feed_multiple_image">
						{foreach from=$aFeed.feed_image item=sFeedImage}
							<li>{$sFeedImage}</li>
						{/foreach}
					</ul>
					<div class="clear"></div>
				{else}

					{if $aFeed.type_id == 'music_album' || $aFeed.type_id == 'music_song'}
					<a class="mac-play-audio" href="#" title="{phrase var='feed.play'}" onclick="$.ajaxCall('macore.playInFeed', 'id={$aFeed.song.song_id}', 'GET'); $(this).hide();$(this).parent().parent().find('.activity_feed_content_float').css('visibility', 'hidden'); return false;"><i class="icon-play icon-3x"></i></a>
					{elseif $aFeed.type_id == 'video'}
					<a href="{if isset($aFeed.feed_link_actual)}{$aFeed.feed_link_actual}{else}{$aFeed.feed_link}{/if}"{if !isset($aFeed.no_target_blank)} target="_blank"{/if} class="play_link no_ajax_link" onclick="$Core.box('macore.play', 700, 'id={$aFeed.custom_data_cache.video_id}&feed_id={$aFeed.feed_id}&popup=true', 'GET'); return false;">
						{$aFeed.feed_image}
						<span class="play_link_img">
							<i class="icon-youtube-play"></i>
						</span>
					</a>
					{else}
					<a href="{if isset($aFeed.feed_link_actual)}{$aFeed.feed_link_actual}{else}{$aFeed.feed_link}{/if}"{if !isset($aFeed.no_target_blank)} target="_blank"{/if} class="{if isset($aFeed.custom_css)} {$aFeed.custom_css} {/if}{if !empty($aFeed.feed_image_onclick)}{if !isset($aFeed.feed_image_onclick_no_image)}play_link {/if} no_ajax_link{/if}"{if !empty($aFeed.feed_image_onclick)} onclick="{$aFeed.feed_image_onclick}"{/if}{if !empty($aFeed.custom_rel)} rel="{$aFeed.custom_rel}"{/if}{if isset($aFeed.custom_js)} {$aFeed.custom_js} {/if}{if Phpfox::getParam('core.no_follow_on_external_links')} rel="nofollow"{/if}>
						{$aFeed.feed_image}
						{if !empty($aFeed.feed_image_onclick)}
						{if !isset($aFeed.feed_image_onclick_no_image)}
						<span class="play_link_img">
							<i class="icon-youtube-play"></i>
						</span>
						{/if}
						{/if}
					</a>
					{/if}
									
				{/if}
			</div>
			{/if}
			<div class="{if (!empty($aFeed.feed_content) || !empty($aFeed.feed_custom_html)) && empty($aFeed.feed_image)} activity_feed_content_no_image{/if}{if !empty($aFeed.feed_image)} activity_feed_content_float{/if}"{if isset($aFeed.feed_custom_width)} style="margin-left:{$aFeed.feed_custom_width};"{/if}>
				{if !empty($aFeed.feed_title)}
					{if isset($aFeed.feed_title_sub)}
						<span class="user_profile_link_span" id="js_user_name_link_{$aFeed.feed_title_sub|clean}">
					{/if}
					<a href="{if isset($aFeed.feed_link_actual)}{$aFeed.feed_link_actual}{else}{$aFeed.feed_link}{/if}" class="activity_feed_content_link_title"{if isset($aFeed.feed_title_extra_link)} target="_blank"{/if}{if Phpfox::getParam('core.no_follow_on_external_links')} rel="nofollow"{/if}>{$aFeed.feed_title|clean|split:30}</a>
					{if isset($aFeed.feed_title_sub)}
						</span>
					{/if}
					{if !empty($aFeed.feed_title_extra)}
						<div class="activity_feed_content_link_title_link">
							<a href="{$aFeed.feed_title_extra_link}" target="_blank"{if Phpfox::getParam('core.no_follow_on_external_links')} rel="nofollow"{/if}>{$aFeed.feed_title_extra|clean}</a>
						</div>
					{/if}
				{/if}			
				{if !empty($aFeed.feed_content)}
					<div class="activity_feed_content_display">
						{$aFeed.feed_content|feed_strip|shorten:200:'...'|split:55|max_line}				
					</div>
				{/if}
				{if !empty($aFeed.feed_custom_html)}
					<div class="activity_feed_content_display_custom">
						{$aFeed.feed_custom_html}
					</div>
				{/if}
				
				{if !empty($aFeed.parent_module_id)}
					{module name='feed.mini' parent_feed_id=$aFeed.parent_feed_id parent_module_id=$aFeed.parent_module_id}
				{/if}
				
			</div>	
			{if !empty($aFeed.feed_image)}
			<div class="clear"></div>
			{/if}		
			{/if}
		</div>
	</div><!-- // .activity_feed_content_text -->

	{if isset($aFeed.feed_view_comment)}			
		{module name='feed.comment'}
	{else}
		{template file='feed.block.comment'}
	{/if}

	{if $aFeed.type_id != 'friend'}
		{if isset($aFeed.more_feed_rows) && is_array($aFeed.more_feed_rows) && count($aFeed.more_feed_rows)}
			{if $iTotalExtraFeedsToShow = count($aFeed.more_feed_rows)}{/if}
			<a href="#" class="activity_feed_content_view_more" onclick="$(this).parents('.js_feed_view_more_entry_holder:first').find('.js_feed_view_more_entry').show(); $(this).remove(); return false;">{phrase var='feed.see_total_more_posts_from_full_name' total=$iTotalExtraFeedsToShow full_name=$aFeed.full_name|shorten:40:'...'}</a>			
		{/if}			
	{/if}
{if !Phpfox::getService('profile')->timeline()}
	</div><!-- // .activity_feed_content -->
{/if}
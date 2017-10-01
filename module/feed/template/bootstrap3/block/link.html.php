<div class="col-lg-12 {if true}mac-btn-group{else}btn-group btn-group-justified{/if}">
	
	{if Phpfox::isUser() 
		&& Phpfox::isModule('comment') 
		&& Phpfox::getUserParam('feed.can_post_comment_on_feed')
		&& Phpfox::getUserParam('comment.can_post_comments')
		&& (isset($aFeed.comment_type_id) && $aFeed.can_post_comment) 
		|| (!isset($aFeed.comment_type_id) && isset($aFeed.total_comment))
		}	

		<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" title="{phrase var='comment.add_comment'}" href="{$aFeed.feed_link}add-comment/" class="btn {if Phpfox::getParam('macore.mac_bootstrap_feed_link_class')}btn-link{else}btn-primary{/if} btn-xs {if (isset($sFeedType) && $sFeedType == 'mini') || (!isset($aFeed.comment_type_id) && isset($aFeed.total_comment))}{else}js_feed_entry_add_comment no_ajax_link{/if}">
			<i class="icon-comments"></i>{if !Phpfox::isMobile()} <span>{phrase var='feed.comment'}</span>{/if}
		</a>
	{/if}

	{if Phpfox::isModule('share') && !isset($aFeed.no_share)}
		{if $aFeed.privacy == '0'}
			{module name='share.link' type='feed' display='menu' url=$aFeed.feed_link title=$aFeed.feed_title sharefeedid=$aFeed.item_id sharemodule=$aFeed.type_id}
		{else}
			{module name='share.link' type='feed' display='menu' url=$aFeed.feed_link title=$aFeed.feed_title}
		{/if}
	{/if}

	{if Phpfox::isUser() && Phpfox::isModule('like') && isset($aFeed.like_type_id)}
		{if isset($aFeed.like_item_id)}
			{module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.like_item_id like_is_liked=$aFeed.feed_is_liked}
		{else}
			{module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.item_id like_is_liked=$aFeed.feed_is_liked}
		{/if}	
		{if Phpfox::isUser() 
			&& Phpfox::isModule('comment') 
			&& Phpfox::getUserParam('feed.can_post_comment_on_feed')
			&& (isset($aFeed.comment_type_id) && $aFeed.can_post_comment) 
			|| (!isset($aFeed.comment_type_id) && isset($aFeed.total_comment))
			}				

		{/if}
	{/if}

			
	{*
	disabled temporary until find way for edit plugin that add 
	links See all size and download link
	plugin call='feed.template_block_entry_2'
	*}

	{if Phpfox::isModule('report') && isset($aFeed.report_module) && isset($aFeed.force_report)}
		<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" href="#?call=report.add&amp;height=100&amp;width=400&amp;type={$aFeed.report_module}&amp;id={$aFeed.item_id}" class="btn {if Phpfox::getParam('macore.mac_bootstrap_feed_link_class')}btn-link{else}btn-primary{/if} btn-xs inlinePopup activity_feed_report" data-original-title="{$aFeed.report_phrase}">
			<i class="icon-flag"></i>{if !Phpfox::isMobile()} <span>{phrase var='feed.report'}</span>{/if}
		</a>			
	{/if}

	{if ((defined('PHPFOX_FEED_CAN_DELETE')) || (Phpfox::getUserParam('feed.can_delete_own_feed') && $aFeed.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('feed.can_delete_other_feeds'))}
	<a href="javascript:void(0);" data-placement="bottom" rel="tooltip" data-toggle="tooltip" title="{phrase var='feed.delete'}" class="mac-btn-delete-feed btn {if Phpfox::getParam('macore.mac_bootstrap_feed_link_class')}btn-link{else}btn-primary{/if} btn-xs" onclick="if (confirm(getPhrase('core.are_you_sure'))){l}$.ajaxCall('feed.delete', 'id={$aFeed.feed_id}{if isset($aFeedCallback.module)}&amp;module={$aFeedCallback.module}&amp;item={$aFeedCallback.item_id}{/if}', 'GET');{r} return false;">
		<i class="icon-remove"></i>{if !Phpfox::isMobile()} <span>{phrase var='feed.delete'}</span>{/if}
	</a>
	{/if}

    <a href="{$aFeed.feed_link}"
    title="{phrase var='macore.open_in_a_new_window'}"
    class="btn btn-xs {template file='macore.block.bootstrap3-btn-class'} mac-tooltip"
    data-placement="bottom">
    <i class="icon-fullscreen"></i> <span>{phrase var='macore.open'}</span>
    </a>


	{if isset($aFeed.time_stamp) && !Phpfox::getService('profile')->timeline()}
		<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" title="{phrase var='macore.open_in_a_new_window'}" class="pull-left btn btn-link btn-xs" href="{$aFeed.feed_link}">
			{$aFeed.time_stamp|convert_time:'feed.feed_display_time_stamp'}
			{if !empty($aFeed.app_link)} via {$aFeed.app_link}{/if}
		</a>
	{/if}
		
	{if !Phpfox::getService('profile')->timeline()}
		{if !isset($aFeed.feed_mini)}		
			{if $aFeed.privacy > 0}
			<a class="pull-right btn btn-link btn-xs" href="javascript:void(0);" data-placement="bottom" rel="tooltip" data-toggle="tooltip" title="{if Phpfox::isModule('privacy')}{$aFeed.privacy|privacy_phrase}{else}Privacy {$aFeed.privacy}{/if}">
				<i class="icon-eye-open"></i>
			</a>
			{/if}
		{/if}
	{/if}

</div>
<div class="clear"></div>	

{if PHPFOX_IS_AJAX && Phpfox::getLib('request')->get('theater') == 'true'}


{elseif isset($sFeedType) &&  $sFeedType == 'view'}
<div class="feed_share_custom mac-mrg-tp mac-share-links-wrap">	
	{if Phpfox::isModule('share') && Phpfox::getParam('share.share_twitter_link')}
		<div class="feed_share_custom_block"><a href="http://twitter.com/share" class="twitter-share-button" data-url="{$aFeed.feed_link}" data-count="horizontal" data-via="{param var='feed.twitter_share_via'}">{phrase var='feed.tweet'}</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
	{/if}
	{if Phpfox::isModule('share') && Phpfox::getParam('share.share_google_plus_one')}
	<div class="feed_share_custom_block">
		<g:plusone href="{$aFeed.feed_link}" size="medium"></g:plusone>
		{literal}
			<script type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		{/literal}
	</div>
	{/if}
	{if Phpfox::isModule('share') && Phpfox::getParam('share.share_facebook_like')}
		<div class="feed_share_custom_block">
			<iframe src="http://www.facebook.com/plugins/like.php?app_id=156226084453194&amp;href={if !empty($aFeed.feed_link)}{$aFeed.feed_link}{else}{url link='current'}{/if}&amp;send=false&amp;layout=button_count&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;width=90&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:140px; height:21px;" allowTransparency="true"></iframe>					
		</div>
	{/if}				
	<div class="clear"></div>
</div>
{/if}
<div id="js_comment_{$aComment.comment_id}" class="js_mini_feed_comment comment_mini js_mini_comment_item_{$aComment.item_id}">

		<div class="comment_mini_image">
			{if Phpfox::isMobile()}
				{img user=$aComment suffix='_50_square' max_width=32 max_height=32}
			{else}
				{img user=$aComment suffix='_50_square' max_width=32 max_height=32}
			{/if}
		</div>
		<div class="comment_mini_content">
			{$aComment|user:'':'':30}<div id="js_comment_text_{$aComment.comment_id}" class="comment_mini_text {if $aComment.view_id == '1'}row_moderate{/if}">{$aComment.text|feed_strip|shorten:'300':'comment.view_more':true|split:30|max_line}</div>			
			<div class="comment_mini_action">


					<span class="comment_mini_entry_time_stamp">
						{if isset($aComment.unix_time_stamp)}{$aComment.unix_time_stamp|convert_time:'comment.comment_time_stamp'}{else}{$aComment.time_stamp|convert_time:'comment.comment_time_stamp'}{/if}
					</span>


					{if (Phpfox::getUserParam('comment.delete_own_comment') && Phpfox::getUserId() == $aComment.user_id) || Phpfox::getUserParam('comment.delete_user_comment') || (defined('PHPFOX_IS_USER_PROFILE') && isset($aUser.user_id) && $aUser.user_id == Phpfox::getUserId() && Phpfox::getUserParam('comment.can_delete_comments_posted_on_own_profile'))
					|| (defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::getService('pages')->isAdmin('' . $aPage.page_id . ''))
					}
						<span>
							<a rel="tooltip" data-placement="bottom" data-original-title="{phrase var='comment.delete'}" href="#" class="btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" onclick="$.ajaxCall('comment.InlineDelete', 'type_id={$aComment.type_id}&amp;comment_id={$aComment.comment_id}{if defined('PHPFOX_IS_THEATER_MODE')}&photo_theater=1{/if}', 'GET'); return false;">
								<i class="icon-remove"></i>{if !Phpfox::isMobile()} <span>{phrase var='comment.delete'}</span>{/if}
							</a>
						</span>
					{elseif Phpfox::getUserParam('comment.can_delete_comment_on_own_item')&& isset($aFeed) && isset($aFeed.feed_link) && $aFeed.user_id == Phpfox::getUserId()}
						<span>
							<a rel="tooltip" data-placement="bottom" data-original-title="{phrase var='comment.delete'}" href="{$aFeed.feed_link}ownerdeletecmt_{$aComment.comment_id}/" class="btn {template file='macore.block.bootstrap3-btn-class'} btn-xs sJsConfirm">
								{if defined('PHPFOX_IS_THEATER_MODE')}
									<i class="icon-remove"></i>{if !Phpfox::isMobile()} <span>{phrase var='comment.delete'}</span>{/if}
								{else}
									<i class="icon-remove"></i>{if !Phpfox::isMobile()} <span>{phrase var='comment.delete_this_comment'}</span>{/if}
								{/if}
							</a>
						</span>
					{/if}
					

					
					{if !Phpfox::isMobile()}
						{if (Phpfox::getUserParam('comment.edit_own_comment') && Phpfox::getUserId() == $aComment.user_id) || Phpfox::getUserParam('comment.edit_user_comment')}
							<span>
								<a href="inline#?type=text&amp;&amp;simple=true&amp;id=js_comment_text_{$aComment.comment_id}&amp;call=comment.updateText&amp;comment_id={$aComment.comment_id}&amp;data=comment.getText" class="quickEdit btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" data-toggle="tooltip" rel="tooltip" data-placement="bottom" data-original-title="{phrase var='comment.edit'}">
									<i class="icon-edit"></i>{if !Phpfox::isMobile()} <span>{phrase var='comment.edit'}</span>{/if}
								</a>
							</span>
						{/if}
					{/if}				
					
					{if Phpfox::getParam('comment.comment_is_threaded') && Phpfox::getUserParam('feed.can_post_comment_on_feed')}
						{if (isset($aComment.iteration) && $aComment.iteration >= Phpfox::getParam('comment.total_child_comments')) || isset($bForceNoReply)}
						
						{else}
							<span>
                <a href="#" class="mac-link-dark js_comment_feed_new_reply btn {template file='macore.block.bootstrap3-btn-class'} btn-xs mac-tooltip" rel="{$aComment.comment_id}" data-placement="bottom" data-original-title="{phrase var='comment.reply'}">
                  <i class="icon-reply"></i>{if !Phpfox::isMobile()} <span>{phrase var='comment.reply'}</span>{/if}
                </a>
              </span>
						{/if}
					{/if}
					
					{if Phpfox::isModule('report') && Phpfox::getUserParam('report.can_report_comments')}
						{if $aComment.user_id != Phpfox::getUserId()}
							<span>
                <a href="#?call=report.add&amp;height=210&amp;width=400&amp;type=comment&amp;id={$aComment.comment_id}" class="mac-link-dark inlinePopup btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" rel="tooltip" data-placement="bottom" data-original-title="{phrase var='report.report_a_comment'}">
                  <i class="icon-flag"></i>{if !Phpfox::isMobile()} {phrase var='report.report'}{/if}
                </a>
              </span>
						{/if}
					{/if}						
					
					{module name='like.link' like_type_id='feed_mini' like_item_id=$aComment.comment_id like_is_liked=$aComment.is_liked like_is_custom=true}

					{if Phpfox::getUserParam('comment.can_moderate_comments') && $aComment.view_id == '1'}
						<span>
							<a class="btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" href="#" onclick="$('#js_comment_text_{$aComment.comment_id}').removeClass('row_moderate'); $(this).remove(); $.ajaxCall('comment.moderateSpam', 'id={$aComment.comment_id}&amp;action=approve&amp;inacp=0'); return false;">
              					{phrase var='comment.approve'}
              				</a>					
						</span>
					{/if}	



			{if Phpfox::getParam('like.allow_dislike')}
			<span class="js_dislike_link_holder"{if $aComment.total_dislike == 0} style="display:none;"{/if}>
				<a rel="tooltip" data-placement="bottom" data-original-title="{if $aComment.total_dislike == 1}{phrase var='comment.1_person'}{else}{phrase var='comment.total_people' total=$aComment.total_dislike|number_format}{/if} dislike this" href="#" id="js_dislike_mini_a_{$aComment.comment_id}" onclick="return  $Core.box('like.browse', 400, 'type_id=feed_mini&amp;item_id={$aComment.comment_id}&amp;dislike=1');">
					<i class="icon-thumbs-down"></i>
				</a>
			</span>
			{/if}
  
			<span class="js_like_link_holder"{if $aComment.total_like == 0} style="display:none;"{/if}>
				<a rel="tooltip" data-placement="bottom" data-original-title="{if $aComment.total_like == 1}{phrase var='comment.1_person'}{else}{phrase var='comment.total_people' total=$aComment.total_like|number_format}{/if} like this" href="#" onclick="return $Core.box('like.browse', 400, 'type_id=feed_mini&amp;item_id={$aComment.comment_id}');">
					<i class="icon-thumbs-up"></i>
				</a>
			</span>



				<div class="clear"></div>
			</div>
		</div>		
		<div id="js_comment_form_holder_{$aComment.comment_id}" class="js_comment_form_holder"></div>

		<div class="comment_mini_child_holder{if isset($aComment.children) && $aComment.children.total > 0} comment_mini_child_holder_padding{/if}">
			{if isset($aComment.children) && $aComment.children.total > 0}
				<div class="comment_mini_child_view_holder" id="comment_mini_child_view_holder_{$aComment.comment_id}">
					<a href="#" onclick="$.ajaxCall('comment.viewAllComments', 'comment_type_id={$aComment.type_id}&amp;item_id={$aComment.item_id}&amp;comment_id={$aComment.comment_id}', 'GET'); return false;">{phrase var='comment.view_total_more' total=$aComment.children.total|number_format}</a>
				</div>
			{/if}
			<div id="js_comment_children_holder_{$aComment.comment_id}" class="comment_mini_child_content">				
				{if isset($aComment.children) && count($aComment.children.comments)}
					{foreach from=$aComment.children.comments item=aCommentChilded}
						{module name='comment.mini' comment_custom=$aCommentChilded}
						<div id="js_feed_like_holder_{$aCommentChilded.comment_id}"> 
							{module name='like.displayactions' aChildFeed=$aCommentChilded}
						</div>
					{/foreach}
				{else}
					<div id="js_feed_like_holder_{$aComment.comment_id}"> </div>
				{/if}			
				
			</div>
		</div>		
		
	</div>
<li class="list-group-item mac-forum-list-box">
{item name='CreativeWork'}
	<meta itemprop="dateCreated" content="{$aThread.time_stamp|micro_time}" />
	 <meta itemprop="interactionCount" content="Replies:{$aThread.total_post|number_format}" />
	 <meta itemprop="interactionCount" content="Views:{$aThread.total_view|number_format}" />
	
	<div class="row">

		<div class="mac_forum_mini_{$aThread.css_class} col-lg-2 col-2 js_selector_class_{$aThread.thread_id} checkRow table_row{if $aThread.is_announcement} forum_announcement{/if}{if $aThread.order_id == 1} forum_sticky {elseif $aThread.order_id == 2 && !defined('PHPFOX_IS_GROUP_VIEW')} forum_sponsor {/if}{if $aThread.view_id} row_moderate{/if}">
			
			{img user=$aThread suffix='_50_square'}			
			<div class="clear"></div>
			{$aThread.css_class_phrase}
			<br>
			{if Phpfox::getUserParam('forum.can_approve_forum_thread') || Phpfox::getUserParam('forum.can_delete_other_posts')}
			<a href="#{$aThread.thread_id}" class="moderate_link" rel="forum">
				{phrase var='forum.moderate'}
			</a>
			<div class="clear"></div>
			{/if}

		</div>

		<div class="col-lg-6 col-6">
			{if $aThread.order_id == 1}
				<span class="forum_tag_sticky">{phrase var='forum.sticky'}</span>: 
			{/if}				
			<h2 itemprop="name">
				<a href="{permalink module='forum.thread' id=$aThread.thread_id title=$aThread.title}" class="forum_thread_link{if $aThread.css_class == 'new'} forum_thread_link_new{/if}" itemprop="url">
					{$aThread.title|clean|split:40|shorten:100:'...'}
				</a>
			</h2>
			<div class="extra_info_link">
				{phrase var='forum.by_full_name_on_time' full_name=$aThread|user:'':'':50:'':'author' time=$aThread.time_stamp|convert_time}
			</div>
		</div>

		{if !$aThread.is_announcement}
		{if !Phpfox::isMobile()}
		<div class="col-lg-4 col-4">

			<div class="extra_info">
				<ul class="extra_info_middot">
					{if $aThread.poll_id}
					<li>
						<span class="js_hover_title">
						{img theme='misc/chart_bar.png' class='v_middle'}
						<span class="js_hover_info">
							{phrase var='forum.this_thread_contains_a_poll'}</span>
						</span>
					</li>
					{/if}
					<li>
						{phrase var='forum.replies'}: {$aThread.total_post|number_format}
					</li>
					<li>&middot;</li>
					<li>{phrase var='forum.views'}: {$aThread.total_view|number_format}</li>
				</ul>
			</div>
	
			<a href="{permalink module='forum.thread' id=$aThread.thread_id title=$aThread.title}post_{$aThread.post_id}/">
				{$aThread.time_update|date:'forum.forum_time_stamp'}
			</a>

			<div class="extra_info_link">
				{phrase var='forum.by'} {if $aThread.last_user_id}{$aThread|user:'last_':'':'user.maximum_length_for_full_name'}{else}{$aThread|user:'':'':'user.maximum_length_for_full_name'}{/if}	
			</div>
		</div>
		{/if}
		{/if}
	</div>
{/item}
</li>
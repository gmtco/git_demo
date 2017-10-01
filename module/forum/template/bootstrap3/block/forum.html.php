<li class="list-group-item mac-forum-list-box">

	{item name='Thing'}

		<div class="row">

			<div class="col-lg-1 col-1 text-center">			
				{if $aForum.is_closed}
				<a href="" data-placement="right" rel="tooltip" data-toggle="tooltip" title="{phrase var='forum.forum_is_closed_for_posting'}">
					<i class="icon-bar-circle"></i>
				</a>
				{else}
					{if $aForum.is_seen}
						<a href="" data-placement="right" rel="tooltip" data-toggle="tooltip" title="{phrase var='forum.forum_contains_no_new_posts'}">
							<i class="icon-circle-blank"></i>
						</a>
					{else}
						<a href="" data-placement="right" rel="tooltip" data-toggle="tooltip" title="{phrase var='forum.forum_contains_new_posts'}">
							<i class="icon-circle"></i>
						</a>
					{/if}
				{/if}
				<br>
				<span class="badge">{$aForum.is_seen}</span>
			</div>		

			<div class="col-lg-8 col-6">
				<h2 itemprop="name">
					<a href="{permalink module='forum' id=$aForum.forum_id title=$aForum.name}"{if !empty($aForum.description)} title="{$aForum.description|parse}" {/if} class="forum_title_link" itemprop="url">
					{$aForum.name|clean|convert}
					</a>
				</h2>					
				<div class="extra_info">
					<ul class="extra_info_middot">						
						<li class="badge">{phrase var='forum.threads'}: {$aForum.total_thread|number_format}</li>
						<li class="badge">{phrase var='forum.posts'}: {$aForum.total_post|number_format}</li>
					</ul>
				</div>
				{if isset($aForum.moderators)}
					{phrase var='forum.moderated_by'}: {foreach from=$aForum.moderators name=moderators item=aModerator}<span class="badge">{$aModerator|user}</span>{/foreach}
				{/if}
			</div>

			{if !Phpfox::isMobile() && !empty($aForum.thread_title)}
			<div class="col-lg-3 col-5">
				<a style="display:block" href="{if $aForum.post_id}{permalink module='forum.thread' id=$aForum.thread_id title=$aForum.thread_title_url}post_{$aForum.post_id}/{else}{permalink module='forum.thread' id=$aForum.thread_id title=$aForum.thread_title_url}{/if}" title="{$aForum.thread_title|clean}">
					{$aForum.thread_title|clean|shorten:50:'...'}
				</a>

				<div class="badge">
					{phrase var='forum.by_full_name_on_time' full_name=$aForum|user:'':'':30|shorten:'8':'...' time=$aForum.thread_time_stamp|convert_time}
				</div>					
			</div>	
			{/if}

		</div>
	{/item}
	</li>
{if !$bIsSearch && $aPermissions.can_view_thread_content.value == 1}
	{if $aCallback === null}
		{if !$aForumData.is_closed && Phpfox::getUserParam('forum.can_add_new_thread') || Phpfox::getService('forum.moderate')->hasAccess('' . $aForumData.forum_id . '', 'add_thread')}
			<div class="">
				<a class="btn btn-primary btn-block" href="{url link='forum.post.thread' id=$aForumData.forum_id}">
					{phrase var='forum.new_thread'}
				</a>
			</div>
		{/if}
	{else}
		<div class="">
			<a class="btn btn-primary btn-block" href="{url link='forum.post.thread' module=$aCallback.module_id item=$aCallback.item_id}">
				{phrase var='forum.new_thread'}
			</a>
		</div>
	{/if}	
{/if}
<hr class="invisible">
{if count($aThreads)}

{if !$bIsSearch}

<div class="forum_header_menu">

	<ul class="nav nav-pills mac-boot-megamenu">	

		{if Phpfox::isUser()}
		<li class="dropdown pull-right">
			<a data-toggle="dropdown" href="#">
				{phrase var='forum.forum_tools'} <i class="icon-arrow-down"></i>
			</a>
			<ul class="dropdown-menu">
			{if $aCallback === null}
				<li>
					<a href="{url link='forum.read' forum=$aForumData.forum_id}">
						{phrase var='forum.mark_this_forum_read'}
					</a>
				</li>
			{else}
				<li>
					<a href="{url link='forum.read' module=$aCallback.module_id item=$aCallback.item_id}">
						{phrase var='forum.mark_this_forum_read'}
					</a>
				</li>
			{/if}
			</ul>
		</li>
		{/if}

		<li class="dropdown pull-right">
			<a data-toggle="dropdown" href="#">
				{phrase var='forum.search_this_forum'} <i class="icon-arrow-down"></i>
			</a>
			<div class="dropdown-menu">
				<form class="form-horizontal mac-form-form-search-menu" method="post" action="{if $aCallback !== null}{url link='forum.search' module=$aCallback.module_id item=$aCallback.item_id}{else}{url link='forum.search'}{/if}">
				{if $aCallback === null}
				<div><input type="hidden" name="search[forum][]" value="{$aForumData.forum_id}" /></div>
				{else}
				<div><input type="hidden" name="search[item_id]" value="{$aCallback.item_id}" /></div>
				{/if}
				<div class="input-group">
					<input type="text" name="search[keyword]" value="" class="form-control" /> 
					<span class="input-group-btn">
						<input name="search[submit]" type="submit" value="Go" class="btn btn-default" />
					</span>
				</div>
				<br>
				<div class="">
					<label>
						<input type="radio" name="search[result]" value="0" class="v_middle checkbox" checked="checked" /> 
						{phrase var='forum.show_threads'}
					</label>
					<label>
						<input type="radio" name="search[result]" value="1" class="v_middle checkbox" /> 
						{phrase var='forum.show_posts'}
					</label>
				</div>
				</form>
				<br>
	
					{if $aCallback === null}				
					<a class="btn btn-default btn-xs btn-block" href="{url link='forum.search' id=$aForumData.forum_id}">
						{phrase var='forum.advanced_search'}
					</a>
					{else}
					<a class="btn btn-default btn-xs btn-block" href="{url link='forum.search' module=$aCallback.module_id item=$aCallback.item_id}">
						{phrase var='forum.advanced_search'}
					</a>
					{/if}
			
			</div>
		</li>		
		<li>
			<a href="{if $aCallback === null}{url link='forum.rss' forum=$aForumData.forum_id}{else}{url link='forum.rss' pages=$aCallback.item_id}{/if}" title="{phrase var='forum.subscribe_to_this_forum'}" class="no_ajax_link">
				<i class="icon-rss"></i>
			</a>
		</li>
	</ul>
	<div class="clear"></div>
</div>
{/if}

{/if}

{if $aCallback === null && !$bIsSearch}
{template file='forum.block.entry'}
{/if}

{if !$bIsSearch && count($aAnnouncements)}
<div class="alert alert-info">
	{phrase var='forum.announcements'}
</div>
{foreach from=$aAnnouncements item=aThread}
	{template file='forum.block.thread-entry'}
{/foreach}
{/if}

{if count($aThreads)}

{if isset($bResult) && $bResult}

<div class="table_info">
	{phrase var='forum.posts'}
</div>

<ul class="list-group">
{foreach from=$aThreads item=aPost}
	{template file='forum.block.post'}
{/foreach}
</ul>

{else}
<div class="panel panel-default">
	
	<div class="panel-heading">
		<h3 class="panel-title">{phrase var='forum.threads'}</h3>
	</div>

	<div class="panel-body">
		<ul class="list-group">
			{foreach from=$aThreads item=aThread}
			{template file='forum.block.thread-entry'}
			{/foreach}
		</ul>
	</div>
</div>
{/if}

{if !isset($bIsPostSearch) && (Phpfox::getUserParam('forum.can_approve_forum_thread') || Phpfox::getUserParam('forum.can_delete_other_posts'))}
{moderation}
{/if}
{pager}

{if !$bIsSearch}
{if $aCallback === null}	
{if !$aForumData.is_closed && Phpfox::getUserParam('forum.can_add_new_thread') || Phpfox::getService('forum.moderate')->hasAccess('' . $aForumData.forum_id . '', 'add_thread')}
	<div class="sub_menu_bar_main_bottom">
		<a class="btn btn-primary btn-block" href="{url link='forum.post.thread' id=$aForumData.forum_id}">
			{phrase var='forum.new_thread'}
		</a>
	</div>
{/if}
{else}
	<div class="sub_menu_bar_main_bottom">
		<a class="btn btn-primary btn-block" href="{url link='forum.post.thread' module=$aCallback.module_id item=$aCallback.item_id}">
			{phrase var='forum.new_thread'}
		</a>
	</div>
{/if}
{/if}

{if !$bIsTagSearch}
{*
<div style="display:none;">
	<h3>{phrase var='forum.display_options'}</h3>
	<form method="post" action="{if $bIsSearch} {else}{permalink module='forum' id=$aForumData.forum_id title=$aForumData.name}{/if}">
		{if $aCallback !== null}
		<div><input type="hidden" name="search[item_id]" value="{$aCallback.item_id}" /></div>
		{/if}
		{if $bIsSearch}
		<div style="display:none;">
			{$aFilters.keyword}
			{$aFilters.user}
			{$aFilters.result}
			{foreach from=$aForumResults item=iForumId}
				<input type="hidden" name="search[forum][]" value="{$iForumId}" />
			{/foreach}
		</div>
		{/if}
		<div class="go_left">
			{phrase var='forum.display'}:
			<div class="p_2">
		 		{$aFilters.display}
			</div>
		</div>
		<div class="go_left">
			{phrase var='forum.from'}:
			<div class="p_2">
		 		{$aFilters.days_prune}
			</div>
		</div>	
		<div class="go_left">
		 	{phrase var='forum.sort'}:
		 	<div class="p_2">
		 		{$aFilters.sort}
		 	</div>
	 	</div>
	 	<div class="go_left">
		 	{phrase var='forum.by'}:
		 	<div class="p_2">
				{$aFilters.sort_by}
			</div>
		</div>	
		<br class="clear_left" />
		<div class="main_break"></div>	
		
		<input type="submit" name="{if $bIsSearch}search[submit]{else}display{/if}" value="{phrase var='forum.submit'}" class="btn btn-default" />
	</form>
</div>
*}
{/if}

{else}
<div class="alert alert-info">
<i class="icon-info"></i>
{if $bIsSearch}
	{phrase var='forum.nothing_found'}
{else}
	{phrase var='forum.no_threads_found'}
{/if}
</div>
{/if}

{if $aCallback === null}
{module name='forum.jump'}
{/if}
{if $aCallback === null && count($aForums)}

	{foreach from=$aForums name=forums item=aForum}

	{if $aForum.is_category}

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">
					<a href="{permalink module='forum' id=$aForum.forum_id title=$aForum.name}"{if !empty($aForum.description)} title="{$aForum.description|parse}"{/if}>
						{$aForum.name|clean|convert}
					</a>
				</h3>	
			</div>

			{if count($aForum.sub_forum)}
			<div class="panel-body">
				<ul class="list-group">
				{foreach from=$aForum.sub_forum item=aForum}
					{template file='forum.block.forum'}
				{/foreach}
				</ul>
			</div>

			{/if}

		</div>

	{else}

		<div class="panel panel-default">

			<div class="panel-heading">
				<h3 class="panel-title">
				{if !isset($bIsSubForum) && $phpfox.iteration.forums == 1}
					{phrase var='forum.forums'}
				{else}
					{if isset($bIsSubForum)}
					{phrase var='forum.sub_forum'}: {$aForumData.name|clean|convert} &raquo; {$aForum.name|clean|convert}
					{/if}
				{/if}
				</h3>
			</div>

			<div class="panel-body">
				<ul class="list-group">
				{template file='forum.block.forum'}
				</ul>
			</div>

		</div>

	{/if}

	{/foreach}

{/if}
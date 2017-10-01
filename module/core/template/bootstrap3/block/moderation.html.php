<form method="post" action="{url link='current'}" id="js_global_multi_form_holder">
	{if !empty($sCustomModerationFields)}
	{$sCustomModerationFields}
	{/if}
	<div id="js_global_multi_form_ids">{$sInputFields}</div>
	<div class="moderation_holder panel dropdown">
		{*if !$iTotalInputFields disabled="disabled" /if*}
		<a href="#" class="dropdown-toggle btn btn-default btn-xs moderation_drop{if !$iTotalInputFields} not_active{/if}" data-toggle="dropdown">
			{phrase var='core.with_selected'} <strong class="js_global_multi_total">{$iTotalInputFields}</strong>
		</a>	

		<ul class="dropdown-menu">

			<li>
				<a href="#" class="moderation_clear_all">
					{phrase var='core.clear_all_selected'}
				</a>
			</li>

			{foreach from=$aModerationParams.menu item=aModerationMenu}
			<li>
				<a href="#{$aModerationMenu.action}" class="moderation_process_action" rel="{$aModerationParams.ajax}">
					{$aModerationMenu.phrase}
				</a>
			</li>
			{/foreach}

		</ul>

		<a href="#" class="moderation_action moderation_action_select btn btn-primary btn-sm" rel="select">
			<i class="icon-ok"></i> {phrase var='core.select_all'}
		</a>
		<a href="#" class="moderation_action moderation_action_unselect btn btn-default btn-sm" rel="unselect">
			<i class="icon-remove"></i> {phrase var='core.un_select_all'}
		</a>
		
		<span class="moderation_process"><i class="icon-spinner icon-spin icon-2x"></i></span>

	</div>
</form>
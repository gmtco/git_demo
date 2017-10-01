<div class="js_shoutbox_messages media">

	{if Phpfox::getUserParam('shoutbox.can_delete_all_shoutbox_messages')}
	<div class="mac_shoutbox_delete">
		<a href="#" onclick="if (confirm('{phrase var='shoutbox.are_you_sure' phpfox_squote=true}')) {left_curly} $(this).parents('.js_shoutbox_messages:first').remove(); $.ajaxCall('shoutbox.delete', 'id={$aShoutout.shout_id}&amp;module={$aShoutout.module}'); {right_curly} return false;" title="{phrase var='shoutbox.delete_this_shoutout'}">
			<i class="icon-remove"></i>
		</a>
	</div>
	{/if}

	<span class="pull-left">
		{img user=$aShoutout suffix='_50_square' max_width=50 max_height=50 class="media-object"}
	</span>

	<div class="media-body">
		<h4 class="media-heading">{$aShoutout|user:'':'':30}</h4>
		{$aShoutout.text}
		<br>
		<div class="mac_shoutbox_date">{$aShoutout.time_stamp|date:'shoutbox.shoutbox_time_stamp'}</div>
	</div>

</div>
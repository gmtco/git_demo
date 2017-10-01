{if $aEvent.view_id == '1'}
<div class="alert alert-info">
	<a class="close" href="#" data-dismiss="alert">&times;</a>
	{phrase var='event.event_is_pending_approval'}
</div>
{/if}

{if ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event')
	|| ($aEvent.view_id == 0 && ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event'))
	|| ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_edit_own_event')) || Phpfox::getUserParam('event.can_edit_other_event')
	|| ($aEvent.user_id == Phpfox::getUserId() && Phpfox::getUserParam('event.can_delete_own_event')) || Phpfox::getUserParam('event.can_delete_other_event')
}
<div>
	<div class="dropdown">
	{if (Phpfox::getUserParam('event.can_approve_events') && $aEvent.view_id == '1')}
		<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">
			<i class="icon-spinner icon-spin"></i>
		</a>			
		<a href="#" class="btn btn-default btn-xs" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('event.approve', 'inline=true&amp;event_id={$aEvent.event_id}'); return false;">{phrase var='event.approve'}</a>
	{/if}
		<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
			<i class="icon-cogs"></i> {phrase var='event.actions'}
		</a>	
		<ul class="dropdown-menu">
			{template file='event.block.menu'}
		</ul>			
	</div>
</div>
{/if}
{plugin call='event.template_default_controller_view_extra_info'}
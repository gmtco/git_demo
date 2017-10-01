<li class="dropdown mac-notify-box">

	<span class="holder_notify_count" id="js_total_new_friend_requests">0</span>
	
	<a href="javascript:void(0);" class="mac-notify-link friend_notification notify_drop_link mac-tooltip" title="{phrase var='friend.friend_requests'}" data-placement="bottom" rel="friend.getRequests">
		<i class="icon-group"></i> {if Phpfox::isMobile()}<span>{phrase var='friend.friend_requests'}</span>{/if}
	</a>
	
	<div class="dropdown-menu mac-friend-drop">
		<div class="holder_notify_drop">
			<div class="holder_notify_drop_content">
				<div class="holder_notify_drop_title">{phrase var='friend.friend_requests'}</div>
				<div class="holder_notify_drop_data">
					<div class="holder_notify_drop_loader">
						<i class="icon-spinner icon-spin icon-2x"></i>
					</div>													
				</div>
			</div>											
		</div>									
	</div>
</li>
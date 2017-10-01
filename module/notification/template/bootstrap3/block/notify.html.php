<li class="dropdown mac-notify-box">

	<span class="holder_notify_count" id="js_total_new_notifications">0</span>
	
	<a href="javascript:void(0);" class="mac-notify-link notification notify_drop_link mac-tooltip" title="{phrase var='notification.notifications'}" data-placement="bottom" rel="notification.getAll">
		<i class="icon-globe"></i> {if Phpfox::isMobile()}<span>{phrase var='notification.notifications'}</span>{/if}
	</a>
	
	<div class="dropdown-menu mac-notification-drop">
		<div class="holder_notify_drop">
			<div class="holder_notify_drop_content">
				<div class="holder_notify_drop_title">
					{phrase var='notification.notifications'}
				</div>
				<div class="holder_notify_drop_data">
					<div class="holder_notify_drop_loader">
						<i class="icon-spinner icon-spin icon-2x"></i>
					</div>													
				</div>
			</div>											
		</div>	
	</div>
</li>
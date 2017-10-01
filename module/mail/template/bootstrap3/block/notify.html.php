<li class="dropdown mac-notify-box">
	<span class="holder_notify_count" id="js_total_new_messages">0</span>

	<a href="javascript:void(0);" class="message notify_drop_link mac-notify-link mac-tooltip" title="{phrase var='mail.messages_notify'}" data-placement="bottom" rel="mail.getLatest">
		<i class="icon-envelope"></i> {if Phpfox::isMobile()}<span>{phrase var='mail.messages_notify'}</span>{/if}
	</a>

	<div class="dropdown-menu mac-mail-drop">

		<div class="holder_notify_drop">
			<div class="holder_notify_drop_content">

				<div class="holder_notify_drop_title">
					{phrase var='mail.messages_notify'}			
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
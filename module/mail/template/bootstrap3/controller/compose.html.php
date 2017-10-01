{$sCreateJs}

<div id="js_ajax_compose_error_message"></div>
<div>
	{if PHPFOX_IS_AJAX}	
		<form class="mac-form-compose-mail form-horizontal" method="post" action="{url link='mail.compose'}" id="js_form_mail" onsubmit="{plugin call='mail.template_controller_compose_ajax_onsubmit'} $Core.processForm('#js_mail_compose_submit'); $(this).ajaxCall('mail.composeProcess'); return false;">
	{else}
		<form class="mac-form-compose-mail form-horizontal" method="post" action="{url link='mail.compose'}" id="js_form_mail" onsubmit="{$sGetJsForm}">
	{/if}
	
	{if isset($iPageId)}
		<div><input type="hidden" name="val[page_id]" value="{$iPageId}"></div>
		<div><input type="hidden" name="val[sending_message]" value="{$iPageId}"></div>
	{/if}
	
	{token}
	<div><input type="hidden" name="val[attachment]" class="js_attachment" value="{value type='input' id='attachment'}" /></div>
	{if isset($bIsThreadForward) && $bIsThreadForward}
	<div><input type="hidden" name="val[forwards]" value="{$sThreadsToForward}" /></div>
	<div><input type="hidden" name="val[forward_thread_id]" value="{$sForwardThreadId}" /></div>
	{/if}
	{if PHPFOX_IS_AJAX && isset($aUser.user_id)}
	<div><input type="hidden" name="id" value="{$aUser.user_id}" /></div>
	<div><input type="hidden" name="val[to][]" value="{$aUser.user_id}" /></div>
	{else}
		<div class="form-group">
			<div class="col-lg-12">	
			<div id="js_mail_search_friend_placement" style="width:410px;"></div>
			<div id="js_mail_search_friend"></div>
			<script type="text/javascript">
			var bRun = true;
			$Behavior.loadSearchFriendsCompose = function()
			{l}
				bRun = false;
				{if Phpfox::getUserParam('mail.restrict_message_to_friends') == true}
					$Core.searchFriends({l}
						'id': '#js_mail_search_friend',
						'placement': '#js_mail_search_friend_placement',
						'width': '{if Phpfox::isMobile()}90%{else}400px{/if}',
						'max_search': 10,
						'input_name': 'val[to]',
						'default_value': '{phrase var='mail.search_friends_by_their_name'}',
						'inline_bubble': true
					{r});		
				{else}
					$Core.searchFriends({l}
						'id': '#js_mail_search_friend',
						'placement': '#js_mail_search_friend_placement',
						'width': '{if Phpfox::isMobile()}90%{else}400px{/if}',
						'max_search': 10,
						'input_name': 'val[to]',
						'default_value': '{phrase var='mail.search_friends_by_their_name'}',
						'inline_bubble': true,
						'is_mail' : true
					{r});		
				{/if}	
			{r}
			// if (bRun)$Behavior.loadSearchFriendsCompose();
			</script>				
			</div>
		</div>
	{/if}

		{if !Phpfox::getParam('mail.threaded_mail_conversation')}
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="icon-envelope"></i></span>
				<input class="form-control" placeholder="{phrase var='mail.subject'}" type="text" name="val[subject]" id="subject" value="{if isset($iPageId)}{phrase var='mail.claiming_page_title' title=$aPage.title}{else}{value type='input' id='subject'}{/if}" size="40" tabindex="1" />
			</div>
		</div>
		{/if}

		<div class="form-group">
			<div class="col-xs-12" id="js_compose_new_message">
				{if PHPFOX_IS_AJAX}
				{editor id='message' rows='2' tabindex='2'}
				{else}
				{editor id='message'}
				{/if}
			</div>
		</div>
		
		{if Phpfox::isModule('captcha') && Phpfox::getUserParam('mail.enable_captcha_on_mail')}
			{module name='captcha.form' sType='mail'}
		{/if}


		{if !Phpfox::getParam('mail.threaded_mail_conversation')}
		<div class="checkbox">
			<label>
				<input type="checkbox" name="val[copy_to_self]" value="1" />
				{phrase var='mail.send_a_copy_to_myself'}
			</label>
		</div>
		{/if}
		
		<div class="form-group">
			<div class="col-lg-12">
			{if PHPFOX_IS_AJAX}	
			<div id="js_mail_compose_submit">

				<input type="submit" value="{phrase var='mail.submit'}" class="btn btn-primary btn-block" />

			</div>			
			{else}
				<input type="submit" value="{phrase var='mail.send'}" class="btn btn-primary btn-block" />
			{/if}
			</div>
		</div>
		
	</form>
</div>


{if isset($sMessageClaim)}
	<script type="text/javascript">
		$('#js_compose_new_message #message').html('{$sMessageClaim}');
	</script>
{/if}
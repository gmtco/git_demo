{if Phpfox::getParam('mail.threaded_mail_conversation')}
<div class="alert alert-info">
	{phrase var='mail.you_are_viewing_a_message_that_is_from_our_legacy_inbox'}
</div>	
{/if}
<div class="item_info">
	<ul class="extra_info_middot">
		<li>&middot;</li>
		<li>{$aMail.time_stamp|convert_time}</li>
		<li>&middot;</li>
		<li>
			<div class="pull-left mac-tooltip-html" rel="tooltip" data-placement="top" data-toggle="tooltip" data-original-title='{if $aMail.owner_user_id == Phpfox::getUserId()}{if $aMail.owner_user_id == $aMail.viewer_user_id && $aMail.owner_user_id == Phpfox::getUserId()}{phrase var='mail.this_message_was_sent_from_you'}{else}{phrase var='mail.this_message_was_sent_to_full_name' full_name=$aMail|user:'viewer_'}{/if}{elseif $aMail.owner_user_id != 0}{phrase var='mail.this_message_was_sent_from_full_name' full_name={$aMail|user:'owner_'}{else}{phrase var='mail.this_message_was_sent_from_full_name' full_name=$sSite}{/if}'>
			{if $aMail.owner_user_id == Phpfox::getUserId()}
				{if $aMail.owner_user_id == $aMail.viewer_user_id && $aMail.owner_user_id == Phpfox::getUserId()}
				{phrase var='mail.you'}
				{else}
				{$aMail|user:'viewer_'}
				{/if}	
			{elseif $aMail.owner_user_id != 0}
				{$aMail|user:'owner_'}
			{else}
				{phrase var='mail.site_sent_you_a_message' site=$sSite}
			{/if}		
			</div>
		</li>
	</ul>
</div>

	<div class="item_bar">
		<div class="mail_next_prev">
			<ul>
				{if $iNextId != ""}
					<li>
						<a href="{url link='mail.view' id=$iNextId}">
							<i class="icon-chevron-sign-left icon-2x"></i> {phrase var='mail.previous'}
						</a>
					</li>
				{/if}
				{if $iPrevId != ""}
					<li>
						<a href="{url link='mail.view' id=$iPrevId}">
							<i class="icon-chevron-sign-right icon-2x"></i> {phrase var='mail.next'} 
						</a>
					</li>
				{/if}
			</ul>
			<div class="clear"></div>
		</div>

		{if !Phpfox::getParam('mail.threaded_mail_conversation')}
		<div class="dropdown">
			<a href="#" data-toggle="dropdown" class="btn btn-default btn-xs">
				<i class="icon-cogs"></i> {phrase var='mail.actions'}
			</a>	
			<ul class="dropdown-menu">				
				{if Phpfox::isModule('report') && $aMail.owner_user_id != Phpfox::getUserId()}
				<li>
					<a href="#?call=report.add&amp;height=210&amp;width=400&amp;type=mail&amp;id={$aMail.mail_id}" class="inlinePopup" title="{phrase var='mail.report_this_message'}">
						<i class="icon-flag"></i> {phrase var='mail.report'}
					</a>
				</li>
				{/if}			
				<li>
					<a href="{url link='mail' action='delete' id=$aMail.mail_id}" onclick="return confirm('{phrase var='mail.are_you_sure' phpfox_squote=true}')">
						<i class="icon-remove"></i> {phrase var='mail.delete'}
					</a>
				</li>
			</ul>				
		</div>		
		{/if}

	</div>

	{if isset($bMass)}
	<div class="p_top_8">
		{phrase var='mail.mass_message_to'}: 
		{foreach from=$aMails name=mass item=aMass}{if $phpfox.iteration.mass != 1}, {/if}{$aMass|user}{/foreach}
	</div>
	{/if}
	<div>
		{$aMail.text|parse|split:100}
		{if $aMail.parent_id && $aMail.text_reply}
		<div class="well well-sm">
			{$aMail.text_reply|parse|split:80}
		</div>
		{/if}
	</div>

	{if isset($aAttachments)}
	{module name='attachment.list' sType='mail' attachments=$aAttachments}
	{/if}

	{if Phpfox::getParam('mail.threaded_mail_conversation')}
		
	{else}
	{if $aMail.viewer_user_id == Phpfox::getUserId() && $aMail.owner_user_id != 0}
	<br />
	{$sCreateJs}
	<form method="post" action="{url link='mail.view' id=$aMail.mail_id}" id="js_form_mail" onsubmit="{$sGetJsForm}">
		<div><input type="hidden" name="val[parent_id]" value="{$aMail.mail_id}" /></div>
		<div><input type="hidden" name="val[attachment]" class="js_attachment" value="{value type='input' id='attachment'}" /></div>
		<div class="table">
			<div class="table_left">
				<label for="message">{phrase var='mail.reply'}</label>
			</div>
			<div class="table_right" id="js_mail_textarea">
				{editor id='message' rows='8'}
			</div>
		</div>
		<div class="table_clear">
			<input type="submit" value="{phrase var='mail.send'}" class="btn btn-primary btn-block" id="js_mail_submit" />
		</div>
	</form>
	{/if}
	{/if}
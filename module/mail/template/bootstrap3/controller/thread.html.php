<div id="js_main_mail_thread_holder">
	
	<div>
		<div class="dropdown">
			<a data-toggle="dropdown" href="#" class="btn btn-default btn-xs">
				<i class="icon-cogs"></i> {phrase var='mail.actions'}
			</a>	
			<ul class="dropdown-menu">				
				{if Phpfox::isModule('report')}
				<li>
					<a href="#?call=report.add&amp;height=210&amp;width=400&amp;type=mail&amp;id={$aThread.thread_id}" class="inlinePopup" title="{phrase var='mail.report_this_message'}">
						<i class="icon-flag"></i> {phrase var='mail.report'}
					</a>
				</li>
				{/if}			
				{if isset($aThread.user_is_archive) && $aThread.user_is_archive}				
				<li class="item_delete">
					<a href="{url link='mail' action='unarchive' id=$aThread.thread_id}" onclick="return confirm('{phrase var='mail.are_you_sure' phpfox_squote=true}')">
						<i class="icon-stackexchange"></i> {phrase var='mail.unarchive'}
					</a>
				</li>				
				{else}
				<li class="item_delete">
					<a href="{url link='mail' action='archive' id=$aThread.thread_id}" onclick="return confirm('{phrase var='mail.are_you_sure' phpfox_squote=true}')">
						<i class="icon-archive"></i> {phrase var='mail.archive'}
					</a>
				</li>
				{/if}

				{if Phpfox::getParam('macajaxmail.enable_physical_delete_of_conversation')}			
				<li class="item_delete">
					<a href="{url link='mail' action='forcedelete' id=$aThread.thread_id}" 
						onclick="return confirm('{phrase var='mail.are_you_sure' phpfox_squote=true}')">
						{phrase var='mail.delete_conversation'}
					</a>
				</li> 
				{else}
				<li class="item_delete">
					<a href="#" 
						onclick="if(confirm('Are you sure?')){l} 
						$.ajaxCall('macajaxmail.forcedelete', 'id={$aThread.thread_id}', ''); return false;{r}else{l} return false;{r}">
						{phrase var='mail.delete_conversation'}
					</a>
				</li>
				{/if}	

			</ul>				
		</div>		
	</div>	
	
	<div id="js_mail_thread_current_cnt">
		{$sCurrentPageCnt}
	</div>
	<br />
	<div id="feed_view_more_loader">
		<i class="icon-spinner icon-spin"></i>
	</div>	
	{if count($aMessages) >= 10}
	<a href="#" id="js_mail_thread_view_more" class="global_view_more no_ajax_link btn btn-default btn-block mac-mrg-btm" rel="{$aThread.thread_id}">{phrase var='mail.view_more'}</a>
	{/if}
	<div id="mail_threaded_view_more_messages"></div>
	{foreach from=$aMessages name=messages item=aMail}
	{template file='mail.block.entry'}
	{/foreach}
	<div id="mail_threaded_new_message"></div>
	<div id="mail_threaded_new_message_scroll"></div>
	<div class="mail_thread_form_holder">
		<div class="mail_thread_form_holder_inner">		
			{$sCreateJs}
			<form class="mac-form-mail-thread" method="post" action="{url link='mail.thread' id=$aThread.thread_id}" id="js_form_mail" onsubmit="if ({$sGetJsForm}) {l} $Core.addThreadMail(this); {r} return false;">
				<div><input type="hidden" name="val[thread_id]" value="{$aThread.thread_id}" /></div>
				<div><input type="hidden" name="val[attachment]" class="js_attachment" value="{value type='input' id='attachment'}" /></div>
				<div class="table" id="js_mail_textarea">
					{editor id='message' rows='8'}
				</div>
				<div class="table_clear">
					<input type="submit" value="{phrase var='mail.send'}" class="btn btn-primary" id="js_mail_submit" />
					
					{if Phpfox::isModule('macajaxmail')}
				    <label>{phrase var='macajaxmail.press_enter_to_send'} <input type="checkbox" name="js_chkbox_send" id="js_chkbox_send" class="checkbox" /></label>
					{/if}
					
				</div>
			</form>
		</div>
	</div>	
	
	{moderation}
	
</div>

{if Phpfox::isModule('macajaxmail')}
<script type="text/javascript">
$Behavior.macInitOnPressEnter = function() {l}
	$('input#js_chkbox_send').on('ifChecked', function(event)
	{l}
		$Core.macIsCheckedPressEnter();
	{r});
	$('input#js_chkbox_send').on('ifUnchecked', function(event)
	{l}
		$Core.macIsUncheckedPressEnter();
	{r});
{r}
</script>
{/if}
<?php
/*

bootstrapped by

 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
?>

{if $bCanSendEmails}
<script type="text/javascript">
{literal}
	function sendEmails(oObj)
	{
		$('#js_send_email_error_message').hide();
		
		if (empty($('#js_share_email').val()))
		{
			$('#js_send_email_error_message').show();
			
			return false;
		}
		$('#btnShareEmail').attr('disabled', 'disabled');
		$('#imgShareEmailLoading').show();
		$(oObj).ajaxCall('share.sendEmails');
		
		return false;
	}
{/literal}
</script>
<div>	
	<form class="mac-form-share-by-email form-horizontal" method="post" action="#" onsubmit="return sendEmails(this);">
		<div class="p_4">
			
			<div id="js_send_email_error_message" class="alert alert-danger" style="display:none;">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{phrase var='share.provide_an_e_mail_address'}
			</div>
			
			<div class="input-group">
			  <span class="input-group-addon"><i class="icon-envelope"></i></span>
			  <input class="form-control" placeholder="{phrase var='share.separate_multiple_emails_with_a_comma'}" type="text" name="val[to]" size="30" id="js_share_email" value="" />
			</div>

			{if $iEmailLimit > 0}
			<br>
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				{phrase var='share.max_emails_limit' limit=$iEmailLimit}
			</div>
			{/if}
	
			<br>

			<div class="input-group">
			  <span class="input-group-addon"><i class="icon-info"></i></span>
			  <input class="form-control" placeholder="{phrase var='share.subject'}" type="text" name="val[subject]" size="30" value="{phrase var='share.check_out'} {$sTitle|clean}" />
			</div>	

			<br>

			<div class="form-group">
				<div class="col-lg-12">
					<textarea placeholder="{phrase var='share.message'}" class="form-control" rows="10" name="val[message]">{$sMessage}</textarea>
				</div>
			</div>

			<div class="table_clear">
				<input type="submit" id="btnShareEmail" value="{phrase var='share.send'}" class="btn btn-primary btn-block" />
				<i class="icon-spinner icon-spin" style="display:none" id="imgShareEmailLoading"></i>
			</div>

		</div>		
	</form>
</div>
{else}
<div class="label_flow p_4">	
	<div class="alert alert-danger">
		{phrase var='share.you_are_unable_to_send_any_more_emails_we_have_a_limit_of_how_many_emails_can_be_sent_each_hour_br_current_limit_limit' limit=$iEmailLimit}
	</div>
</div>
{/if}
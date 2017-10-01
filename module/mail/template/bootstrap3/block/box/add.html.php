<div class="error_message" id="js_mail_folder_add_error" style="display:none;"></div>
<form method="post" action="#" onsubmit="$Core.processForm('#js_mail_folder_add_submit'); $(this).ajaxCall('mail.addFolder'); return false;">
	<input placeholder="{phrase var='mail.enter_the_name_of_your_custom_folder'}" class="form-control" type="text" name="add_folder" value="" size="40" /> 
	<div class="alert alert-info mac-mrg-tp">
		<a class="close" href="#" data-dismiss="alert">&times;</a>
		{phrase var='mail.enter_the_name_of_your_custom_folder'}
	</div>
	<div class="p_top_4" id="js_mail_folder_add_submit">
		<ul class="table_clear_button">
			<li><input type="submit" value="{phrase var='mail.submit'}" class="btn btn-primary" /></li>
			<li class="table_clear_ajax"></li>
		</ul>
		<div class="clear"></div>
	</div>
</form>
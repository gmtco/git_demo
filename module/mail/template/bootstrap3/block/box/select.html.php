<div class="alert alert-danger" id="js_mail_move_error" style="display:none;"></div>
<form method="post" action="#" onsubmit="$Core.processForm('#js_mail_move_submit'); $('#js_global_multi_form_holder').ajaxCall('mail.move', 'folder=' + $('#js_mail_move_folder').val()); return false;">
	<select class="form-control" name="val[folder]" id="js_mail_move_folder">
		<option value="">{phrase var='mail.select'}:</option>
		<option value="0">{phrase var='mail.inbox'}</option>
		<option value="trash">{phrase var='mail.trash'}</option>
		
		<optgroup label="{phrase var='mail.custom_folders'}">			
		{foreach from=$aFolders item=aFolder}
			<option value="{$aFolder.folder_id}">{$aFolder.name|clean}</option>
		{/foreach}
		</optgroup>
	</select>
	<div class="p_top_4" id="js_mail_move_submit">
		<ul class="table_clear_button">
			<li>
				<input type="submit" value="{phrase var='mail.submit'}" class="btn btn-primary" />
			</li>
			<li class="table_clear_ajax"></li>
		</ul>
		<div class="clear"></div>
	</div>
</form>
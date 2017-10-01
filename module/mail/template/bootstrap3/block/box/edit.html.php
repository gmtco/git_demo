<form method="post" action="{url link='current'}" id="js_edit_folder_form">
{foreach from=$aFolders item=aFolder}
<div class="p_4" id="js_edit_input_folder_{$aFolder.folder_id}">
	<input class="form-control" type="text" name="val[name][{$aFolder.folder_id}]" value="{$aFolder.name|clean}" size="20" /> 
	<a href="#?call=mail.deleteFolder&amp;id={$aFolder.folder_id}" class="delete_link" title="{phrase var='mail.delete'}">
		{img theme='misc/delete.gif' alt='Delete' class='delete_hover'}
	</a>
</div>
{/foreach}
<div class="p_4">
	<input type="button" value="{phrase var='mail.update'}" class="btn btn-primary" id="js_submit_update_folder" /> 
	<input type="button" value="{phrase var='mail.cancel'}" class="btn btn-default" id="js_cancel_edit_folder" /> 
	<span id="js_process_form_image"></span>
</div>
</form>
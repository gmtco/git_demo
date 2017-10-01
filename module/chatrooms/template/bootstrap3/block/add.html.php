<form method="post" action="{url link='chatrooms.add'}">
	<div class="table">
		<div class="table_left">
			{phrase var='chatrooms.chatroom_title_form'}:
            <br />
            <small style="font-size:10px">{phrase var='chatrooms.add_title_label'}</small>
		</div>
		<div class="table_right">
            <input class="form-control" type="text" name="val[chatroom_title]" value="{$aLinkForEdit.chatroom_title}" id="chatroom_title" size="55" maxlength="255" />
		</div>

		<div class="clear" style="height:20px"></div>

		<div class="table_left">
		    {phrase var='chatrooms.chatroom_description'}:
            <br />
            <small style="font-size:10px">{phrase var='chatrooms.add_description_label'}</small>
		</div>

		<div class="table_right">
            <textarea class="form-control" name="val[chatroom_description]" id="chatroom_description">{$aLinkForEdit.chatroom_description}</textarea>
		</div>

		<div class="clear" style="height:20px"></div>
		<div class="table_left">
		{phrase var='chatrooms.protected_by_password'}	
            <br />
            <small style="font-size:10px">{phrase var='chatrooms.add_here_password_for_chatroom_label'}</small>
		</div>
		<div class="table_right">
            <input class="form-control" type="text" name="val[password]" value="{$aLinkForEdit.password}" id="password" size="55" maxlength="255" />
		</div>

		<div class="table_left">
			{phrase var='chatrooms.is_active_chatroom'}:
            <br />
            <small style="font-size:10px">{phrase var='chatrooms.enable_disable_chatroom'}</small>
		</div>
		<div class="table_right">
		    <select class="form-control" name="val[is_active]" id="is_active">
				<option value="">{phrase var='chatrooms.select_enable_disable'}:</option>
				<option value="1"{if $aLinkForEdit.is_active == '1'} selected{/if}>{phrase var='chatrooms.enable_chatroom'}</option>
				<option value="0"{if $aLinkForEdit.is_active == '0'} selected{/if}>{phrase var='chatrooms.disable_chatroom'}</option>
			</select>
		</div>


	</div>

	<div class="table_clear">
        {if $isEdit == 1}
        <input type="submit" value="{phrase var='chatrooms.update_chatrooms'}" class="button" name="val[update]" />
        <input type="hidden" value="{$aLinkForEdit.chatroom_id}" name="val[chatroom_id]" />
        {else}
        <input type="submit" value="{phrase var='chatrooms.add_new_chatrooms'}" class="button" name="val[addnew]" />
        {/if}
	</div>
</form>
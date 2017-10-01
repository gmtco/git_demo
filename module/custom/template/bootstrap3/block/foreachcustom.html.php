{if isset($aCustomField.fields)}
	{foreach from=$aCustomField.fields item=aField}
		<div class="row mac-mrg-btm-2x">
			<div class="col-xs-12">
					<label>{phrase var=$aField.phrase_var_name}</label>
			</div>
			<div class="col-xs-12 mac-mrg-tp">
					{if $aField.var_type == 'textarea' || $aField.var_type == 'text'}
						<input type="text" class="form-control js_custom_search" name="custom[{$aField.field_id}]" value="{value id=''$aField.field_id'' type='input'}" size="25" />
					{elseif $aField.var_type == 'select'}
					 <!-- custom input type select -->
						<select name="custom[{$aField.field_id}]" class="form-control js_custom_search">
							<option value="">{phrase var='user.any'}</option>
										{foreach from=$aField.options item=aOption}
							<option value="{$aOption.option_id}"{value parent=''$aField.field_id'' id=''$aOption.option_id'' type='select' default=''$aOption.option_id''}>{phrase var=$aOption.phrase_var_name}</option>
										{/foreach}
						</select>
					{elseif $aField.var_type == 'multiselect'}
						<!-- custom input type multi select -->
						<select name="custom[{$aField.field_id}][]" multiple class="form-control js_custom_search" >
							<option value="">{phrase var='user.any'}</option>
								{foreach from=$aField.options item=aOption}
									<option value="{$aOption.option_id}"{value parent=''$aField.field_id'' id=''$aOption.option_id'' type='multiselect' default=''$aOption.option_id''}>{phrase var=$aOption.phrase_var_name}</option>
								{/foreach}
						</select>
					{elseif $aField.var_type == 'radio'}
					
						{foreach from=$aField.options item=aOption}
						<label><input type="radio" name="custom[{$aField.field_id}]" value="{$aOption.option_id}"{value id=''$aOption.option_id'' type='radio' default=''$aOption.option_id''} class="js_custom_search mac-icheck">
						{phrase var=$aOption.phrase_var_name} </label><br />
						{/foreach}
					{elseif $aField.var_type == 'checkbox'}
						{foreach from=$aField.options item=aOption}
						<label><input type="checkbox" name="custom[{$aField.field_id}][{$aOption.option_id}]" value="{$aOption.option_id}"{value id=''$aOption.option_id'' parent=''$aField.field_id'' type='checkbox' default=''$aOption.option_id''} class="js_custom_search v_middle mac-icheck"> 
						{phrase var=$aOption.phrase_var_name}</label>
						<br />
						{/foreach}
					{/if}
			</div>
		</div>
	{/foreach}
{/if}
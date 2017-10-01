{foreach from=$aCustomMain item=aCustom}
{if $sTemplate == 'info'}
	{if !empty($aCustom.value)}
	<div class="list-group-item">
		<span class="badge">{phrase var=$aCustom.phrase_var_name}</span>
		{module name='custom.entry' data=$aCustom template=$sTemplate edit_user_id=$aUser.user_id}			
	</div>		
	{/if}
{elseif !empty($aCustom.value)}
	<div class="list-group-item">
		{module name='custom.block' data=$aCustom template=$sTemplate edit_user_id=$aUser.user_id}
	</div>
{/if}
{/foreach}
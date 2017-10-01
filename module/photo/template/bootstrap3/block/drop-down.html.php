<select class="form-control" {if $bMultiple}name="val{if isset($aForms.photo_id)}[{$aForms.photo_id}]{/if}[category_id][]" multiple="multiple" size="8"{else}name="val[category_id]"{/if}>
{if !$bMultiple}
	<option value="">Select:</option>
{/if}
	{$sCategories}
</select>
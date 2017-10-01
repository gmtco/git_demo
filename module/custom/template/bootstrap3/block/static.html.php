<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
		<label>{phrase var=$aField.phrase_var_name}</label>
	</div>
	<div class="col-lg-12 col-md-12 col-xs-12 mac-mrg-tp">
		{if $aField.var_type == 'textarea'}
			<textarea class="form-control" name="static[{$aField.field_id}]"></textarea>
		{/if}
	</div>
</div>
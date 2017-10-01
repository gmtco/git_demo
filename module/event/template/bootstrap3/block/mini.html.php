<div style="display:none;">{select_date prefix='end_' start_year='current_year' end_year='+1' field_separator=' / ' field_order='MDY' default_all=true add_time=true start_hour='+4' time_separator='event.time_separator'}</div>

<div class="block_event_sub">
{select_date prefix='start_' start_year='current_year' end_year='+1' field_separator=' / ' field_order='MDY' default_all=true add_time=true start_hour='+1' time_separator='event.time_separator'}
</div>

<div class="block_event_sub">
<div id="js_quick_event_default_where" style="display:none;">{phrase var='event.where'}</div>

<div class="input-group">
	<span class="input-group-addon"><i class="icon-map-marker"></i></span>
	<input class="form-control block_event_form_input block_event_form_input_off" type="text" name="val[location]" value="" placeholder="{phrase var='event.where'}" onfocus="$(this).removeClass('block_event_form_input_off');" />
</div>

</div>

<div class="block_event_sub">
<input type="submit" class="btn btn-primary" value="{phrase var='event.create_event'}" />
</div>
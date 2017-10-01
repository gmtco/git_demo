{if $bCanReport}
<div id="js_report_body">
{phrase var='report.you_are_about_to_report_a_violation_of_our_a_href_link_target_blank_terms_of_use_a' link=$sTermsUrl}
<div class="p_4">
	{phrase var='report.all_reports_are_strictly_confidential'}
	<form class="mac-form-report">

		<div class="form-group">
			<label for="js_report">{phrase var='report.reason'}</label>
			<select class="form-control" name="reason" id="js_report">
			<option value="">{phrase var='report.choose_one'}</option>
			{foreach from=$aOptions item=aOption}
				<option value="{$aOption.report_id}">{$aOption.message|convert}</option>
			{/foreach}
			</select>
		</div>

		<div class="form-group">
			<textarea placeholder="{phrase var='report.a_comment_optional'}" class="form-control" name="feedback" id="feedback" cols="19" rows="3"></textarea>
		</div>

		<div class="form-group">		
			<input type="button" value="{phrase var='core.submit'}" class="btn btn-block btn-primary" onclick="if ( ($('#js_report').val() != '' || $('#feedback').val() != '' ) && confirm('{phrase var='core.are_you_sure' phpfox_squote=true}')) {left_curly} $.ajaxCall('report.insert', 'id={$iItemId}&amp;type={$sType}&amp;report=' + $('#js_report').val() + '&feedback='+$('#feedback').val()); tb_remove(); {right_curly}" />
		</div>

	</form>

</div>
</div>
{else}
{phrase var='report.you_have_already_reported_this_item'}
{/if}
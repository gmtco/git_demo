<div class="global_attachment_holder_section" id="global_attachment_video">	
	<div><input type="hidden" name="val[video_inline]" value="1" /></div>
	<div class="table">
		<div class="table_right">
			<input class="form-control" placeholder="{phrase var='video.title'}" type="text" name="val[video_title]" style="width:90%;" id="js_form_video_title" />
		</div>
	</div>
	<div class="table">
		<div class="table_right">	
			<div><input type="file" name="video" id="global_attachment_video_file_input" value="" onchange="$bButtonSubmitActive = true; $('.activity_feed_form_button .button').removeClass('button_not_active'); $Core.resetActivityFeedErrorMessage();" /></div>
		</div>
	</div>
</div>
{literal}
<script type="text/javascript">
$Behavior.video_block_share_activityfeedcompleted = function()
{
	$ActivityFeedCompleted.resetVideoForm = function()
	{
		$('#js_form_video_title').val('');
		$('#global_attachment_video_file_input').val('');
	}
};
</script>
{/literal}
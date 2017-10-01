<div class="global_attachment_holder_section" id="global_attachment_music">	
	<div><input type="hidden" name="val[iframe]" value="1" /></div>
	<div><input type="hidden" name="val[method]" value="simple" /></div>	
	<div class="input-group">
		<span class="input-group-addon"><i class="icon-music"></i></span>
		<input placeholder="{phrase var='music.title'}" class="form-control" type="text" name="val[music_title]" id="js_form_music_title" />
	</div>
	<div class="form-group mac-mrg-tp">
		<input type="file" name="mp3" id="global_attachment_music_file_input" value="" onchange="$bButtonSubmitActive = true; $('.activity_feed_form_button .button').removeClass('button_not_active'); $Core.resetActivityFeedErrorMessage();" />
	</div>
</div>
{literal}
<script type="text/javascript">
$Behavior.feedResetMusicForm = function()
{
	$ActivityFeedCompleted.resetMusicForm = function()
	{
		$('#js_form_music_title').val('');
		$('#global_attachment_music_file_input').val('');
	}
}
</script>
{/literal}
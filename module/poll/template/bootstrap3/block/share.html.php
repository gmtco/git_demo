<div class="global_attachment_holder_section" id="global_attachment_poll">
	
	<div class="input-group">
		<span class="input-group-addon"><i class="icon-question"></i></span>
		<input placeholder="{phrase var='poll.question'}" class="form-control" type="text" name="val[poll_question]" value="" onchange="if (empty(this.value)) {l} $bButtonSubmitActive = false; $('.activity_feed_form_button .button').addClass('button_not_active'); {r} else {l} $bButtonSubmitActive = true; $('.activity_feed_form_button .button').removeClass('button_not_active'); {r}" />
	</div>

	<br class="clear">

	<div class="form-group">

		<div class="col-xs-12">
			<ol class="js_poll_feed_answer poll_feed_answer">
			{for $i = 1; $i <= 2; $i++}
			<li>
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-question"></i></span>
					<input placeholder="{phrase var='poll.answers'}" type="text" name="val[answer][][answer]" value="" size="30" class="js_feed_poll_answer form-control" />
				</div>
			</li>
			{/for}
			</ol>
			<br class="clear">
			<a href="#" id="macJsAppendPollFeedAnswer" class="btn btn-default pull-right poll_feed_answer_add">
				<i class="icon-plus"></i> {phrase var='poll.add_another_answer'}
			</a>
		</div>

	</div>	
	<div class="clear"></div>

</div>
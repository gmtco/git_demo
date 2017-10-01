<div>
	<form method="post" action="#" onsubmit="$(this).ajaxCall('feed.share'); return false;">
		<div><input type="hidden" name="val[parent_feed_id]" value="{$iFeedId}" /></div>
		<div><input type="hidden" name="val[parent_module_id]" value="{$sShareModule|clean}" /></div>
		{* phrase var='share.share' *} 
		<select class="form-control input-lg" name="val[post_type]" onchange="if (this.value == '1') {l} $('#js_feed_share_friend_holder').hide(); {r} else {l} $('#js_feed_share_friend_holder').show(); {r}">
			<option value="1">{phrase var='share.on_your_wall'}</option>
			<option value="2">{phrase var='share.on_a_friend_s_wall'}</option>
		</select>

		<div class="p_top_8" id="js_feed_share_friend_holder" style="display:none;">
			<div id="js_feed_share_friend_placement" style="width:410px;"></div>
			<div id="js_feed_share_friend"></div>
			<script type="text/javascript">
			var bRun = true;
			$Behavior.loadSearchFriendsCompose = function()
			{l}
				bRun = false;					
				$Core.searchFriends({l}
					'id': '#js_feed_share_friend',
					'placement': '#js_feed_share_friend_placement',
					'width': '100%',
					'max_search': 10,
					'input_name': 'val[friends]',
					'default_value': '{phrase var='mail.search_friends_by_their_name'}',
					'inline_bubble': true
				{r});							
			{r}
			</script>
		</div>

		<div class="p_top_8">
			<textarea placeholder="Say something about this post..." class="form-control input-lg" name="val[post_content]" onkeydown="if($(this).val().length > 0) {l} $('#mac-btn-share-a-post').removeAttr('disabled'); {r} else {l} $('#mac-btn-share-a-post').attr('disabled', 'true'); {r}" onkeyup="if($(this).val().length > 0) {l} $('#mac-btn-share-a-post').removeAttr('disabled'); {r} else {l} $('#mac-btn-share-a-post').attr('disabled', 'true'); {r}" onfocus="if($(this).val().length > 0) {l} $('#mac-btn-share-a-post').removeAttr('disabled'); {r} else {l} $('#mac-btn-share-a-post').attr('disabled', 'true'); {r}"></textarea>
		</div>
		<div class="p_top_8">
			<input type="submit" value="{phrase var='share.post'}" class="btn btn-primary btn-block btn-lg" id="mac-btn-share-a-post" disabled />
		</div>
	</form>
</div>
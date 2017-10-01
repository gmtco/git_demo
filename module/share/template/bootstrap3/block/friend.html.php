<script type="text/javascript">
{literal}
	function shareFriendContinue()
	{
		var iCnt = 0;
		$('.js_cached_friend_name').each(function()
		{
			iCnt++;
		});
		
		if (!iCnt)
		{
			{/literal}
			alert('{phrase var='share.need_to_select_some_friends_before_we_try_to_send_the_message' phpfox_squote=true}');
			{literal}
			return false;
		}
		
		$('#js_friend_search').hide();
		$('#js_friend_mail').show();
		
		return false;
	}
{/literal}
</script>
<div>	

	<div id="js_friend_search">
	
		{module name='friend.search' friend_share=true input='to'}

		<div class="main_break t_right">
			<input type="button" value="{phrase var='share.continue'}" class="btn btn-primary btn-lg btn-block" onclick="return shareFriendContinue();" />
		</div>		
	</div>

	<div id="js_friend_mail" style="display:none;">
		<form class="mac-form-share-by-email form-horizontal" method="post" action="#" onsubmit="$(this).ajaxCall('share.sendFriends'); return false;">
			<div id="js_selected_friends" style="display:none;"></div>
			<div class="p_4">

				<div class="input-group">
				  <span class="input-group-addon"><i class="icon-info"></i></span>
				  <input class="form-control" placeholder="{phrase var='share.subject'}" type="text" name="val[subject]" size="30" value="{phrase var='share.check_out'} {$sTitle|clean}" />
				</div>	

				<br>

				<div class="form-group">
					<div class="col-lg-12">
						<textarea placeholder="{phrase var='share.message'}" class="form-control" rows="10" name="val[message]">{$sMessage}</textarea>
					</div>
				</div>

				<div class="table_clear">
					<input type="submit" value="{phrase var='share.send'}" class="btn btn-primary btn-block" />
				</div>
			</div>
		</form>
	</div>	

</div>
<div class="alert alert-danger" id="js_friend_list_add_error" style="display:none;"></div>
<form method="post" action="#" onsubmit="$Core.processForm('#js_friend_list_add_submit'); $(this).ajaxCall('friend.addList'); return false;">
	<input placeholder="{phrase var='friend.enter_the_name_of_your_custom_friends_list'}" class="form-control" type="text" name="name" value="" size="40" /> 

	<div class="p_top_4" id="js_friend_list_add_submit">
		<ul class="table_clear_button">
			<li><input type="submit" value="{phrase var='friend.submit'}" class="btn btn-primary btn-md" /></li>
			<li class="table_clear_ajax"></li>
		</ul>
		<div class="clear"></div>
	</div>
</form>
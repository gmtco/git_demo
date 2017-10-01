{if $bIsAJaxAdminCp}
<div class="error_message">
	{phrase var='admincp.you_have_logged_out_of_the_site'}
</div>
<script type="text/javascript">
	window.location.href = '{url link='user.login'}';
</script>
{else}
<div class="alert alert-danger">
	<a class="close" href="#" data-dismiss="alert">&times;</a>
	{phrase var='user.you_need_logged_that'}
</div>
<form class="mac-form-login-ajax form-horizontal" method="post" action="{url link='user.login'}" id="js_login_form">
	
	<div class="input-group">
		<span class="input-group-addon"><i class="icon-user"></i></span>
		<input class="form-control input-lg" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" type="text" name="val[login]" id="js_email" value="" size="30" autofocus="" />
	</div>
	
	<br>
	<div class="clear"></div>

	<div class="input-group">
		<span class="input-group-addon"><i class="icon-user"></i></span>
		<input class="form-control input-lg" placeholder="{phrase var='user.password'}" type="password" name="val[password]" id="js_password" value="" size="30"/>
	</div>
	
	<div class="clear"></div>

	<div class="checkbox">
		<label>
			<input type="checkbox" name="val[remember_me]" value="" class="mac-icheck"/> 
			{phrase var='user.remember'}
		</label>
	</div>
		
	<div class="p_top_8">
		<input type="submit" value="{phrase var='user.login_button'}" class="btn btn-primary" />
		{if Phpfox::getParam('user.allow_user_registration')}
		<input type="button" value="{phrase var='user.register_for_an_account'}" class="btn btn-default" onclick="window.location.href = '{url link='user.register'}';" />		
		{/if}
	</div>
</form>
{/if}

<script type="text/javascript">
$('.mac-icheck').iCheck({l}
	checkboxClass: 'icheckbox_flat-mac',
	radioClass: 'iradio_flat-mac'
{r});
</script>
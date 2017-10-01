{plugin call='user.template_controller_login_block__start'}
<form class="mac-form-login-ajax form-horizontal" method="post" action="{url link="user.login"}">
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

	<div class="mac-mrg-tp">
		<label>
			<input type="checkbox" name="val[remember_me]" value="" class="mac-icheck"/> 
			{phrase var='user.remember'}
		</label>
	</div>
		
	<div class="p_top_8">
		<input type="submit" value="{phrase var='user.login_button'}" class="btn btn-primary btn-block" />
	</div>
</form>
{if (Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')) || (Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login'))}
<div class="p_top_8" align="center">	
	{phrase var='user.or_login_with'}:
	{if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
	<div class="header_login_block"><div class="fbconnect_button"><fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button></div></div>
	{/if}
	{if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
	<div class="header_login_block">
		<a class="rpxnow" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
	</div>
	{/if}
</div>
{/if}
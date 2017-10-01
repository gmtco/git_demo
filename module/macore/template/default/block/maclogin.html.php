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

	<div class="form-group">
		<div class="col-lg-12 text-center mac-mrg-tp">
			<a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
		</div>
	</div>	
</form>

{if Phpfox::isModule('auth')}

<div class="btn-group btn-group-justified mac-mrg-tp mac-mrg-btm">
<a class="btn btn-default no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Facebook" data-placement="bottom" href="{url link='auth' provider='Facebook'}" id="provider_Facebook" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/facebook.png" alt="Facebook" /> Facebook
</a>
<a class="btn btn-default no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Google" data-placement="bottom" href="{url link='auth' provider='Google'}" id="provider_Google" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/google.png" alt="Google" /> Google
</a>
<a class="btn btn-default no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Twitter" data-placement="bottom" href="{url link='auth' provider='Twitter'}" id="provider_Twitter" style="text-decoration:none;margin-right:10px">
<img src="{module_path}auth/static/image/icons/default/16x16/twitter.png" alt="Twitter" /> Twitter
</a>
</div>

{/if}


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
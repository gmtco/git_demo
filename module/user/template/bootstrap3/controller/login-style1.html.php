{$sCreateJs}
<div class="main_break">
	<form class="mac-form-login form-horizontal" method="post" action="{url link="user.login"}" id="js_login_form" onsubmit="{$sGetJsForm}">
		<h2 class="form-signin-heading">Please sign in</h2>
		<div class="form-group">
			<label for="login" class="col-lg-2 control-label">
				{if Phpfox::getParam('user.login_type') == 'user_name'}
				{phrase var='user.user_name'}
				{elseif Phpfox::getParam('user.login_type') == 'email'}
				{phrase var='user.email'}{else}{phrase var='user.login'}
				{/if}:
			</label>
			<div class="col-lg-10">
				<input class="form-control input-lg" type="text" name="val[login]" id="login" value="" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" size="40" autofocus/>
			</div>
		</div>
		
		<div class="form-group">
			<label for="password" class="col-lg-2 control-label">
				{phrase var='user.password'}:
			</label>
			<div class="col-lg-10">
				<input class="form-control input-lg" type="password" name="val[password]" id="password" value="" placeholder="{phrase var='user.password'}" size="40" />
			</div>
		</div>
				
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="val[remember_me]" value="" /> 
						{phrase var='user.remember'}
					</label>
				</div>
			</div>
		</div>
		
		{plugin call='user.template_controller_login_end'}
		
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
			<input type="submit" value="{phrase var='user.login_button'}" class="btn btn-primary btn-lg" />
			{if Phpfox::getParam('user.allow_user_registration')} 
			{phrase var='user.sign_for_site_name' url=$sSignUpPage name=$sSiteName}
			{/if}
			</div>
			<!-- plugin header set var -->
			{plugin call='user.template.login_header_set_var'}
			<!-- end plugin header set var -->
		</div>

		{if isset($bCustomLogin)}
		<div class="form-group">
			<div class="col-lg-12">
				<div class="p_top_8">
					{phrase var='user.or_login_with'}:
					<div class="p_top_4">					
						{plugin call='user.template_controller_login_block__end'}
					</div>
				</div>		
			</div>
		</div>
		{/if}
		
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
			</div>
		</div>	
	</form>	
</div>
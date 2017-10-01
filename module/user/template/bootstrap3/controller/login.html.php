{$sCreateJs}
<div class="main_break animated fadeInDown">
	<form class="mac-form-signin form-horizontal" method="post" action="{url link="user.login"}" id="js_login_form" onsubmit="{$sGetJsForm}">
			<div class="page-header">
			<h1 class="text-center">
				{phrase var='macore.login_to_site_title' sSiteTitle=$sSiteTitle}
				<br>
				<small>{phrase var='macore.state_thy_name_ye_shall_pass'}</small>
			</h1>
			</div>
	
			<!-- social connect auth -->
			{if Phpfox::isModule('auth')}
			  {if Phpfox::getLib('module')->getFullControllerName() == 'user.login'}
			  	{template file="macore.block.auth-socialink"}
	    		<h4 class="mac-social-connect-heading">or</h4>
			  {else}
			  {/if} 
			{/if} 



		<div class="input-group">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input class="form-control input-lg" type="text" name="val[login]" id="login" value="" placeholder="{if Phpfox::getParam('user.login_type') == 'user_name'}{phrase var='user.user_name'}{elseif Phpfox::getParam('user.login_type') == 'email'}{phrase var='user.email'}{else}{phrase var='user.login'}{/if}" size="40" autofocus/>
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-key"></i></span>
			<input class="form-control input-lg" type="password" name="val[password]" id="password" value="" placeholder="{phrase var='user.password'}" size="40" />
		</div>
				
		<div class="form-group mac-mrg-tp">
			<div class="col-lg-12">
				<div class="btn-group" data-toggle="buttons">
					<label><!--  class="btn btn-default btn-md" -->
						<input type="checkbox" name="val[remember_me]" value="" class="mac-icheck" /> {phrase var='user.remember'}
					</label>
				</div>
			</div>
		</div>

		{if isset($bCustomLogin)}
		<div class="form-group">
			<div class="col-lg-12">
				<div class="p_top_8 text-center">
					{phrase var='user.or_login_with'}:
					<div class="p_top_4">					
						{plugin call='user.template_controller_login_block__end'}
					</div>
				</div>		
			</div>
		</div>
		{/if}
		
		<div class="form-group">
			<div class="col-lg-12">
			<input type="submit" value="{phrase var='user.login_button'}" class="btn btn-primary btn-block btn-lg" />
			{if Phpfox::getParam('user.allow_user_registration')} 
			<p class="text-center">
				{phrase var='user.sign_for_site_name' url=$sSignUpPage name=$sSiteName}
			</p>
			{/if}
			</div>

			<!-- plugin header set var -->
			{plugin call='user.template.login_header_set_var'}
			<!-- end plugin header set var -->

		</div>

		<div class="form-group">
			<div class="col-lg-12 text-center">
				<a href="{url link='user.password.request'}">{phrase var='user.forgot_your_password'}</a>
			</div>
		</div>	
	</form>	
</div>
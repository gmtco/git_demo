{literal}
<script type="text/javascript">
$Behavior.termsAndPrivacy = function()
{
	$('#js_terms_of_use').click(function()
	{
		{/literal}
		tb_show('{phrase var='user.terms_of_use' phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true}', $.ajaxBox('page.view', 'height=410&width=600&title=terms')); 
		{literal}
		return false;
	});
	
	$('#js_privacy_policy').click(function()
	{
		{/literal}
		tb_show('{phrase var='user.privacy_policy' phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true phpfox_squote=true}', $.ajaxBox('page.view', 'height=410&width=600&title=policy')); 
		{literal}
		return false;
	});
}
</script>
{/literal}


{if Phpfox::getLib('module')->getFullControllerName() == 'user.register' && Phpfox::isModule('invite')}
<div id="main_registration_form" class="animated fadeInDown"> 
	<div class="page-header">
	<h1 class="text-center">
		{phrase var='user.sign_up_for_ssitetitle' sSiteTitle=$sSiteTitle}
		<br>
		<small>{phrase var='user.join_ssitetitle_to_connect_with_friends_share_photos_and_create_your_own_profile' sSiteTitle=$sSiteTitle}</small>
	</h1>
	</div>

	<!-- social connect auth -->
	{if Phpfox::isModule('auth')}
	  {if Phpfox::getLib('module')->getFullControllerName() == 'user.register'}
	  	<h4 class="mac-social-connect-heading">{phrase var='user.or_sign_up_with'}:</h4>
	    <div class="col-lg-12 mac-mrg-tp mac-mrg-btm mac-social-connect">

	    	<div class="btn-group btn-group-justified">
				<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Facebook" data-placement="bottom" href="{url link='auth' provider='Facebook'}" id="provider_Facebook" style="text-decoration:none;margin-right:10px">
					<img src="{module_path}auth/static/image/icons/default/16x16/facebook.png" alt="Facebook" /> Facebook
				</a>
				<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Google" data-placement="bottom" href="{url link='auth' provider='Google'}" id="provider_Google" style="text-decoration:none;margin-right:10px">
					<img src="{module_path}auth/static/image/icons/default/16x16/google.png" alt="Google" /> Google
				</a>
				<a class="btn btn-default{if !Phpfox::isMobile()} btn-lg{/if} no_ajax_link" rel="tooltip" data-toggle="tooltip" data-original-title="Connect with Twitter" data-placement="bottom" href="{url link='auth' provider='Twitter'}" id="provider_Twitter" style="text-decoration:none;margin-right:10px">
					<img src="{module_path}auth/static/image/icons/default/16x16/twitter.png" alt="Twitter" /> Twitter
				</a>
			</div>
			<!--&nbsp;and others: &nbsp;
			<a href="#" 
			onclick="tb_show('Social Connect', $.ajaxBox('auth.getLinks', 'height=400&width=350&title=quicklogin'));
			return false;">
			{phrase var='auth.quick_login'}
			</a>-->
	    </div>
	    <h4 class="mac-social-connect-heading">or</h4>
	  {else}
	  {/if} 
	{/if}


	<div id="main_registration_form_holder2">

		{if ((Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')) || (Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login'))) && !Phpfox::getService('invite')->isInviteOnly()}
		<div id="main_registration_custom" class="col-xs-12 mac-mrg-tp mac-mrg-btm mac-social-connect">
			{phrase var='user.or_sign_up_with'}:
			{if Phpfox::isModule('facebook') && Phpfox::getParam('facebook.enable_facebook_connect')}
			<div class="header_login_block">
				<fb:login-button scope="publish_stream,email,user_birthday" v="2"></fb:login-button>
			</div>
			{/if}	
			{if Phpfox::isModule('janrain') && Phpfox::getParam('janrain.enable_janrain_login')}
			<div class="header_login_block">
				<a class="rpxnow" onclick="return false;" href="{$sJanrainUrl}">{img theme='layout/janrain-icons.png'}</a>
			</div>
			{/if}
		</div>
		<hr class="invisible clear">
		{/if}

{/if}
{if Phpfox::getLib('module')->getFullControllerName() != 'user.register'}
<div class="user_register_holder">
	<div class="holder">
		<div class="user_register_form">

			{if Phpfox::getParam('user.allow_user_registration')}
			<div class="user_register_title">
				{phrase var='user.sign_up'}
				<div class="extra_info">
					{phrase var='user.it_s_free_and_always_will_be'}
				</div>
			</div>
			{/if}
{/if}
		{if Phpfox::isModule('invite') && Phpfox::getService('invite')->isInviteOnly()}
		<div class="row">
			<div class="col-xs-12">	
				<div class="alert alert-info">				
					{phrase var='user.ssitetitle_is_an_invite_only_community_enter_your_email_below_if_you_have_received_an_invitation' sSiteTitle=$sSiteTitle}
				</div>

				<form class="mac-form-invite form-horizontal" method="post" action="{url link='user.register'}">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-envelope-alt"></i></span> 
						<input class="form-control input-lg" placeholder="{phrase var='user.email'}" type="text" name="val[invite_email]" value="" />
					</div>
				
					<div class="clear"></div>
					<br>

					<div class="form-group">
						<div class="col-xs-12">
							<input type="submit" value="{phrase var='user.submit'}" class="btn btn-primary btn-block btn-lg" />
						</div>
					</div>
				</form>
			</div>
		</div>
		{else}
		{if isset($sCreateJs)}
		{$sCreateJs}
		{/if}
		<div id="js_registration_process" class="t_center" style="display:none;">
			<div class="p_top_8">				
				<i class="icon-spinner icon-spin icon-2x"></i>
			</div>
		</div>
		<div id="js_signup_error_message"></div>
		{if Phpfox::getParam('user.allow_user_registration')}
			<div class="main_break" id="js_registration_holder">	
				<form class="mac-form-signup form-horizontal" method="post" action="{url link='user.register'}" id="js_form" enctype="multipart/form-data">	
				{token}

					<div id="js_signup_block">
						{if isset($bIsPosted) || !Phpfox::getParam('user.multi_step_registration_form')}
						<div>
							{template file='user.block.register.step1'}
							{template file='user.block.register.step2'}
						</div>
						{else}
							{template file='user.block.register.step1'}			
						{/if}
					</div>		
					{plugin call='user.template_controller_register_pre_captcha'}
					{if Phpfox::isModule('captcha') && Phpfox::getParam('user.captcha_on_signup')}
					<div id="js_register_capthca_image"{if Phpfox::getParam('user.multi_step_registration_form') && !isset($bIsPosted)} style="display:none;"{/if}>
						{module name='captcha.form'}
					</div>
					{/if}			
					
					{if Phpfox::getParam('user.new_user_terms_confirmation')}
					<div id="js_register_accept">
						<div class="form-group">
							<div class="col-xs-12">			
								<div class="checkbox">
									<label>
										<input class="mac-icheck" type="checkbox" name="val[agree]" id="agree" value="1" {value type='checkbox' id='agree' default='1'}/> 
										{required}{phrase var='user.i_have_read_and_agree_to_the_a_href_id_js_terms_of_use_terms_of_use_a_and_a_href_id_js_privacy_policy_privacy_policy_a'}					
									</label>
								</div>			
							</div>
						</div>	
					</div>					
					{/if}

					{template file="macore.block.recaptcha"}

					<div class="form-group">
						<div class="col-xs-12">

						{if isset($bIsPosted) || !Phpfox::getParam('user.multi_step_registration_form')}
							
							<input type="submit" value="{phrase var='user.sign_up'}" class="btn btn-success btn-lg btn-block" id="js_registration_submit" />
						
						{else}

							<input type="button" value="{phrase var='user.sign_up'}" class="btn btn-success btn-lg btn-block" id="js_registration_submit" onclick="$Core.registration.submitForm();" />
						
						{/if}

						</div>
					</div>
				</form>

				{if !Phpfox::isMobile() && Phpfox::isModule('usercounter') && Phpfox::getLib('module')->getFullControllerName() != 'user.register'}
		        {module name="usercounter.display"}
		        {/if}

			</div>
			{/if}
		{/if}
{if Phpfox::getLib('module')->getFullControllerName() != 'user.register'}
		</div>
		<div class="clear"></div>
	</div>
</div>
{/if}
{if Phpfox::getLib('module')->getFullControllerName() == 'user.register'}
	</div>
</div>
{/if}
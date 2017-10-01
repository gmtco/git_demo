<div id="js_register_step1">

		{plugin call='user.template_default_block_register_step1_3'}

		{if Phpfox::getParam('user.split_full_name')}

		<div><input type="hidden" name="val[full_name]" id="full_name" value="stock" size="30" /></div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input class="form-control input-lg" placeholder="{phrase var='user.first_name'}" type="text" name="val[first_name]" id="first_name" value="{value type='input' id='first_name'}" size="30" required autofocus />		
		</div>
		<br>
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input class="form-control input-lg" placeholder="{phrase var='user.last_name'}" type="text" name="val[last_name]" id="last_name" value="{value type='input' id='last_name'}" size="30" required />			
		</div>

		<br>

		{else}

		<div class="input-group">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input class="form-control input-lg" placeholder="{phrase var='user.full_name'}" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" required autofocus />		
		</div>

		<br>

		{/if}

		{if !Phpfox::getParam('user.profile_use_id') && !Phpfox::getParam('user.disable_username_on_sign_up')}
		
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-user"></i></span>                 
			<input class="form-control input-lg" placeholder="{phrase var='user.choose_a_username'}" type="text" name="val[user_name]" id="user_name" onkeyup="$('.bt-wrapper').remove(); $(this).ajaxCall('user.showUserName');" {if Phpfox::getParam('user.suggest_usernames_on_registration')}onfocus="$('#btn_verify_username').slideDown()"{/if} title="{phrase var='user.your_username_is_used_to_easily_connect_to_your_profile'}" value="{value type='input' id='user_name'}" size="30" autocomplete="off" required />						
		</div>

		<div class="p_4">
			{url link=''}<strong id="js_signup_user_name">{phrase var='user.your_user_name'}</strong>/
		</div>
		<div id="js_user_name_error_message"></div>
		<div style="display:none;" id="js_verify_username"></div>
        {if Phpfox::getParam('user.suggest_usernames_on_registration')}
		<div class="p_4" style="display:none;" id="btn_verify_username">
			<a href="#" onclick="$(this).ajaxCall('user.verifyUserName', 'user_name='+$('#user_name').val(), 'GET'); return false;">{phrase var='user.check_availability'}</a>
		</div>
		{/if}		
		
		<br>

		{/if}

		<div class="input-group">
			<span class="input-group-addon"><i class="icon-envelope"></i></span>   
			<input class="form-control input-lg" placeholder="{phrase var='user.email'}" type="email" name="val[email]" id="email" value="{value type='input' id='email'}" size="30" required />
		</div>
		
		<br>

		{if Phpfox::getParam('user.reenter_email_on_signup')}

		<div class="input-group">
			<span class="input-group-addon"><i class="icon-envelope"></i></span> 
			<input class="form-control input-lg" placeholder="{phrase var='user.please_reenter_your_email_again_below'}" type="email" name="val[confirm_email]" id="confirm_email" value="{value type='input' id='confirm_email'}" size="30" onblur="$('#js_form').ajaxCall('user.confirmEmail');" required />		
		</div>				
		<div id="js_confirm_email_error" style="display:none;">
			<div class="error_message">
				{phrase var='user.email_s_do_not_match'}
			</div>
		</div>
		
		<br>

		{/if}

		{plugin call='user.template_default_block_register_step1_5'}

		<div class="input-group">
			<span class="input-group-addon"><i class="icon-key"></i></span>
			{if isset($bIsPosted)}
			<input class="form-control input-lg" placeholder="{phrase var='user.password'}" type="password" name="val[password]" id="password" value="{value type='input' id='password'}" size="30" required />
			{else}
			<input class="form-control input-lg" placeholder="{phrase var='user.password'}" type="password" name="val[password]" id="password" value="" size="30" required />
			{/if}	
		</div>
		
		<br>

		{plugin call='user.template_default_block_register_step1_4'}

	</div>
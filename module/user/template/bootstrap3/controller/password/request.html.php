<div class="main_break">
	<form method="post" action="{url link='user.password.request'}">
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-envelope"></i></span>
			<input class="form-control input-lg" placeholder="{phrase var='user.email'}" type="text" name="email" id="email" value="" size="40" />
		</div>
		{if Phpfox::isModule('captcha')}{module name='captcha.form' sType='lostpassword'}{/if}
		<div class="form-group">
			<div class="col-lg-12">
				<input type="submit" value="{phrase var='user.request_new_password'}" class="btn btn-primary btn-block btn-lg" />
			</div>
		</div>	
	</form>
</div>
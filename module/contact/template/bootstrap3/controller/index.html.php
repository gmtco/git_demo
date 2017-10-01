{$sCreateJs}
<div class="main_break">
	<form class="form-horizontal mac-form-contact" method="post" action="{url link='contact'}" id="js_contact_form" onsubmit="{$sGetJsForm}" role="form">
		
		<div class="form-group">
			<div class="col-lg-12">
				<label for="category_id" class="control-label">{required}{phrase var='contact.category'}:</label>
				<select class="form-control mac-mrg-tp" name="val[category_id]" id="category_id">
				<option value="">{phrase var='contact.select'}:</option>
				{foreach from=$aCategories item=sCategory}
					<option value="{$sCategory.title}"{value type='select' id='category_id' default=$sCategory.title}>{$sCategory.title|convert|clean}</option>
				{foreachelse}
					<option value="#">{phrase var='contact.currently_unavailable'}</option>
				{/foreach}
				</select>
			</div>
		</div>
		<div class="clear"></div>

		{if Phpfox::isUser()}
			<div><input type="hidden" name="val[full_name]" id="full_name" value="{$sFullName}" size="30" /></div>
			<div><input type="hidden" name="val[email]" id="email" value="{$sEmail}" size="30" /></div>
		{else}
		<div class="form-group">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
	  				<span class="input-group-addon"><i class="icon-user"></i></span>
					<input placeholder="{phrase var='contact.full_name'}" class="form-control" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" />
				</div>
			</div>
			<div class="clearfix mac-mrg-tp visible-xs"></div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="input-group">
	  				<span class="input-group-addon"><i class="icon-envelope"></i></span>
					<input placeholder="{phrase var='contact.email'}" class="form-control" id="email" value="{value type='input' id='email'}" size="30" />
				</div>
			</div>		
		</div>	
		{/if}


		<div class="form-group">
			<div class="col-lg-12">
				<div class="input-group">
	  				<span class="input-group-addon"><i class="icon-edit"></i></span>
					<input placeholder="{phrase var='contact.subject'}" class="form-control" type="text" name="val[subject]" id="subject" value="{value type='input' id='subject'}" size="30" />
				</div>
			</div>		
		</div>
		<div class="clear"></div>

		<div class="form-group">
			<div class="col-lg-12">
				<textarea placeholder="{phrase var='contact.message'}" class="form-control" name="val[text]">{value id='text' type='textarea'}</textarea>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="form-group">
			<div class="col-lg-12">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default active mac-tooltip btn-md" data-placement="top" data-original-title="{phrase var='contact.send_yourself_a_copy'}?">
						<input type="checkbox" name="val[copy]" value="1"{value id='copy' type='checkbox' default='1'}/>
						{phrase var='contact.send_yourself_a_copy'}
					<label>
				</div>
			</div>
		</div>				
		<div class="clear"></div>

		{if Phpfox::isModule('captcha') && Phpfox::getParam('contact.contact_enable_captcha')}
			{module name='captcha.form' sType=contact}
		{/if}

		<div class="table_clear">
			<input type="submit" value="{phrase var='contact.submit'}" class="btn btn-primary btn-block btn-lg" />
			<div class="t_right"><span id="js_comment_process"></span></div>
		</div>
	</form>

</div>
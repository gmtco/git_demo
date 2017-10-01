{$sCreateJs}

<div class="main_break animated fadeInLeftBig">
	<form class="mac-form-user-setting form-horizontal" method="post" action="{url link='user.setting'}" id="js_form" onsubmit="{$sGetJsForm}">		
		
		{if Phpfox::getUserId() == $aForms.user_id && Phpfox::getUserParam('user.can_change_own_full_name')}
		
			{if Phpfox::getParam('user.split_full_name')}

				<div><input type="hidden" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" /></div>
				
		        <div class="form-group">
		            <label class="col-sm-3 control-label" for="first_name">
		                {phrase var='user.first_name'}
		            </label>
		            <div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input class="form-control" placeholder="{phrase var='user.first_name'}" type="text" name="val[first_name]" id="first_name" value="{value type='input' id='first_name'}" size="30" {if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}readonly="readonly"{/if} />
						</div>
		            </div>
		        </div>

		        <div class="form-group">
		            <label class="col-sm-3 control-label" for="last_name">
		                {phrase var='user.last_name'}
		            </label>
		            <div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input class="form-control" placeholder="{phrase var='user.last_name'}" type="text" name="val[last_name]" id="last_name" value="{value type='input' id='last_name'}" size="30" {if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}readonly="readonly"{/if} />
						</div>
						{if $iTotalFullNameChangesAllowed > 0}
						<p class="help-block"><i class="icon-info"></i> {phrase var='user.total_full_name_change_out_of_allowed' total_full_name_change=$aForms.total_full_name_change allowed=$iTotalFullNameChangesAllowed}</p>
		            	{/if}
		            </div>
		        </div>

			{else}		

		        <div class="form-group">
		            <label class="col-sm-3 control-label" for="full_name">
		                {$sFullNamePhrase}
		            </label>
		            <div class="col-sm-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-user"></i></span>
							{if $iTotalFullNameChangesAllowed != 0 && $aForms.total_full_name_change >= $iTotalFullNameChangesAllowed}
							<input class="form-control" placeholder="{$sFullNamePhrase}" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" readonly="readonly" />
							{else}
							<input class="form-control" placeholder="{$sFullNamePhrase}" type="text" name="val[full_name]" id="full_name" value="{value type='input' id='full_name'}" size="30" />
							{/if}
						</div>
						{if $iTotalFullNameChangesAllowed > 0}
						<p class="help-block"><i class="icon-info"></i> {phrase var='user.total_full_name_change_out_of_allowed' total_full_name_change=$aForms.total_full_name_change allowed=$iTotalFullNameChangesAllowed}</p>
		            	{/if}
		            </div>
		        </div>

			{/if}

		{/if}


		{if Phpfox::getUserParam('user.can_change_own_user_name') && !Phpfox::getParam('user.profile_use_id')}

	        <div class="form-group">
	            <label class="col-sm-3 control-label" for="user_name">
	                {phrase var='user.username'}
	            </label>
	            <div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-user"></i></span>
						{if $aForms.total_user_change >= $iTotalChangesAllowed}
						<input class="form-control" placeholder="{phrase var='user.username'}" type="text" name="val[user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" readonly="readonly" />
						{else}
						<input class="form-control" placeholder="{phrase var='user.username'}" type="text" name="val[user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" />
						{/if}
						<div><input type="hidden" name="val[old_user_name]" id="user_name" value="{value type='input' id='user_name'}" size="30" /></div>
					</div>
					<p class="help-block"><i class="icon-info"></i> {phrase var='user.total_user_change_out_of_total_user_name_changes' total_user_change=$aForms.total_user_change total=$iTotalChangesAllowed}</p>
	            </div>
	        </div>

		{/if}

		{if Phpfox::getUserParam('user.can_change_email')}

			<div class="form-group">
	            <label class="col-sm-3 control-label" for="email">
	                {phrase var='user.email_address'}
	            </label>
	            <div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-envelope-alt"></i></span>
						<input placeholder="{phrase var='user.email_address'}" class="form-control" type="text" {if Phpfox::getParam('user.verify_email_at_signup')}onfocus="$('#js_email_warning').show();" {/if}name="val[email]" id="email" value="{value type='input' id='email'}" size="30" />
					</div>
					{if Phpfox::getParam('user.verify_email_at_signup')}
					<p class="help-block">
						<i class="icon-info"></i> {phrase var='user.changing_your_email_address_requires_you_to_verify_your_new_email'}
					</p>
					{/if}
	            </div>
	        </div>

		{/if}


		{if !Phpfox::getUserBy('fb_user_id')}
			<div class="form-group">
	            <label class="col-sm-3 control-label" for="last_name">
	                {phrase var='user.change_password'}
	            </label>
	            <div class="col-sm-9">
					<div id="js_password_info">
						<a class="btn btn-default" href="#" onclick="tb_show('{phrase var='user.change_password' phpfox_squote=true}', $.ajaxBox('user.changePassword', 'height=250&amp;width=500')); return false;">
							{phrase var='user.change_password'}
						</a>
					</div>
					{if $iTotalFullNameChangesAllowed > 0}
					<p class="help-block"><i class="icon-info"></i> {phrase var='user.total_full_name_change_out_of_allowed' total_full_name_change=$aForms.total_full_name_change allowed=$iTotalFullNameChangesAllowed}</p>
	            	{/if}
	            </div>
	        </div>
		{/if}

        <div class="form-group">
            <label class="col-sm-3 control-label" for="language_id">
                {phrase var='user.primary_language'}
            </label>
            <div class="col-sm-9">
				<div class="input-group">
					<span class="input-group-addon"><i class="icon-bold"></i></span>
					<select class="form-control" name="val[language_id]" id="language_id">					
					{foreach from=$aLanguages item=aLanguage}
						<option value="{$aLanguage.language_id}"{value type='select' id='language_id' default=$aLanguage.language_id}>{$aLanguage.title|clean}</option>
					{/foreach}
					</select>
				</div>
            </div>
        </div>
	
        <div class="form-group">
            <label class="col-sm-3 control-label" for="time_zone">
                {phrase var='user.time_zone'}
            </label>
            <div class="col-sm-9">
				<div class="input-group" id="tbl_time_zone">
					<span class="input-group-addon"><i class="icon-map-marker"></i></span>
					<select class="form-control" name="val[time_zone]" id="time_zone">
						{foreach from=$aTimeZones key=sTimeZoneKey item=sTimeZone}
						<option value="{$sTimeZoneKey}"{if (empty($aForms.time_zone) && $sTimeZoneKey == Phpfox::getParam('core.default_time_zone_offset')) || (!empty($aForms.time_zone) && $aForms.time_zone == $sTimeZoneKey)} selected="selected"{/if}>{$sTimeZone}</option>
						{/foreach}
					</select>
				</div>
				{if PHPFOX_USE_DATE_TIME != true && Phpfox::getParam('core.identify_dst')}
				<p class="help-block">
					<label>
						<input type="checkbox" name="val[dst_check]" value="1" class="v_middle" {if $aForms.dst_check}checked="checked" {/if}/> 
						{phrase var='user.enable_dst_daylight_savings_time'}
					</label>
				</p>
				{/if}
            </div>
        </div>

		{if Phpfox::getUserParam('user.can_edit_currency')}

	        <div class="form-group">
	            <label class="col-sm-3 control-label" for="language_id">
	                {phrase var='user.preferred_currency'}
	            </label>
	            <div class="col-sm-9">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon-money"></i></span>
						<select class="form-control" name="val[default_currency]">
						<option value="">{phrase var='user.select'}:</option>
						{foreach from=$aCurrencies key=sCurrency item=aCurrency}
						<option value="{$sCurrency}"{if $aForms.default_currency == $sCurrency} selected="selected"{/if}>{phrase var=$aCurrency.name}</option>
						{/foreach}	
						</select>
					</div>
					<p class="help-block">
						<i class="icon-info"></i> {phrase var='user.show_prices_and_make_purchases_in_this_currency'}
					</p>
	            </div>
	        </div>

		{/if}		

		{plugin call='user.template_controller_setting'}
		
		<div class="form-group">
			<div class="col-sm-12">
			<input type="submit" value="{phrase var='user.save'}" class="btn btn-block btn-primary btn-lg" />
			</div>
		</div>



		{if isset($aGateways) && is_array($aGateways) && count($aGateways)}

			<hr>
			<h3>{phrase var='user.payment_methods'}</h3>
			{foreach from=$aGateways item=aGateway}
				{foreach from=$aGateway.custom key=sFormField item=aCustom}
				<div class="form-group">
					<div class="col-xs-12">
						<input placeholder="{$aCustom.phrase}" class="form-control" type="text" name="val[gateway_detail][{$aGateway.gateway_id}][{$sFormField}]" value="{if isset($aCustom.user_value)}{$aCustom.user_value|clean}{/if}" size="40" />
						{if !empty($aCustom.phrase_info)}
						<br>
						<div class="alert alert-info">
							{$aCustom.phrase_info}
						</div>
						{/if}
					</div>
					<hr class="invisible"></hr>
					<div class="clear"></div>
				</div>			
				{/foreach}			
				<hr class="invisible"></hr>
			{/foreach}		

			<div class="form-group">
				<div class="col-sm-12">
				<input type="submit" value="{phrase var='user.save'}" class="btn btn-block btn-primary btn-lg" />
				</div>
			</div>

		{/if}

		{if (Phpfox::getUserParam('user.can_delete_own_account'))}
		<br />
		<br />
		<br />
		<br />
		<div class="p_top_8">
			<a href="{url link='user.remove'}" class="btn btn-danger">{phrase var='user.cancel_account'}</a>
		</div>
		{/if}
	</form>
</div>
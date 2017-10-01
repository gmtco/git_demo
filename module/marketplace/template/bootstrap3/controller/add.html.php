{if $bIsEdit && $aForms.view_id == '2'}
<div class="alert alert-error">
	{phrase var='marketplace.notice_this_listing_is_marked_as_sold'}
</div>
<div class="main_break"></div>
{/if}

{$sCreateJs}
<form class="form-horizontal mac-form-marketplace-add" method="post" action="{url link='current'}" enctype="multipart/form-data" onsubmit="return startProcess({$sGetJsForm}, false);" id="js_marketplace_form">
	{if $bIsEdit}
	<input type="hidden" name="id" value="{$aForms.listing_id}" />
	{/if}
	<input type="hidden" name="page_section_menu" value="" id="page_section_menu_form" />
	
	<div id="js_custom_privacy_input_holder">
	{if $bIsEdit && Phpfox::isModule('privacy')}
		{module name='privacy.build' privacy_item_id=$aForms.listing_id privacy_module_id='marketplace'}
	{/if}
	</div>	
	
	<div id="js_mp_block_detail" class="js_mp_block page_section_menu_holder">
		<div class="table">
			<div class="table_left">
			<label for="category">{required}{phrase var='marketplace.category'}:</label>
			</div>
			<div class="table_right">
				{$sCategories}
			</div>
		</div>
		<div class="separate"></div>
		<div class="table">
			<div class="table_left">
				<label for="title">{required}{phrase var='marketplace.what_are_you_selling'}</label>
			</div>
			<div class="table_right">
				<input placeholder="{phrase var='marketplace.what_are_you_selling'}" class="form-control" type="text" name="val[title]" value="{value type='input' id='title'}" id="title" size="40" maxlength="100" />
			</div>
		</div>	

		<div class="table">
			<div class="table_left">
				<label for="mini_description">{phrase var='marketplace.short_description'}</label>
			</div>
			<div class="table_right">
			
					<textarea placeholder="{phrase var='marketplace.short_description'}" class="form-control" name="val[mini_description]" style="height:40px;">{value type='textarea' id='mini_description'}</textarea>
	
					<p class="help-block">{phrase var='marketplace.html_not_allowed'}</p>
			
				<div class="clear"></div>
			</div>
		</div>			

		<div class="table">
			<div class="table_left">
				<label for="description">{phrase var='marketplace.description'}:</label>
			</div>
			<div class="table_right">
				{editor id='description' rows='6'}
			</div>
		</div>		
		
		<div class="form-group">
			<div class="col-lg-12">
				<label for="price">{required}{phrase var='marketplace.price'}</label>
				<div class="input-group">
					<select id="mac-select-currency" class="form-control input-lg" name="val[currency_id]">
					{foreach from=$aCurrencies key=sCurrency item=aCurrency}
						<option value="{$sCurrency}"{if $bIsEdit} {value type='select' id='currency_id' default=$sCurrency}{else}{if $aCurrency.is_default} selected="selected"{/if}{/if}>{phrase var=$aCurrency.name}</option>
					{/foreach}
					</select>
					<span class="input-group-addon" style="width:130px">
						<input class="form-control" type="text" name="val[price]" value="{value type='input' id='price'}" id="price" size="10" maxlength="100" onfocus="this.select();" />			
				 	</span>
				</div>
			</div>
		</div>	
		
		{if Phpfox::getUserParam('marketplace.can_sell_items_on_marketplace')}
		<div class="table">
			<div class="table_left">
				<label for="postal_code">
					{phrase var='marketplace.enable_instant_payment'}
				</label>
			</div>
			<div class="table_right">
				<div class="mac-icheckbox">		
					<label>
						<input type="radio" name="val[is_sell]" value="1" {value type='radio' id='is_sell' default='1'}/> 
						{phrase var='core.yes'}
					</label>
					<label>
						<input type="radio" name="val[is_sell]" value="0" {value type='radio' id='is_sell' default='0' selected='true'}/> 
						{phrase var='core.no'}
					</label>
				</div>
				<div class="alert alert-info mac-mrg-tp">
					{phrase var='marketplace.if_you_enable_this_option_buyers_can_make_a_payment_to_one_of_the_payment_gateways_you_have_on_file_with_us_to_manage_your_payment_gateways_go_a_href_link_here_a' link=$sUserSettingLink}
				</div>
			</div>
		</div>			

		<div class="table">
			<div class="table_left">
				<label for="postal_code">{phrase var='marketplace.auto_sold'}:</label>
			</div>
			<div class="table_right">
				<div class="mac-icheckbox">		
					<label>
						<input type="radio" name="val[auto_sell]" value="1" {value type='radio' id='auto_sell' default='1' selected='true'}/> 
						{phrase var='core.yes'}
					</label>
					<label>
						<input type="radio" name="val[auto_sell]" value="0" {value type='radio' id='auto_sell' default='0'}/> 
						{phrase var='core.no'}
					</label>
				</div>
				<div class="alert alert-info mac-mrg-tp">
					{phrase var='marketplace.if_this_is_enabled_and_once_a_successful_purchase_of_this_item_is_made'}
				</div>
			</div>
		</div>		
		{/if}
		
		<div class="separate"></div>
		
		<div class="table">
			<div class="table_left">
			<label for="country_iso">{required}{phrase var='marketplace.location'}</label>
			</div>
			<div class="table_right">
				{select_location}
				{module name='core.country-child'}
				{if !$bIsEdit}
				<div class="extra_info">
					<a href="#" onclick="$(this).parent().hide(); $('#js_mp_add_city').show(); return false;">
						{phrase var='marketplace.add_city_zip'}
					</a>
				</div>
				{/if}				
			</div>
		</div>	
		
		<div id="js_mp_add_city"{if !$bIsEdit} style="display:none;"{/if}>		
			<div class="table">
				<div class="table_left">
					<label for="city">{phrase var='marketplace.city'}</label>
				</div>
				<div class="table_right">
					<input class="form-control" placeholder="{phrase var='marketplace.city'}" type="text" name="val[city]" value="{value type='input' id='city'}" id="city" size="20" maxlength="200" />
				</div>
			</div>
			<div class="table">
				<div class="table_left">
					<label for="postal_code">{phrase var='marketplace.zip_postal_code'}</label>
				</div>
				<div class="table_right">
					<input placeholder="{phrase var='marketplace.zip_postal_code'}" class="form-control" type="text" name="val[postal_code]" value="{value type='input' id='postal_code'}" id="postal_code" size="10" maxlength="20" />
				</div>
			</div>
		</div>
		
		{if Phpfox::isModule('input')}
			{module name='input.add' action='add-listing' module='marketplace'}
		{/if}
		
		{if $bIsEdit && ($aForms.view_id == '0' || $aForms.view_id == '2')}
		<div class="separate"></div>
		
		<div class="table">
			<div class="table_left">
				<label for="postal_code">{phrase var='marketplace.closed_item_sold'}</label>
			</div>
			<div class="table_right">
				<div class="mac-ichechbox">		
					<label>
						<input type="radio" name="val[view_id]" value="2" {value type='radio' id='view_id' default='2'}/> 
						{phrase var='core.yes'}
					</label>
					<label>
						<input type="radio" name="val[view_id]" value="0" {value type='radio' id='view_id' default='0' selected='true'}/> 
						{phrase var='core.no'}
					</label>
				</div>
				<div class="alert alert-info mac-mrg-tp">
					{phrase var='marketplace.enable_this_option_if_this_item_is_sold_and_this_listing_should_be_closed'}
				</div>
			</div>
		</div>		
		{/if}	
		
		{if Phpfox::isModule('privacy')}
		<div class="row">
			<div class="col-lg-6 col-6">
				<label>
					{phrase var='marketplace.listing_privacy'}
				</label>
				
				{module name='privacy.form' privacy_name='privacy' privacy_info='marketplace.control_who_can_see_this_listing' default_privacy='marketplace.display_on_profile'}
			</div>
			<div class="col-lg-6 col-6">
				<label>
					{phrase var='marketplace.comment_privacy'}
				</label>

				{module name='privacy.form' privacy_name='privacy_comment' privacy_info='marketplace.control_who_can_comment_on_this_listing' privacy_no_custom=true}
			</div>			
		</div>		
		{/if}
		<div class="table_clear">
			<input type="submit" value="{if $bIsEdit}{phrase var='marketplace.update'}{else}{phrase var='marketplace.submit'}{/if}" class="btn btn-primary btn-block" />
		</div>
	</div>	
	
	<div id="js_mp_block_customize" class="js_mp_block page_section_menu_holder" style="display:none;">
	
		<div id="js_marketplace_form_holder">
			<div class="table">
				<div class="table_left">
					{phrase var='marketplace.select_image_s'}:
				</div>
				<div class="table_right">
					<div id="js_progress_uploader"></div>
					<div class="extra_info">
						{phrase var='marketplace.you_can_upload_a_jpg_gif_or_png_file'} 
						{if $iMaxFileSize !== null}
						<br />
						{phrase var='marketplace.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
						{/if}						
					</div>
				</div>
			</div>		
			
			<div class="table_clear">
				<input type="submit" value="{phrase var='marketplace.upload'}" class="btn btn-primary btn-block" />
			</div>		
		</div>
		
		{module name='marketplace.photo'}
	
	</div>	
	
	<div id="js_mp_block_invite" class="js_mp_block page_section_menu_holder" style="display:none;">	
	
			{if Phpfox::isModule('friend')}
			<div style="width:75%; float:left; position:relative;">
				<h3 style="margin-top:0px; padding-top:0px;">{phrase var='marketplace.invite_friends'}</h3>
				<div style="height:370px;">			
				{if isset($aForms.listing_id)}
					{module name='friend.search' input='invite' hide=true friend_item_id=$aForms.listing_id friend_module_id='marketplace'}
				{/if}
				</div>
				{/if}
				
				<h3>{phrase var='marketplace.invite_people_via_email'}</h3>
				<div class="p_4">
					<textarea placeholder="{phrase var='marketplace.invite_people_via_email'}" class="form-control" name="val[emails]" style="width:98%; height:60px;"></textarea>
					<div class="extra_info mac-mrg-bottom">
						<div class="alert alert-info">
							{phrase var='marketplace.separate_multiple_emails_with_a_comma'}
						</div>
						<div>
							<label><input type="checkbox" name="val[invite_from]" value="1"> {phrase var='mail.send_from_my_own_address_semail' sEmail=$sMyEmail}</label>
						</div>
					</div>
				</div>
				
				<h3>{phrase var='marketplace.add_a_personal_message'}</h3>
				<div class="p_4">
					<textarea placeholder="{phrase var='marketplace.add_a_personal_message'}" class="form-control" name="val[personal_message]" style="width:98%; height:60px;"></textarea>					
				</div>				
				
				<div class="p_top_8">
					<input type="submit" value="{phrase var='marketplace.send_invitations'}" class="btn btn-primary btn-block" />
				</div>
				
			</div>
			{if Phpfox::isModule('friend')}
			<div style="margin-left:77%; position:relative;">
				<div class="block">
					<div class="title">{phrase var='marketplace.new_guest_list'}</div>				
					<div class="content">
						<div class="label_flow" style="height:330px;">
							<div id="js_selected_friends"></div>
						</div>
					</div>
				</div>
			</div>			
			
			<div class="clear"></div>	
			{/if}
	</div>	
	
	{if isset($aForms.listing_id) && $bIsEdit}
	<div id="js_mp_block_manage" class="js_mp_block page_section_menu_holder" style="display:none;">
		{module name='marketplace.list'}
	</div>
	{/if}	

</form>
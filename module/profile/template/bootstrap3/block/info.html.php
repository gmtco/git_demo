{if !PHPFOX_IS_AJAX}
<div id="js_basic_info_data">
{/if}

<div class="list-group">

{if !Phpfox::isMobile() && Phpfox::isModule('rate') && Phpfox::getParam('profile.can_rate_on_users_profile') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'rate.can_rate')}
	<div class="list-group-item">
		<span class="badge">{phrase var='profile.rating'}</span>
		{module name='rate.display'}
	</div>
{/if}	
	{if Phpfox::getParam('user.enable_relationship_status') && $sRelationship != ''}
	<div class="list-group-item">
		<span class="badge">{phrase var='profile.relationship_status'}</span>
		{$sRelationship}
	</div>
	{/if}
	{foreach from=$aUserDetails key=sKey item=sValue}
	{if !empty($sValue)}
	<div class="list-group-item">
			<span class="badge">{$sKey}</span>
			{if Phpfox::isMobile()}{$sValue|strip_tags}{else}{$sValue}{/if}
	</div>
	{/if}
	{/foreach}
	{module name='custom.display' type_id='user_panel' template='info'}
	{plugin call='profile.template_block_info'}

</div>

{if !PHPFOX_IS_AJAX}
</div>
<div id="js_basic_info_form"></div>
{/if}
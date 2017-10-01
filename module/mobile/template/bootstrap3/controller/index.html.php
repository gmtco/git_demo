{if Phpfox::getUserId() || Phpfox::getParam('macore.mac_bootstrap3_mobile_landing') == 'dashboard-icons'}
<div class="row" id="mobile_main_menu" style="padding-top:30px">
	{foreach from=$aMobileMenus key=iKey item=aMenu name=menu}
	<div class="col-xs-4 mobile_main_menu">
		<a href="{$aMenu.link}">
			{if isset($aMenu.total) && $aMenu.total > 0}
			<span class="new">{$aMenu.total}</span>
			{/if}
			{if strpos('.png', $aMenu.icon) !== false}
			<img src="{$aMenu.icon}" alt="" />
			<div>{$aMenu.phrase|strip_tags}</div>
			{else}
			{$aMenu.phrase}
			{/if}
		</a>
	</div>
	{if is_int($phpfox.iteration.menu/3)}
	<div class="clear"></div>
	{/if}				
	{/foreach}
</div>
{elseif Phpfox::getParam('macore.mac_bootstrap3_mobile_landing') == 'registration'}
{template file='macore.block.bootstrap3-landing-registration-mobile'}
{elseif Phpfox::getParam('macore.mac_bootstrap3_mobile_landing') == 'login'}
{template file='macore.block.bootstrap3-landing-login-mobile'}
{elseif Phpfox::getParam('macore.mac_bootstrap3_mobile_landing') == 'custom'}
{template file='macore.block.bootstrap3-landing-custom-mobile'}
{/if}
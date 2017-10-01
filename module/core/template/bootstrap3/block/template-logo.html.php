{if !empty($sStyleLogo)}
<a class="animated fadeInLeft navbar-brand {if Phpfox::isMobile()}pull-right{/if}" href="{url link=''}" id="logo">
	<img src="{$sStyleLogo}" class="v_middle" />
</a>
{else}
<a class="animated fadeInLeft navbar-brand {if Phpfox::isMobile()}pull-right{/if}" href="{url link=''}">
	{param var='core.site_title'}
</a>
{/if}
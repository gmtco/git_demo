{if !Phpfox::getUserBy('profile_page_id')}
	{foreach from=$aFooterMenu key=iKey item=aMenu name=footer}
	<a href="{url link=''$aMenu.url''}" class="{if $phpfox.iteration.footer == 1}first_link {/if}ajax_link{if $aMenu.url == 'mobile'} no_ajax_link{/if}">{phrase var=$aMenu.module'.'$aMenu.var_name}</a>
	{/foreach}
{/if}
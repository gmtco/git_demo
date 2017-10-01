{if !$bIsUsersProfilePage && count($aSubMenus)}
		<div id="section_menu2">
			<div class="btn-group">
			{foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
				<a href="{url link=$aSubMenu.url)}" class="btn btn-default {if Phpfox::isMobile()}btn-xs{else}btn-sm{/if}{if substr($aSubMenu.url, -16) != '#friend-add-list'} mac-ajaxify{/if}">
					{if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -8) == '.compose'}<i class="icon-cloud-upload"></i> {/if}{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}
				</a>
			{/foreach}
			</div>
		</div>
	{/if}
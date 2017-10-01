{if !Phpfox::getParam('macore.mac_bootstrap_submenu_off') && isset($aFilterMenus) && is_array($aFilterMenus) && count($aFilterMenus)}
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Submenu</h3>
		</div>
		<ul class="list-group">
			{foreach from=$aFilterMenus name=filtermenu item=aFilterMenu}
				{if isset($aFilterMenu.name)}
				<li class="{if $aFilterMenu.active}active{/if} list-group-item">
					{if !$aFilterMenu.active}<a href="{$aFilterMenu.link}">{/if}
					{$aFilterMenu.name}
					{if !$aFilterMenu.active}</a>{/if}
				</li>
				{/if}
			{/foreach}
		</ul>
	</div>
{/if}
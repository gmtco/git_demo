{if isset($aInstalledPages) && is_array($aInstalledPages) && count($aInstalledPages)}

	<div class="panel panel-default block mac-panel-pages-apps">

		<div class="panel-heading title">
			<h3 class="panel-title">{phrase var='pages.pages'}</h3>
		</div>

		<div class="panel-body">
			<div class="block_listing_inline">
				<ul>
				{foreach from=$aInstalledPages item=aInstalledPage}
				<li>
					<a href="{$aInstalledPage.link}" class="mac-tooltip" data-placement="right" title="{$aInstalledPage.title|clean}">
						{img server_id=$aInstalledPage.user_server_id title=$aInstalledPage.title path='core.url_user' file=$aInstalledPage.user_image suffix='_120_square' max_width=80 max_height=80 class='js_hover_title'} 
					</a>
				</li>
				{/foreach}
				</ul>
			</div>
		</div>

		{if count($aInstalledPages) > $iPageLimit}
		<div class="panel-footer">
			<a href="{url link='pages' view='my'}">{phrase var='pages.view_more'}</a>
		</div>
		{/if}

	</div>

{/if}



{if isset($aInstalledApps) && is_array($aInstalledApps) && count($aInstalledApps)}

	<div class="panel panel-default block mac-panel-pages-apps">

		<div class="panel-heading title">
			<h3 class="panel-title">{phrase var='apps.apps'}</h3>
		</div>

		<div class="panel-body">
			<div class="block_listing_inline">
				<ul>
				{foreach from=$aInstalledApps item=aInstalledApp}
				<li>
					<a href="{permalink module='apps' id=$aInstalledApp.app_id title=$aInstalledApp.app_title}" class="mac-tooltip" data-placement="right" title="{$aInstalledApp.app_title|clean}">
						{img server_id=0 path='app.url_image' file=$aInstalledApp.image_path title=$aInstalledApp.app_title suffix='_120_square' max_width=80 max_height=80 class='js_hover_title'}
					</a>
				</li>
				{/foreach}
				</ul>
			</div>
		</div>

		{if count($aInstalledApps) > $iPageLimit}
		<div class="panel-footer">
			<a href="{url link='apps' view='installed'}">{phrase var='pages.view_more'}</a>
		</div>
		{/if}

	</div>

{/if}
{if !Phpfox::isModule('pinpages')}

	{if count($aPages)}
	{if $sView == 'my' && Phpfox::getUserBy('profile_page_id')}
	<div class="alert alert-info">
		{phrase var='pages.note_that_pages_displayed_here_are_pages_created_by_the_page' global_full_name=$sGlobalUserFullName|clean profile_full_name=$aGlobalProfilePageLogin.full_name|clean}
	</div>
	{/if}

	{if Phpfox::getUserParam('pages.can_moderate_pages')}
	<hr class="invisible">
	{moderation}
	<hr class="invisible">
	{/if}

	<div class="mac-isotope2-wrapper">
	<div id="mac-isotope2" class="row mac-isotope2-pages">

	{foreach from=$aPages name=pages item=aPage}
	<div id="js_pages_{$aPage.page_id}" class="mac-browse-pages">		
		<div class="mac-element col-xs-12 col-sm-6 col-md-3">
		<div class="thumbnail">	

			<a href="{$aPage.link}">
				{img max_height='1000' max_width='500' server_id=$aPage.profile_server_id title=$aPage.title path='core.url_user' file=$aPage.profile_user_image suffix='' class='mac-img-fullwidth' is_page_image=true}
			</a>

			<div class="caption">

	   			<h4>
					<a href="{$aPage.link}">
						{$aPage.title|clean|shorten:55:'...'|split:40}
					</a>
	   			</h4>

				{$aPage.category_name|convert}
				{if $aPage.page_type == '1'}
				<br><br>
					{if $aPage.total_like > 1}
					{phrase var='pages.total_members' total=$aPage.total_like|number_format}
					{elseif $aPage.total_like == 1}
					{phrase var='pages.1_member'}
					{else}
					{phrase var='pages.no_members'}
					{/if}

				{/if}
			
				{if $aPage.page_type == '0'}
				<br><br>
				{module name='feed.comment' aFeed=$aPage.aFeed}				
				{/if}

				{if Phpfox::getUserParam('pages.can_moderate_pages') || $aPage.user_id == Phpfox::getUserId()}
					<div class="btn-group">

						<a rel="tooltip" data-placement="bottom" data-toggle="tooltip" title="{phrase var='pages.manage'}" class="btn btn-default btn-sm" href="{url link='pages.add' id=$aPage.page_id}">
							<i class="icon-cogs"></i>
						</a>

						{if Phpfox::getUserParam('pages.can_design_pages') && isset($aPage.is_admin) && $aPage.is_admin}
							<a rel="tooltip" data-placement="bottom" data-toggle="tooltip" title="{phrase var='pages.customize_design'}" class="no_ajax_link btn btn-default btn-sm" href="{$aPage.link}designer/">
								<i class="icon-magic"></i>
							</a>
						{/if}

						{if Phpfox::getUserParam('pages.can_add_cover_photo_pages')}
						<div class="btn-group">
							<a rel="tooltip" data-placement="bottom" data-toggle="dropdown" title="{if empty($aPage.cover_photo_id)}{phrase var='user.add_a_cover'}{else}{phrase var='user.change_cover'}{/if}" href="#" class="btn btn-default btn-sm">
								<i class="icon-picture"></i>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="{url link='pages.'$aPage.page_id}photo">
										{phrase var='user.choose_from_photos'}
									</a>
								</li>
								<li>
									<a href="#" onclick="$(this).parent().find('.cover_section_menu_drop:first').hide(); $Core.box('profile.logo', 500, 'page_id={$aPage.page_id}'); return false;">
										{phrase var='user.upload_photo'}
									</a>
								</li>
								{if !empty($aPage.cover_photo_id)}
									<li>
										<a href="{$aPage.link}coverupdate_1">
											{phrase var='user.reposition'}
										</a>
									</li>
									<li>
										<a href="#" onclick="$(this).parent().find('.cover_section_menu_drop:first').hide(); $.ajaxCall('pages.removeLogo', 'page_id={$aPage.page_id}'); return false;">
											{phrase var='user.remove'}
										</a>
									</li>
								{/if}
							</ul>
						</div>
		
						{if Phpfox::getUserParam('pages.can_moderate_pages') || $aPage.user_id == Phpfox::getUserId()}
						<a rel="tooltip" data-placement="bottom" data-toggle="tooltip" title="{phrase var='pages.delete'}" class="no_ajax_link btn btn-danger btn-sm" href="{url link='pages' delete=$aPage.page_id}" onclick="return confirm('{phrase var='pages.are_you_sure'}');">
							<i class="icon-remove"></i>
						</a>
						{/if}
		
						{/if}		
					</div>			
				{/if}


				{if Phpfox::getUserParam('pages.can_moderate_pages')}
				<a class="moderate_link" rel="pages" href="#{$aPage.page_id}">Moderate</a>
				{/if}

				<div class="clear"></div>

			</div>	

		</div>	
		</div>
	</div>
	{/foreach}

	</div>
	</div>

	<div class="clear"></div>

	{pager}

	{else}

		<div class="alert alert-info">
			{phrase var='pages.no_pages_found'}
		</div>

	{/if}
	
{/if}
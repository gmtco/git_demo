<div{if Phpfox::getService('profile')->timeline()} class="profile_timeline_header_holder"{/if}>
		<div class="profile_header{if Phpfox::getService('profile')->timeline()} profile_timeline_header{/if}{if (empty($aUser.cover_photo) && (!isset($aUser.cover_photo_id) || $aUser.cover_photo_id < 1)) || !Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_profile')} no_cover_photo_off {/if}">

			{*if true || Phpfox::getService('profile')->timeline()*}
			{if Phpfox::getService('profile')->timeline()}
				{module name='profile.pic'}
			{/if}

			{*inner class profile_header_inner => if true || Phpfox::getService('profile')->timeline()*}
			<div class="profile_header_inner{if Phpfox::getService('profile')->timeline()} profile_header_timeline{/if}">				
			
				
				<div id="section_menu2">
					<div class="btn-group">
						{if defined('PHPFOX_IS_USER_PROFILE_INDEX') || defined('PHPFOX_PROFILE_PRIVACY') || Phpfox::getLib('module')->getFullControllerName() == 'profile.info'}
									
						{if Phpfox::getUserId() == $aUser.user_id}

					    {if Phpfox::getUserParam('profile.can_change_cover_photo')}

					    <div class="btn-group">
						<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default dropdown-toggle" data-toggle="dropdown" href="#" id="js_change_cover_photo" onclick="$('#cover_section_menu_drop').toggle(); return false;">
							{if empty($aUser.cover_photo)}{phrase var='user.add_a_cover'}{else}{phrase var='user.change_cover'}{/if} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
      						<li>
							<a href="{url link='profile.photo'}">
								{phrase var='user.choose_from_photos'}
							</a>
							</li>
							<li>
							<a href="#" onclick="$('#cover_section_menu_drop').hide(); $Core.box('profile.logo', 500); return false;">
								{phrase var='user.upload_photo'}
							</a>
							</li>
							<li>
							{if !empty($aUser.cover_photo)}
							<a href="{url link='profile' coverupdate='1'}">
								{phrase var='user.reposition'}
							</a>
							</li>
							<li>
							<a href="#" onclick="$('#cover_section_menu_drop').hide(); $.ajaxCall('user.removeLogo'); return false;">
								{phrase var='user.remove'}
							</a>
							</li>
							{/if}
						</ul>


						</div>
					    {/if}

						<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default" href="{url link='user.profile'}">
							{phrase var='profile.edit_profile'}
						</a>

						{if Phpfox::getUserParam('profile.can_custom_design_own_profile')}
						    <a href="{url link='profile.designer'}" class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default no_ajax_link">
						    	{phrase var='profile.design_profile'}
						    </a>
						{/if}

						{else}

						{if Phpfox::isModule('mail') && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'mail.send_message')}
							<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default no-ajaxy" href="#" onclick="$Core.composeMessage({left_curly}user_id: {$aUser.user_id}{right_curly}); return false;">
								{phrase var='profile.send_message'}
							</a>
						{/if}

						{if Phpfox::isUser() && Phpfox::isModule('friend') && Phpfox::getUserParam('friend.can_add_friends') && !$aUser.is_friend && $aUser.is_friend_request !== 2}
						{* <span id="js_add_friend_on_profile"{if !$aUser.is_friend && $aUser.is_friend_request === 3} class="js_profile_online_friend_request"{/if}> *}
							<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default no-ajaxy" href="#" onclick="return $Core.addAsFriend('{$aUser.user_id}');" title="{phrase var='profile.add_to_friends'}">
								{if !$aUser.is_friend && $aUser.is_friend_request === 3}{phrase var='profile.confirm_friend_request'}{else}{phrase var='profile.add_to_friends'}{/if}
							</a>
						{* </span> *}
						{/if}

						{if $bCanPoke && Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'poke.can_send_poke')}
						{* <span id="liPoke"> *}
							<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default no-ajaxy" href="#" id="section_poke" onclick="$Core.box('poke.poke', 400, 'user_id={$aUser.user_id}'); return false;">
								{phrase var='poke.poke' full_name=''}
							</a>
						{* </span> *}
						{/if}

						{plugin call='profile.template_block_menu_more'}

						{if (Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others'))
							|| (isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1)
							|| (Phpfox::getUserParam('user.can_feature'))
							|| (isset($bPassMenuMore))
							|| (Phpfox::getUserParam('core.can_gift_points'))
						}

						<div class="btn-group">
						{if Phpfox::getUserBy('profile_page_id') <= 0}

						<a href="#" class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default dropdown-toggle" data-toggle="dropdown">
							<i class="icon-caret-down"></i>
						</a>

						<ul class="dropdown-menu">
      					
						{if Phpfox::getUserParam('user.can_block_other_members') && isset($aUser.user_group_id) && Phpfox::getUserGroupParam('' . $aUser.user_group_id . '', 'user.can_be_blocked_by_others')}
						<li>
						<a class='inlinePopup js_block_this_user no-ajaxy' href="#?call=user.block&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" title="{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}">
							{if $bIsBlocked}{phrase var='profile.unblock_this_user'}{else}{phrase var='profile.block_this_user'}{/if}
						</a>
						</li>
						{/if}

						{if isset($aUser.is_online) && $aUser.is_online && Phpfox::isModule('im') && Phpfox::getParam('im.enable_im_in_footer_bar') && $aUser.is_friend == 1}
						<li>
						<a class='inlinePopup js_gift_points no-ajaxy' href="#" onclick="$.ajaxCall('im.chat', 'user_id={$aUser.user_id}'); return false;">
							{phrase var='profile.instant_chat'}
						</a>
						</li>
						{/if}

						{if Phpfox::getUserParam('user.can_feature')}
						<li {if isset($aUser.is_featured) && !$aUser.is_featured} style="display:none;" {/if} class="user_unfeature_member">
						<a class='no-ajaxy' href="#" title="{phrase var='profile.un_feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#section_menu_drop').find('.user_feature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=0&amp;type=1'); return false;">
							{phrase var='profile.unfeature'}
						</a>
						</li>
						<li {if isset($aUser.is_featured) && $aUser.is_featured} style="display:none;" {/if} class="user_feature_member">
						<a class='no-ajaxy' href="#" title="{phrase var='profile.feature_this_member'}" onclick="$(this).parent().hide(); $(this).parents('#section_menu_drop').find('.user_unfeature_member:first').show(); $.ajaxCall('user.feature', 'user_id={$aUser.user_id}&amp;feature=1&amp;type=1'); return false;">
							{phrase var='profile.feature'}
						</a>
						</li>
						{/if}

						{if Phpfox::getUserParam('core.can_gift_points')}
						<li>
						<a class='inlinePopup js_gift_points no-ajaxy' href="#?call=core.showGiftPoints&amp;height=120&amp;width=400&amp;user_id={$aUser.user_id}" title="{phrase var='core.gift_points'}">
							{phrase var='core.gift_points'}
						</a>
						</li>
						{/if}

						{if Phpfox::getUserParam('friend.link_to_remove_friend_on_profile') && isset($aUser.is_friend) && $aUser.is_friend === true}
						<li>
						<a class='no-ajaxy' href="#" onclick="if (confirm('{phrase var='core.are_you_sure'}'))$.ajaxCall('friend.delete', 'friend_user_id={$aUser.user_id}&reload=1'); return false;">
							{phrase var='friend.remove_friend'}
						</a>
						</li>
						{/if}
						{plugin call='profile.template_block_menu'}

						{/if}

						</div>
						
						{/if}

						{/if}
					
						{elseif Phpfox::getLib('module')->getFullControllerName() == 'friend.profile'}

					    {if Phpfox::getUserId() == $aUser.user_id}
						<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default" href="{url link='friend'}">
							{phrase var='profile.edit_friends'}
						</a>
					    {/if}

						{else}

						<!-- <div class="btn-group"> -->
					    {foreach from=$aSubMenus key=iKey name=submenu item=aSubMenu}
					
						
				<a href="{url link=$aSubMenu.url)}" class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default ajax_link">
				    {if substr($aSubMenu.url, -4) == '.add' || substr($aSubMenu.url, -7) == '.upload' || substr($aSubMenu.url, -8) == '.compose'}
						{img theme='layout/section_menu_add.png' class='v_middle'}
					{/if}
					{if isset($aSubMenu.text)}
						{$aSubMenu.text}
					{else}
						{phrase var=$aSubMenu.module'.'$aSubMenu.var_name}
					{/if}
				</a>				
						
					    {/foreach}
					    
						{if (isset($aUser.is_app) && $aUser.is_app ) || ( isset($aPage) && isset($aPage.is_admin) && !$aPage.is_admin)}
						{if isset($aPage) && $aPage.is_app}
						<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default" href="{permalink module='apps' id=$aPage.app_id title=$aPage.title}">
							{phrase var='pages.go_to_app'}
						</a>
						{/if}
						{if isset($aPage) && !$aPage.is_admin}
						<a class="{if Phpfox::isMobile()}btn-xs{else}btn-sm{/if} btn btn-default" href="{url link='pages.add'}">
							{phrase var='pages.create_a_page'}
						</a>
						{/if}
						<!-- </div> -->
						{/if}
					
						{/if}
					</div>
				</div>

				<!-- section menu more -->
				
				{if isset($aUser.is_online) && $aUser.is_online || $aUser.is_friend === 2 || $aUser.is_friend === 3}
					<span class="profile_online_status">
						{if !$aUser.is_friend && $aUser.is_friend_request === 2}
							<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_confirmation'}{if $aUser.is_online} &middot; {/if}</span>
						{elseif !$aUser.is_friend && $aUser.is_friend_request === 3}
							<span class="js_profile_online_friend_request">{phrase var='profile.pending_friend_request'}{if $aUser.is_online} &middot; {/if}</span>
						{/if}
						{if $aUser.is_online}
							({phrase var='profile.online'})
						{/if}
					</span>
				{/if}
				
				<h1>		
					{if isset($aUser.user_name)}
				    <a rel="prettySociable" href="{if isset($aUser.link) && !empty($aUser.link)}{url link=$aUser.link}{else}{url link=$aUser.user_name}{/if}" title="{$aUser.full_name|clean}">
					   {$aUser.full_name|clean|split:30|shorten:50:'...'}
				    </a>
					{else}					
						{if isset($aUser.page_user_id) && isset($aUser.use_timeline) && $aUser.use_timeline}
						{else}
							{if isset($aPage.title)}
			                <a rel="prettySociable" href="{$aPage.link}">{$aPage.title}</a>
							{/if}
						{/if}
					{/if}
                    {foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}{if $phpfox.iteration.link == 1}<span class="profile_breadcrumb">&#187;</span><a href="{$sLink}">{$sCrumb}</a>{/if}{/foreach}
				</h1>
				
				
				<div class="profile_info">
					{if Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_location') && (!empty($aUser.city_location) || !empty($aUser.country_child_id) || !empty($aUser.location))}
						{phrase var='profile.lives_in'} {if !empty($aUser.city_location)}{$aUser.city_location}{/if}
						{if !empty($aUser.city_location) && (!empty($aUser.country_child_id) || !empty($aUser.location))},{/if}
						{if !empty($aUser.country_child_id)}&nbsp;{$aUser.country_child_id|location_child}{/if} {if !empty($aUser.location)}{$aUser.location}{/if} &middot;
					{/if}
					{if isset($aUser.birthdate_display) && is_array($aUser.birthdate_display) && count($aUser.birthdate_display)}
						{foreach from=$aUser.birthdate_display key=sAgeType item=sBirthDisplay}
							{if $aUser.dob_setting == '2'}
								{phrase var='profile.age_years_old' age=$sBirthDisplay}
							{else}
								{phrase var='profile.born_on_birthday' birthday=$sBirthDisplay}
							{/if}
						{/foreach}
					{/if}
					{if Phpfox::getParam('user.enable_relationship_status') && isset($sRelationship) && $sRelationship != ''}&middot; {$sRelationship} {/if}
					
					{if isset($aUser.category_name)}{$aUser.category_name|convert}{/if}
				</div>

			</div>
		</div>
		{*if true || Phpfox::getService('profile')->timeline() && (Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_profile'))*}
		{if Phpfox::getService('profile')->timeline() && (Phpfox::getService('user.privacy')->hasAccess('' . $aUser.user_id . '', 'profile.view_profile'))}
			<div class="navbar navbar-default mac-boot-megamenu">
  				<div class="container">

				    <div class="navbar-header">
				      <!-- toggle-menu -->
				  	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-timeline">
				  		<span class="sr-only">Toggle</span>
				      	<span class="icon-bar"></span>
				  		<span class="icon-bar"></span>
				  		<span class="icon-bar"></span>
				  	  </button>
				    </div>
			    	<div class="navbar-collapse collapse mac-navbar-timeline navbar-collapse-timeline">

			      	<ul class="nav navbar-nav">
						{foreach from=$aProfileLinks item=aProfileLink}
							<li class="{if isset($aProfileLink.is_selected)} active{/if}">
								<a href="{url link=$aProfileLink.url}" class="ajax_link">
									{$aProfileLink.phrase}
									{if isset($aProfileLink.total)}
									<span class="badge">{$aProfileLink.total|number_format}</span>
									{/if}</a>
								{if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
								{*
									<ul>
									{foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
										<li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}</a></li>
									{/foreach}
									</ul>
								*}
								{/if}
							</li>
						{/foreach}
					</ul>
					</div>
				</div>
			</div>
		{/if}
	</div>
{block location='12'}
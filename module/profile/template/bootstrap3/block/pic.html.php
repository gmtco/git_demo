<?php
$this->_aVars['sProfileImage'] = str_replace('_120_square', '_200_square', $this->_aVars['sProfileImage']);
$this->_aVars['sProfileImage'] = str_replace('width="120"', 'width="100%"', $this->_aVars['sProfileImage']);
$this->_aVars['sProfileImage'] = str_replace('height="120"', 'height="auto"', $this->_aVars['sProfileImage']);
?>
{if Phpfox::getService('profile')->timeline()}

    {if !empty($sProfileImage)}
	    <div class="profile_timeline_profile_photo">
		    <div class="profile_image">
			{if Phpfox::isModule('photo')}
				{if isset($aUser.user_name)}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
				{else}
				    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
				{/if}
			{else}
				{$sProfileImage}
			{/if}
			{if Phpfox::getUserId() == $aUser.user_id}
			    <div class="p_4">
				    <a href="{if isset($aPage) && isset($aPage.page_id)}{url link='pages.add' id=$aPage.page_id}#photo{else}{url link='user.photo'}{/if}">{phrase var='profile.change_picture'}</a>
			    </div>
			{/if}
		    </div>
			<div style="position:absolute; bottom:0px; z-index:100; width:100%;">
				{if isset($aUser.user_name)}
				{if isset($aPage.title)}
				{template file='pages.block.joinpage'}
				{/if}
				{/if}
			</div>
	    </div>
    {/if}

{else}


{if !empty($sProfileImage)}
    <div class="profile_image">
	<div class="profile_image_holder">
	    {if Phpfox::isModule('photo')}
		{if isset($aUser.user_name)}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
		    <a href="{permalink module='photo.album.profile' id=$aUser.user_id}">{$sProfileImage}</a>
		{/if}
	    {else}
		    {$sProfileImage}
	    {/if}
	</div>
	    {if Phpfox::getUserId() == $aUser.user_id}
	    <div class="p_4">
		    <a href="{url link='user.photo'}">{phrase var='profile.change_picture'}</a>
	    </div>
	    {/if}
    </div>
{/if}

{if false && Phpfox::getUserId() == $aUser.user_id && Phpfox::getParam('macore.mac_bootstrap_enable_tour') && !Phpfox::isMobile()}
<a href="" class="btn-xs btn btn-default btn-block dont-unbind" id="start">Start tour <i class="icon-play"></i></a>
<br><br>
{/if}

	<ul class="list-group">		
		{foreach from=$aProfileLinks item=aProfileLink}
			<li class="{if isset($aProfileLink.is_selected)} active {/if}list-group-item">
				

			  <a href="{url link=$aProfileLink.url}" class="ajax_link">
		       {if strpos($aProfileLink.icon, 'video')!==false}
		       <i class="icon-facetime-video"></i>
		       {elseif strpos($aProfileLink.icon, 'comment')!==false}
		       <i class="icon-comments"></i>
		       {elseif strpos($aProfileLink.icon, 'application_view_list')!==false}
		       <i class="icon-info-sign"></i>
		       {elseif strpos($aProfileLink.icon, 'blog')!==false}
		       <i class="icon-edit"></i>
		       {elseif strpos($aProfileLink.icon, 'event')!==false}
		       <i class="icon-calendar"></i>
		       {elseif strpos($aProfileLink.icon, 'photo')!==false}
		       <i class="icon-camera"></i>
		       {elseif strpos($aProfileLink.icon, 'quiz')!==false}
		       <i class="icon-question-sign"></i>
		       {elseif strpos($aProfileLink.icon, 'group')!==false}
		       <i class="icon-group"></i>
		       {elseif strpos($aProfileLink.icon, 'poll')!==false}
		       <i class="icon-tasks"></i>
		       {elseif strpos($aProfileLink.icon, 'marketplace')!==false}
		       <i class="icon-shopping-cart"></i>
		       {elseif strpos($aProfileLink.icon, 'music')!==false}
		       <i class="icon-music"></i>
		       {else}
		       <i class="icon-angle-right"></i>
		       {/if}
		          {$aProfileLink.phrase}
		       </a>
		          {if isset($aProfileLink.total)}
		          <span class="badge">{$aProfileLink.total|number_format}</span>
		          {/if}


				{if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
				<ul>
				{foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
					<li class="{if isset($aProfileLinkSub.is_selected)} active {/if}list-group-item">
						<a href="{$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a>
					</li>
				{/foreach}
				</ul>
				{/if}
			</li>
		{/foreach}
	</ul>

{/if}

    <div class="clear"></div>
    <div class="js_cache_check_on_content_block" style="display:none;"></div>
    <div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
    <div class="js_cache_profile_user_name" style="display:none;">{if isset($aUser.user_name)}{$aUser.user_name}{/if}</div>
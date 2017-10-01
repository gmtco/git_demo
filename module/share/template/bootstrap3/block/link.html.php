{if $sBookmarkDisplay == 'menu'}
<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" data-original-title="{phrase var='macore.spread_the_world_share_this_feed'}" href="#" class="mac-btn-share btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" onclick="tb_show('{phrase var='share.share' phpfox_squote=true}', $.ajaxBox('share.popup', 'height=300&amp;width=550&amp;type={$sBookmarkType}&amp;url={$sBookmarkUrl}&amp;title={$sBookmarkTitle}{if isset($sFeedShareId) && $sFeedShareId > 0}&amp;feed_id={$sFeedShareId}{/if}{if isset($sFeedType)}&amp;is_feed_view=1{/if}&amp;sharemodule={$sShareModuleId}')); return false;">
	<i class="icon-share"></i>{if !Phpfox::isMobile()} <span>{phrase var='share.share'}</span>{/if}
</a>
{elseif $sBookmarkDisplay == 'menu_link'}
<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" data-original-title="{phrase var='macore.spread_the_world_share_this_feed'}" class="mac-btn-share btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" href="#" onclick="tb_show('{phrase var='share.share' phpfox_squote=true}', $.ajaxBox('share.popup', 'height=300&amp;width=550&amp;type={$sBookmarkType}&amp;url={$sBookmarkUrl}&amp;title={$sBookmarkTitle}')); return false;">
	<i class="icon-share"></i>{if !Phpfox::isMobile()} <span>{phrase var='share.share'}</span>{/if}
</a>
{elseif $sBookmarkDisplay == 'image'}
<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" data-original-title="{phrase var='macore.spread_the_world_share_this_feed'}" class="mac-btn-share btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" href="#" onclick="tb_show('{phrase var='share.share' phpfox_squote=true}', $.ajaxBox('share.popup', 'height=300&amp;width=350&amp;type={$sBookmarkType}&amp;url={$sBookmarkUrl}&amp;title={$sBookmarkTitle}')); return false;">
	<i class="icon-share"></i>{if !Phpfox::isMobile()} <span>{phrase var='share.share'}</span>{/if}
</a>
{else}
	<a data-placement="bottom" rel="tooltip" data-toggle="tooltip" data-original-title="{phrase var='macore.spread_the_world_share_this_feed'}" class="mac-btn-share btn {template file='macore.block.bootstrap3-btn-class'} btn-xs" href="#" onclick="tb_show('{phrase var='share.share' phpfox_squote=true}', $.ajaxBox('share.popup', 'height=300&amp;width=350&amp;type={$sBookmarkType}&amp;url={$sBookmarkUrl}&amp;title={$sBookmarkTitle}')); return false;">
		<i class="icon-share"></i>{if !Phpfox::isMobile()} <span>{phrase var='share.share'}</span>{/if}
	</a>
{/if}
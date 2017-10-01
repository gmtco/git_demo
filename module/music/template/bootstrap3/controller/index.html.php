{if !Phpfox::isModule('pinmusic') || defined('PHPFOX_IS_PAGES_VIEW') || isset($aPage)}
  
  {if count($aSongs)}
  {foreach from=$aSongs name=songs item=aSong}
  	{template file='music.block.entry'}
  {/foreach}
  {if Phpfox::getUserParam('music.can_approve_songs') || Phpfox::getUserParam('music.can_delete_other_tracks') || Phpfox::getUserParam('music.can_feature_songs')}
  {moderation}
  {/if}
  {pager}
  {else}
  <div class="extra_info">
  	{phrase var='music.no_songs_found'}
  </div>
  {/if}

{/if}
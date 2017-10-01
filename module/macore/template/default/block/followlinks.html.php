	{if Phpfox::getUserId() && Phpfox::isModule('pinfollow')}
	  {if $aPin.user_id != $aGlobalUser.user_id}
	  <a href="javascript:void(0);" onclick="$Core.box('pinfollow.addFollow', 500, 'following={$aPin.user_id}&follower={$aGlobalUser.user_id}');$(this).hide();$(this).next('.btn').show();return false;" 
	  style='margin:0;{if $aPin.iFollowThis > 0}display:none{/if}' class="btn btn-block btn-default">{phrase var='pinuser.follow'}</a>
	  <a href="javascript:;" onclick="$Core.box('pinfollow.removeFollow', 500, 'following={$aPin.user_id}&follower={$aGlobalUser.user_id}');$(this).hide();$(this).prev('.btn').show();return false;" 
	  style='margin:0;width:90px;{if $aPin.iFollowThis == 0}display:none{/if}' class="btn btn-block btn-danger">{phrase var='pinuser.unfollow'}</a>
	  {else}
	  {/if}
	{/if}
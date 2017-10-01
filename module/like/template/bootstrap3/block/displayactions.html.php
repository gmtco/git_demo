{if Phpfox::getParam('like.show_user_photos')}	
	<a data-placement="left" data-toggle="tooltip" rel="tooltip" data-original-title="People who dislike this" href="#" class="dislike_count_link reaalllyyy" onclick="return $Core.box('like.browse', 400, 'dislike=1&amp;type_id={$sType}&amp;item_id={$iId}');">
		<i class="icon-thumbs-down"></i> {$iCount}
	</a>	
{else}
	<div class="display_actions" id="display_actions_{if isset($aLike)}{$aLike.like_item_id}{else}{if isset($aFeed)}{$aFeed.feed_id}{/if}{/if}">
		<div class="comment_mini_content_holder">	
			<div class="comment_mini_content_holder_icon"></div>		
			<div class="comment_mini_content_border">						
				<div class="js_comment_like_holder" id="">		
				
					{foreach from=$aActions key=sKey item=aAction}
						{if isset($aAction.phrase) && strlen($aAction.phrase) > 3}
							<div class="activity_like_holder comment_mini">
								<i class="icon-thumbs-down"></i>
								&nbsp;
								{$aAction.phrase}
							</div>
						{/if}
					{/foreach}		
				</div>
			</div>
		</div>
	</div>
{/if}
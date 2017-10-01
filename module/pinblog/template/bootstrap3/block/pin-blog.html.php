<div class="box-caption">

<div class="box-title">
	<div class="box-blog-content">
		{$aPin.ITEMDESCRIPTION|shorten:250:'...'|split:55}
	</div>
	<a href="{$aPin.ITEMBOOKMARK}">{phrase var='pin.read_more'} &raquo;</a>
</div>

<div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="{img user=$aPin suffix='_50_square' return_url=true}" alt="$aPin.user_name">
  </a>
  <div class="media-body">
    <h4 class="media-heading">        
    <a href="{url link=$aPin.user_name}">{$aPin.full_name}</a> {phrase var='pin.user_shared_x'} {phrase var='pin.blog'}      
    <span class="mac-post-time">
      {phrase var='pin.posted_on'} {$aPin.ITEMPOSTEDON}
    </span>
    </h4>
  </div>
</div>

{if Phpfox::getUserId()}  
<div class="box-caption-bottom clearfix">

       <div class="mac-favorites-link">

        {template file='macore.block.bootpin-favoriteslink'}

	      <a data-placement="bottom" data-original-title="{phrase var='macore.mac_more_link_tooltip'}" class="btn-xs mac-tooltip btn btn-default dropdown-toggle" data-toggle="dropdown">
	        <i class="icon-reorder"></i> <span>{phrase var='macore.mac_more_link'}</span>
	      </a>
	    <ul class="dropdown-menu" role="menu">
			{template file='macore.block.bootpin-box-link1'}
			{template file='macore.block.bootpin-reportlink'}
			{if ($aPin.user_id == Phpfox::getUserId() && Phpfox::getUserParam('blog.edit_own_blog')) || Phpfox::getUserParam('blog.edit_user_blog')}
			<li>
			<a title="{phrase var='core.edit'}" href="{url link='blog.add' id=$aPin.ITEMID}">
			<i class="icon-edit"></i> {phrase var='core.edit'}
			</a>
			</li>
			{/if}
			{if Phpfox::isAdmin() || Phpfox::getUserId() == $aPin.user_id}
			<li>
			<a title="{phrase var='blog.delete_blog'}" href="{url link='photo' delete=$aPin.ITEMID}" onclick="if(confirm('{phrase var='macore.sure_delete_this_post'}'))$.ajaxCall('pin.deletePin','delete={$aPin.ITEMID}&media=blog&feedid={$aPin.feed_id}');return false;">
			<i class="icon-remove"></i> {phrase var='blog.delete_blog'}
			</a>
			</li>
			{/if}
		</ul>

  </div> 

</div>

 {/if} 

</div>

<div class="clear"></div>

<div class="pin_comments js_parent_feed_entry">
{module 
name='pin.comments' 
feedType='blog' 
feedCommentItemId=$aPin.ITEMID 
feedUserId=$aPin.user_id 
feedUrl=$aPin.ITEMBOOKMARK 
feedTitle=$aPin.ITEMTITLE 
feedTotalComment=$aPin.ITEMTOTALCOMMENT 
feedTotalLike=$aPin.ITEMTOTALLIKE 
feedPrivacy=$aPin.ITEMPRIVACY 
feedCommentPrivacy=$aPin.ITEMPRIVACYCOMMENT
feedId = $aPin.feed_id
feedComment = $aPin.comments
}
</div>
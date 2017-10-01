<div id="chatrooms_online_users">
<div class="block_listing_inline">
	<ul>
{foreach from=$aUsers name=users item=aUser}
		<li style="width:40px">
        {img user=$aUser suffix='_50_square' max_width=32 max_height=32 class='js_hover_title'}
        </li>
{/foreach}
	</ul>
	<div class="clear"></div>
</div>
</div>
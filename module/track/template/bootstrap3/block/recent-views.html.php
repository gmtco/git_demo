<div class="block_listing_inline">
	<ul>
{foreach from=$aLatestUsers name=latestusers key=iLatestUser item=aLatestUser}
		<li>{img user=$aLatestUser suffix='_50_square' max_width=50 max_height=50 class='js_hover_title'}</li>
{/foreach}
	</ul>
	<div class="clear"></div>
</div>
<div class="panel panel-success" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<div class="panel-heading">
		<h3 class="panel-title" itemprop="price">{$sListingPrice}</h3>
	</div>
	{if $aListing.user_id != Phpfox::getUserId()}
	<div class="panel-body">
		<a href="#" class="btn btn-default btn-block" onclick="$Core.composeMessage({l}user_id: {$aListing.user_id}{r}); return false;">
			{phrase var='marketplace.contact_seller'}
		</a>
		{if $aListing.is_sell && $aListing.view_id != '2' && $aListing.price != '0.00'}
		<div class="mac-mrg-tp marketplace_price_holder_button">
			<form method="post" action="{url link='marketplace.purchase'}">
				<div><input type="hidden" name="id" value="{$aListing.listing_id}" /></div>
				<input type="submit" value="{phrase var='marketplace.buy_it_now'}" class="btn btn-block btn-danger" />			
			</form>
		</div>
		{/if}	
	</div>
	{/if}
</div>	

{module name='marketplace.info'}
{plugin call='marketplace.template_default_controller_view_extra_info'}
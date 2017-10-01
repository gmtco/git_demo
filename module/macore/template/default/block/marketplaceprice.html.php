<span class="badge" itemprop="price">{$sListingPrice}</span>

{if $aListing.user_id != Phpfox::getUserId()}
<div class="mac-marketplace-price-details mac-mrg-tp">
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

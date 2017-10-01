{if !Phpfox::isModule('pinmarketplace')}

	{if !count($aListings)}
	<div class="alert alert-info">
		{phrase var='marketplace.no_marketplace_listings_found'}
	</div>
	{else}

	{if Phpfox::getUserParam('marketplace.can_delete_other_listings') || Phpfox::getUserParam('marketplace.can_feature_listings') || Phpfox::getUserParam('marketplace.can_approve_listings')}
	{moderation}
	{/if}

	<div id="mac-isotope2-wrapper">
	<div id="mac-isotope2" class="row">
	{foreach from=$aListings name=listings item=aListing}
	<div id="js_mp_item_holder_{$aListing.listing_id}" class="mac-marketplace-element js_listing_parent">
		<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mac-element">
		{item name='Product'}	

			{if $aListing.view_id == '1' && !isset($bIsInPendingMode)}
			<div class="label label-warning">
				{phrase var='marketplace.pending_approval'}
			</div>
			{/if}		

		
		<a href="{$aListing.url}">
			{img server_id=$aListing.server_id title=$aListing.title path='marketplace.url_image' file=$aListing.image_path suffix='' max_width='500' max_height='1000' class='img-responsive' itemprop='image'}
		</a>

		<h4 itemprop="name">		
			{img user=$aListing suffix='_50_square' max_width='50' max_height='50'}

			<a href="{$aListing.url}" class="link" title="{$aListing.title|clean}" itemprop="url">
				{$aListing.title|clean|shorten:100:'...'|split:25}
			</a>
			{if $aListing.view_id == '2'}
			<span class="marketplace_item_sold">({phrase var='marketplace.sold'})</span>
			{/if}
		</h4>
								
		<div class="marketplace_price_tag" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<span itemprop="price">
		    {if $aListing.price == '0.00'}
			    {phrase var='marketplace.free'}
		    {else}
			    {$aListing.currency_id|currency_symbol}{$aListing.price|number_format:2}
		    {/if}
		    </span>
		</div>																
								
			<div class="extra_info">
				<span class="badge">{$aListing.time_stamp|convert_time}</span>
				<a class="badge" rel="tooltip" data-placement="bottom" data-toggle="tooltip" data-original-title="{if !empty($aListing.city)} {$aListing.city|clean} &raquo; {/if}{if !empty($aListing.country_child_id)} {$aListing.country_child_id|location_child} &raquo; {/if} {$aListing.country_iso|location}" href="{url link='marketplace' location=$aListing.country_iso}">
					{$aListing.country_iso|location}
				</a>
				by {$aListing|user:'':'':30}
			</div>

			<!--
			<a href="{$aListing.url}">
				{img server_id=$aListing.server_id title=$aListing.title path='marketplace.url_image' file=$aListing.image_path suffix='_120' max_width='120' max_height='120'}
			</a>
			-->
			
			<div class="item_content" itemprop="description">
				{$aListing.mini_description|clean|split:25|shorten:255}
			</div>	

			<hr class="invisible">		

			{module name='feed.comment' aFeed=$aListing.aFeed}			
			
						
		{if isset($aListing.is_expired)}
			<hr class="invisible">	
			<div class="label label-danger">
				{phrase var='marketplace.expired'}
			</div>
		{else}
			<hr class="invisible">	
			{if isset($sView) && $sView == 'featured'}
			{else}
				<div id="js_featured_phrase_{$aListing.listing_id}" class="label label-success"{if !$aListing.is_featured} style="display:none;"{/if}>
					{phrase var='marketplace.featured'}
				</div>					
			{/if}	
			<div id="js_sponsor_phrase_{$aListing.listing_id}" class="label label-info"{if !$aListing.is_sponsor} style="display:none;"{/if}>
				{phrase var='marketplace.sponsored'}
			</div>					
		{/if}

								
		{if ($aListing.user_id == Phpfox::getUserId() && Phpfox::getUserParam('marketplace.can_edit_own_listing')) || Phpfox::getUserParam('marketplace.can_edit_other_listing')
			|| ($aListing.user_id == Phpfox::getUserId() && Phpfox::getUserParam('marketplace.can_delete_own_listing')) || Phpfox::getUserParam('marketplace.can_delete_other_listings')
			|| (Phpfox::getUserParam('marketplace.can_feature_listings'))
		}
		<hr class="invisible">	
		<div class="row_edit_bar_parent">
			<div class="row_edit_bar_holder">
				<ul>
					{template file='marketplace.block.menu'}
				</ul>			
			</div>
			<div class="row_edit_bar">				
					<a href="#" class="row_edit_bar_action"><span>{phrase var='marketplace.actions'}</span></a>							
			</div>
		</div>		
		{/if}						
		
		{if Phpfox::getUserParam('event.can_approve_events') || Phpfox::getUserParam('event.can_delete_other_event')}
		<a href="#{$aListing.listing_id}" class="moderate_link" rel="marketplace">Moderate</a>
		{/if}


		{/item}
		</div>
	</div>
	{/foreach}
	</div>
	</div>

	{pager}
	{/if}

{/if}
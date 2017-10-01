<div class="info_holder">

	<div class="well">

		<div class="info">
			<div>
				<span class="badge">
					<span itemprop="startDate" style="display:none;">{$aEvent.start_time_micro}</span>
					{phrase var='event.time'}
				</span>
				&nbsp;&nbsp;{$aEvent.event_date}	
			</div>
		</div>	
	
		<div class="info" itemscope itemtype="http://schema.org/Place">
			<div>
				<span class="badge">
					{phrase var='event.location'}
				</span>
				&nbsp;&nbsp;			 	
				<span itemprop="name">{$aEvent.location|clean|split:60}</span>
				<span itemscope itemtype="http://schema.org/PostalAddress">
					{if !empty($aEvent.address)}
					<span class="p_2" itemprop="streetAddress">{$aEvent.address|clean}</span>
					{/if}			
					{if !empty($aEvent.city)}
					<span class="p_2" itemprop="addressLocality">{$aEvent.city|clean}</span>
					{/if}					
					{if !empty($aEvent.postal_code)}
					<span class="p_2" itemprop="postalCode">{$aEvent.postal_code|clean}</span>
					{/if}								
					{if !empty($aEvent.country_child_id)}
					<span class="p_2" itemprop="addressRegion">{$aEvent.country_child_id|location_child}</span>
					{/if}			
					<span class="p_2" itemprop="addressCountry">{$aEvent.country_iso|location}</span>
				</span>

			</div>
		</div>

		<div class="info">
			<div>
				<span class="badge">
					{phrase var='event.created_by'}
				</span>
				&nbsp;&nbsp;{$aEvent|user}	
			</div>
		</div>
	
		{if is_array($aEvent.categories) && count($aEvent.categories)}
		<div class="info">
			<div>
				<span class="badge pull-left">
					{phrase var='event.category'}
				</span>
				&nbsp;&nbsp;{$aEvent.categories|category_display}
			</div>
		</div>		
		{/if}

		<hr>
		{$aEvent.description|parse|split:70}
		<hr>

		{if isset($aEvent.map_location)}	
		<div class="info">				
			<div>			
				<div style="width:200px; height:200px; position:relative;">
					<div style="margin-left:-8px; margin-top:-8px; position:absolute; background:#fff; border:8px blue solid; width:12px; height:12px; left:50%; top:50%; z-index:200; overflow:hidden; text-indent:-1000px; border-radius:12px;">Marker</div>
					<a href="http://maps.google.com/?q={$aEvent.map_location}" target="_blank" title="{phrase var='event.view_this_on_google_maps'}"><img src="http://maps.googleapis.com/maps/api/staticmap?center={$aEvent.map_location}&amp;zoom=16&amp;size=200x200&amp;sensor=false&amp;maptype=roadmap" alt="" /></a>
				</div>		
				<div class="p_top_4">					
					<a href="http://maps.google.com/?q={$aEvent.map_location}" target="_blank">{phrase var='event.view_on_google_maps'}</a>
				</div>		
			</div>
		</div>		
		{/if}

	</div>

</div>
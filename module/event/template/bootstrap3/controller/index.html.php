{if !Phpfox::isModule('pinevent') || defined('PHPFOX_IS_PAGES_VIEW') || isset($aPage)}

	{if !count($aEvents)}
	<div class="alert alert-info">
		{phrase var='event.no_events_found'}
	</div>
	{else}

	{foreach from=$aEvents key=sDate item=aGroups}
	<div class="panel panel-default">
		<div class="panel-heading"><h3 class="panel-title">{$sDate}</h3></div>	
		<div class="border">
			<div class="panel-body">
				{foreach from=$aGroups name=events item=aEvent}
				{item name='Event'}
					<div id="js_event_item_holder_{$aEvent.event_id}" class="media js_event_parent {if $aEvent.is_sponsor && !defined('PHPFOX_IS_GROUP_VIEW')}row_sponsored {elseif $aEvent.is_featured && $sView != 'featured'}row_featured {/if}{if is_int($phpfox.iteration.events)}row1{else}row2{/if}{if $phpfox.iteration.events == 1} row_first{/if}">
						
						{if true || !Phpfox::isMobile()}
						<div class="pull-left">
							
							{if isset($sView) && $sView == 'featured'}
							{else}
							<div class="js_featured_event row_featured_link"{if !$aEvent.is_featured} style="display:none;"{/if}>
								{phrase var='event.featured'}
							</div>					
							{/if}	
							<div id="js_sponsor_phrase_{$aEvent.event_id}" class="js_sponsor_event row_sponsored_link"{if !$aEvent.is_sponsor} style="display:none;"{/if}>
								{phrase var='event.sponsored'}
							</div>					
							
							<a href="{$aEvent.url}">{img server_id=$aEvent.server_id title=$aEvent.title path='event.url_image' file=$aEvent.image_path suffix='_120' max_width='120' max_height='120' itemprop='image'}</a>
						</div>				
						<div class="media-body">	
						{/if}

							<div class="media">	
		
								<span class="pull-left">		
									<a href="{$aEvent.url}">{img user=$aEvent suffix='_50_square' max_width='50' max_height='50'}</a>
									
									{if Phpfox::getUserParam('event.can_approve_events') || Phpfox::getUserParam('event.can_delete_other_event')}
									<a href="#{$aEvent.event_id}" class="moderate_link" rel="event">
										{phrase var='event.moderate'}
									</a>
									{/if}
								</span>
								<div class="media-body">
									
									<p itemprop="name">
										<a href="{$aEvent.url}" class="link" itemprop="url">
											{$aEvent.title|clean|split:25}
										</a>
									</p>

									<div class="extra_info">
										<ul class="extra_info_middot">
											{if isset($aEvent.start_time_micro)}
											<li itemprop="startDate" style="display:none;">{$aEvent.start_time_micro}</li>
											{/if}
											<li>&nbsp;</li>
											<li class="badge">
											{$aEvent.start_time_phrase} 
											{phrase var='event.at'} 
											{$aEvent.start_time_phrase_stamp}
											</li>
											<li>&nbsp;</li>
											<li class="badge">{$aEvent|user}</li>
										</ul>
									</div>
									
									{if Phpfox::isMobile()}
									<a href="{$aEvent.url}">{img server_id=$aEvent.server_id title=$aEvent.title path='event.url_image' file=$aEvent.image_path suffix='_120' max_width='120' max_height='120'}</a>
									{/if}
			
									{module name='feed.comment' aFeed=$aEvent.aFeed}				
									
								</div>			
								
							</div>	
						{if true || !Phpfox::isMobile()}
						</div>
						{/if}
					</div>
				{/item}
				{/foreach}
			</div>
		</div>
	</div>
	{/foreach}

	{if Phpfox::getUserParam('event.can_approve_events') || Phpfox::getUserParam('event.can_delete_other_event')}
	{moderation}
	{/if}

	{pager}
	{/if}
  
{/if}
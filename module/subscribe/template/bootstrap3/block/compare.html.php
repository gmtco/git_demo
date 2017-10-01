{if $bIsDisplay}

	{if !count($aPackages.features)}
	<div class="alert alert-info">{phrase var='subscribe.there_is_nothing_to_compare_at_this_time'}</div>
	{/if}

	<div class="mac-price-table-chart mac-price-table-professional">
		<section class="mac-price-table-chart-three col-xs-12">
			<ul class="mac-price-table-pro">

				<li class="mac-price-table-first-heading panel-default col-md-4">
					<h3 class="panel-heading">
						<span class="mac-price-table-label">{phrase var='macore.features'}</span>
						<p class="mac-price-table-foreword">{phrase var='macore.select_your_plan'}</p>
						<p class="mac-price-table-paragraph text-center">{phrase var='macore.icon_table_comparison'}<p>
						<p class="mac-price-table-paragraph">
							{phrase var='macore.put_here_your_description_for_comparison_of_package_you_can_edit_this_phrase_on_admincp_cms_manage'}
						</p>
					</h3>
					<ul class="list-group">
						{if count($aPackages.features)}
							{foreach name=iteTrFeatureHeader from=$aPackages.features key=sFeatureTitle item=aFeature}
								<li class="list-group-item">
									{if strpos($sFeatureTitle, 'no-feature-title') === false} {$sFeatureTitle|convert} {/if}
								</li>
							{/foreach}		
						{/if}
					</ul>
				</li>

				{if count($aPackages.packages)}
				{foreach name=iteTitle from=$aPackages.packages key=iPackageId item=aPackage}
					<li class="mac-price-table-inner panel-info col-xs-6 col-md-2">

						<h3 class="panel-heading">
							<span class="mac-price-table-label">{$aPackage.title|convert|shorten:20:'...'}</span>
							<span class="mac-price-table-foreword">{$aPackage.description|convert|shorten:20:'...'}</span>
							<div class="mac-price-table-figure">
								<span class="mac-price-table-currency">$</span>
								<span class="mac-price-table-amount">{$aPackage.price_phrase}</span>
							</div>
							<span class="mac-price-table-button"><a href="#" class="btn btn-primary btn-block">Purchase</a></span>
						</h3>
						{if count($aPackages.features)}


							<ul class="list-group">
								{foreach name=iteTrFeature from=$aPackages.features key=sFeatureTitle item=aFeature}

									{foreach from=$aFeature item=aFeatureValue key=sFeatureTitle2  name=iteTdFeature}
										{if $iPackageId == $sFeatureTitle2} 
										<li class="list-group-item">
										{if $aFeatureValue.feature_value == 'img_accept.png'} 
										{img theme='misc/accept.png'}
										{elseif $aFeatureValue.feature_value == 'img_cross.png'} 
										{img theme='misc/cross.png'}
										{elseif $aFeatureValue.feature_value != 'img_cross.png' && $aFeatureValue.feature_value != 'img_accept.png'}
										{$aFeatureValue.feature_value|convert}
										{/if}	
										<span class="feature-hide">{if strpos($sFeatureTitle, 'no-feature-title') === false} {$sFeatureTitle|convert} {/if}</span>						
										</li>
										{/if}
									{/foreach}
										
								{/foreach}	
							</ul>
						{/if}
					</li>
				{/foreach}
				{/if}


			</ul>
				
		</section>
	</div>

{else}

{/if}
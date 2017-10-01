<div class="mac-element mac-box {if true} col-xs-12 col-sm-6 col-md-4 col-lg-3{/if}">
	<div class="box box-type-ad">
	
		{if $aPinAd.type_id == 1}
		<div class="box-image">	
			<a href="{url link='ad' id=$aPinAd.ad_id}" target="_blank" class="no_ajax_link">
			{img file=$aPinAd.image_path path='ad.url_image' server_id=$aPinAd.server_id}
			</a>	
		{else}
		<div class="box-caption">
			{$aPinAd.html_code}		
		{/if}
		
		</div>
		
	</div>
</div>
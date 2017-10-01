<?php

/**
 * Pin by Macagoraga
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div class="mac-mobile-ad-wrap">
	<div class="mac-mobile-ad-inner">
		{if $aMacMobileAd.type_id == 1}	
		<a id="mac-the-ad-link" href="{url link='ad' id=$aMacMobileAd.ad_id}" target="_blank" class="no_ajax_link">
		{img file=$aMacMobileAd.image_path path='ad.url_image' server_id=$aMacMobileAd.server_id}
		</a>	
		{else}
		{img class='pull-left' file=$aMacMobileAd.image_path path='ad.url_image' server_id=$aMacMobileAd.server_id}
		{$aMacMobileAd.html_code.title}	
		{$aMacMobileAd.html_code.body}		
		{/if}
	</div>
	<a href="{url link='ad'}" class="mac-mrg-rt pull-right">Create an ad</a>
	<div class="clear"></div>
</div>

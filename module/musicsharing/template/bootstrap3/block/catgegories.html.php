<ul class="list-group mac-ajaxify-links">
{foreach from=$aCats key = key item=aCat}
	<li class="list-group-item{if $scat eq $aCat.cat_id} active{/if}">
		<a href="{url link = 'musicsharing.song.cat_'.$aCat.cat_id.'.catitle_'.$aCat.title}">{$aCat.title} </a> 
	</li>
{/foreach}
	<li class="list-group-item{if $scat eq "others"} active{/if}"><a href="{url link = 'musicsharing.song.cat_others'}">{phrase var='musicsharing.others'} </a></li>
</ul>
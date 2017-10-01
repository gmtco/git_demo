<ul class="list-group mac-ajaxify-links">
	{foreach from=$aSingers item=iType}
		{if isset($iType.singer)}
				{foreach from=$iType.singer item = iSinger}
					<li class="list-group-item{if $sfsid eq $iSinger.singer_id} active{/if}">
						<a style="padding: 0px;padding-top: 5px; padding-bottom: 5px;padding-left: 5px;" href="{url link ='musicsharing.song.singer_'.$iSinger.singer_id.'.sititle_'.$iSinger.title}">{$iSinger.title}</a>
					</li>
				{/foreach} 
		{/if} 
	{/foreach}
  <li class="list-group-item{if $sfsid eq "others"} active{/if}">
    <a href="{url link ='musicsharing.song.singer_others'}">
    {phrase var='musicsharing.others'}
    </a>
  </li>
</ul>
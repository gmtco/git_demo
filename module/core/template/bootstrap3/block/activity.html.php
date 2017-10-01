<div style="position:relative;">
	{foreach from=$aActivites key=sPhrase item=sValue}
	<div class="info">
		<div class="info_left">
		{$sPhrase}
		<span class="badge pull-right">
			{$sValue}
		</span>	
		</div>	
	</div>
	{/foreach}
</div>
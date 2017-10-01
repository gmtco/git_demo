<ul class="list-group">
{foreach from=$aPhotoDetails name=photodetails key=sKey item=sValue}
<li class="list-group-item row">
	<div class="col-lg-6 col-md-6 col-xs-6">
		{$sKey}:
	</div>	
	<div class="col-lg-6 col-md-6 col-xs-6">
		{$sValue}
	</div>	
</li>
{/foreach}
</ul>
<li class="dropdown">
	<a href="#" class="dropdown-toggle no_ajax_link" data-toggle="dropdown">
		<i class="icon-tags"></i> Categories 
	</a>
	<ul class="dropdown-menu">
		{foreach from=$aCategories item=aCategory}
		<li><a href="{$aCategory.link}">{$aCategory.name|convert}</a></li>
		{/foreach}
	</ul>
</li>
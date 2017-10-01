<ul class="list-group">
	{foreach from=$aCategories item=aCategory}
	<li class="category list-group-item"><a href="{$aCategory.link}">{$aCategory.name|convert}</a></li>
	{/foreach}
</ul>
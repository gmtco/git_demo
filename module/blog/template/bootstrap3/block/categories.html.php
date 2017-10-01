<ul class="list-group">
{foreach from=$aCategories item=aCategory}
	<li class="{if $iCategoryBlogView == $aCategory.category_id} active{/if} list-group-item">
		<a href="{$aCategory.url}" class="ajax_link">{$aCategory.name|convert|clean}</a>
	</li>
{/foreach}
</ul>
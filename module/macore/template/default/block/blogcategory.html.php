{if isset($aCategories) && count($aCategories)}
<li class="dropdown">
	<a href="#" class="dropdown-toggle no_ajax_link" data-toggle="dropdown">
		<i class="icon-tags"></i> Categories 
	</a>
	<ul class="dropdown-menu">
	{foreach from=$aCategories item=aCategory}
		<li class="{if $iCategoryBlogView == $aCategory.category_id} active{/if}">
			<a href="{$aCategory.url}" class="ajax_link">{$aCategory.name|convert|clean}</a>
		</li>
	{/foreach}
    </ul> 
</li>
{/if}
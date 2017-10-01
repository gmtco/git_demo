<?php
/*

bootstrapped by

 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');

?>
{if isset($aMacCategories) && count($aMacCategories)}
<li class="dropdown">
	<a href="#" class="dropdown-toggle no_ajax_link" data-toggle="dropdown">
		<i class="icon-tags"></i> Categories 
	</a>
	<ul class="dropdown-menu">
    {foreach from=$aMacCategories item=aCategory key=iCategoryCount}

	    {if isset($aCategory.sub) && count($aCategory.sub)}

			{foreach from=$aCategory.sub item=aSubCategory key=iKey}
			<li>
				<a class="mac-ajaxify" href="{if isset($aSubCategory.url)}{$aSubCategory.url}{else}{$aSubCategory.link}{/if}" id="{if isset($sModule)}{$sModule}_{/if}{if isset($aSubCategory.category_id)}subcategory_{$aSubCategory.category_id}{/if}">
					{$aSubCategory.name|convert|clean}
				</a>
			</li>
			{/foreach}

	    {else}

		    <li>
				<a class="mac-ajaxify" href="{if isset($aCategory.url)}{$aCategory.url}{if Phpfox::getLib('request')->get('view') != ''}view_{request var='view'}/{/if}{else}{$aCategory.link}{/if}" id="{if isset($sModule)}{$sModule}_{/if}{if isset($aCategory.category_id)}category_{$aCategory.category_id}{/if}">
					{$aCategory.name|convert|clean}
				</a>
		    </li>

		{/if}

    {/foreach}	
	</ul>
</li>
{/if}
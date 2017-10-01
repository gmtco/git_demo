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
{if isset($aCategories) && count($aCategories)}

<li class="dropdown">

	<a href="#" class="dropdown-toggle no_ajax_link" data-toggle="dropdown">
		<i class="icon-tags"></i> Categories 
	</a>
	<ul class="dropdown-menu">
    {foreach from=$aCategories item=aCategory key=iCategoryCount}
    <li class="{if isset($sModule)}{$sModule}_{/if}category">	   		
		<a {if Phpfox::getParam('core.categories_to_show_at_first') < 1 && count($aCategory.sub) > 0}class="no_ajax_link category_show_more_less_link"{/if} href="{$aCategory.url}{if Phpfox::getLib('request')->get('view') != ''}view_{request var='view'}/{/if}" id="{if isset($sModule)}{$sModule}_{/if}category_{$aCategory.category_id}">
		    {$aCategory.name|convert|clean}
		</a>
		{if isset($aCategory.sub) && count($aCategory.sub)}
			<ul>
				{foreach from=$aCategory.sub item=aSubCategory key=iKey}
			    <li {if $iKey >= Phpfox::getParam('core.categories_to_show_at_first')}style="display:none;" class="{if isset($sModule)}{$sModule}_{/if}subcategory_{$aCategory.category_id} special_subcategory"{/if}>
				<a href="{$aSubCategory.url}" id="{if isset($sModule)}{$sModule}_{/if}subcategory_{$aSubCategory.category_id}">
					    {$aSubCategory.name|convert|clean}
				</a>
			    </li>
				{/foreach}

				{if $iKey >= Phpfox::getParam('core.categories_to_show_at_first') && Phpfox::getParam('core.categories_to_show_at_first') > 0}
			    <li onclick="$Core.toggleCategory('{if isset($sModule)}{$sModule}_{/if}subcategory_{$aCategory.category_id}',{$aCategory.category_id})">
				<div id="show_more_{$aCategory.category_id}" style="text-align:right;vertical-align:middle;"><a href="#" onclick="return false;">{img theme='misc/plus.gif' class='v_middle'}{phrase var='user.view_more'}</a></div>
				<div id="show_less_{$aCategory.category_id}" style="display:none;text-align:right;vertical-align:middle;"><a href="#" onclick="return false;">{img theme='misc/minus.gif' class='v_middle'}{phrase var='core.view_less'}</a></div>
			    </li>
				{/if}
			</ul>
		{/if}
    </li>
    {/foreach}  
    </ul> 

</li>

{/if}
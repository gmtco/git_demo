<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: categories.html.php 62007 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div>
    <ul class="list-group">
        {foreach from=$aCategories item=aCategory}
        <li class="list-group-item">
            <a href="{$aCategory.url}">{phrase var=$aCategory.phrase}</a>
        </li>
        {if isset($aCategory.sub) && count($aCategory.sub)}
      
            {foreach from=$aCategory.sub item=aSubCategory}
            <li class="list-group-item mac-text-indent">
                <a href="{$aSubCategory.url}">{phrase var=$aSubCategory.phrase}</a>
            </li>
            {/foreach}
    
        {/if}
        {/foreach}
    </ul>
</div>
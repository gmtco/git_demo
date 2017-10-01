<?php
/**
 * CEOfox
 *
 * @copyright  Copyright 2011-2012 CEOfox, Inc.
 * @license    http://ceofox.com/pages/license
 * @version    $Id: browse-categories.html.php 42007 2013-08-17 14:44:49 $
 * @author     CEOfox, Inc.
 */
?>
<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if (count($aTopCategories))}
<ul class="browse_categories">
    {foreach from=$aTopCategories item=aCategory}
    <li>
    	<a href="{$aCategory.url}">
	    	{phrase var=$aCategory.phrase}
	    	<span class="badge">{$aCategory.total_job}</span>
	    </a>
	</li>
    {/foreach}
</ul>
{/if}
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: pager.html.php 1195 2009-10-19 10:35:24Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if isset($aPager) && $aPager.totalPages > 1}
{if isset($aPager.nextUrl)}
<a href="{$aPager.nextUrl}" class="mac-btn-next btn btn-block btn-primary mac-mrg-tp mac-mrg-btm">
	{phrase var='core.view_more'} ({phrase var='core.page_x_of_x' current=$aPager.current total=$aPager.totalPages})
</a>
{/if}
{/if}
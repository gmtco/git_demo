{$aAlbums|print_r}

{if $bSpecialMenu}
    {template file='photo.block.specialmenu'}
{/if}

{if count($aAlbums)}

    <div class="albums_container">

		<div class="albums_container_row mac-isotope2-wrapper">

			{if !defined('PHPFOX_IS_AJAX_CONTROLLER')}
			<div class="row" id="mac-isotope2">
			{/if}
		
			{foreach from=$aAlbums item=aAlbum name=albums}	

				{template file='photo.block.album-entry'}

			{/foreach}


			{if !defined('PHPFOX_IS_AJAX_CONTROLLER')}
			</div>
			{/if}


		</div>   

    </div>

    <div class="clear"></div>

	<div class="t_right pager_container">
		{pager}
	</div>

{else}

    <div class="alert alert-info">
	    {phrase var='photo.no_albums_found_here'}
    </div>

{/if}
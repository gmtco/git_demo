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
?>
<div class="photo_row {if !Phpfox::getParam('photo.show_info_on_mouseover')}album_entry{/if} mac-element col-xs-12 col-md-3" id="js_photo_album_id_{$aAlbum.album_id}">
	
	<div class="mac-photo-browse js_outer_photo_div js_mp_fix_holder photo_row_holder">	

		<div class="thumbnail">

			<a href="{$aAlbum.link}albumid_{$aAlbum.album_id}/"
			   title="{phrase var='photo.title_by_full_name' title=$aAlbum.name|clean full_name=$aAlbum.full_name|clean}">
				{img 
					server_id=$aAlbum.server_id 
					path='photo.url_photo' 
					file=$aAlbum.destination 
					suffix='_500' 
					max_width=500 
					max_height=1000
				}
			</a>

			<div class="caption">

				<h4>
					<a href="{permalink module='photo.album' id=$aAlbum.album_id title=$aAlbum.name}" id="js_album_inner_title_{$aAlbum.album_id}">
						{$aAlbum.name|clean|shorten:100:'...'|split:40}
					</a>	
				</h4>

				{if $aAlbum.total_photo == '1'}
				1 photo
				{else}
				{$aAlbum.total_photo|number_format} photos
				{/if}

				{if !defined('PHPFOX_IS_USER_PROFILE')}	
					{$aAlbum|user:'':'':50|split:10}
				{/if}

				{if ($aAlbum.profile_id == '0' && ((Phpfox::getUserId() == $aAlbum.user_id && Phpfox::getUserParam('photo.can_delete_own_photo_album')) || Phpfox::getUserParam('photo.can_delete_other_photo_albums')))
					|| ($aAlbum.profile_id == '0' && Phpfox::getUserId() == $aAlbum.user_id)
					|| ((Phpfox::getUserId() == $aAlbum.user_id && Phpfox::getUserParam('photo.can_edit_own_photo_album')) || Phpfox::getUserParam('photo.can_edit_other_photo_albums'))
				}

				<div class="dropdown">

					<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cogs"></i> {phrase var='macore.mac_actions_link'}
					</a>

					<ul class="dropdown-menu">
						{if $aAlbum.profile_id == '0' && ((Phpfox::getUserId() == $aAlbum.user_id && Phpfox::getUserParam('photo.can_delete_own_photo_album')) || Phpfox::getUserParam('photo.can_delete_other_photo_albums'))}
						<li class="item_delete"><a href="{url link='photo.albums' delete=$aAlbum.album_id}" id="js_delete_this_album" class="sJsConfirm">{phrase var='photo.delete'}</a></li>
						{/if}					
						{if $aAlbum.profile_id == '0' && Phpfox::getUserId() == $aAlbum.user_id}
						<li><a href="{url link='photo.add' album=$aAlbum.album_id}">{phrase var='photo.upload_photo_s'}</a></li>
						{/if}					
						{if (Phpfox::getUserId() == $aAlbum.user_id && Phpfox::getUserParam('photo.can_edit_own_photo_album')) || Phpfox::getUserParam('photo.can_edit_other_photo_albums')}
						<li><a href="{url link='photo.edit-album' id=$aAlbum.album_id}" id="js_edit_this_album">{phrase var='photo.edit'}</a></li>
						{/if}
					</ul>
				</div>

				{/if}
	
			</div>

		</div>

	</div>

</div>
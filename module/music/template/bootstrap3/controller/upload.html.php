{if $bIsEdit}
<div class="view_item_link">
	<a href="{permalink module='music' id=$aForms.song_id title=$aForms.title}">
		{phrase var='music.view_song'}
	</a>
</div>
{/if}

{$sCreateJs}
<div id="js_actual_upload_form" class="col-lg-6 col-12 col-lg-push-3">
	{if $bIsEdit}
	<form method="post" action="{url link='music.upload'}">
	<div><input type="hidden" name="id" value="{$aForms.song_id}" /></div>
	<div><input type="hidden" name="upload_via_song" value="1" /></div>
	{else}
	<form class="form-horizontal mac-form-music-upl" method="post" action="{url link='music.upload'}" id="js_music_form" enctype="multipart/form-data" onsubmit="return $Core.music.upload({$sGetJsForm});" target="js_upload_frame">
	{/if}
	{if isset($sModule) && $sModule}
		<div><input type="hidden" name="val[callback_module]" value="{$sModule}" /></div>
	{/if}
	{if isset($iItem) && $iItem}
		<div><input type="hidden" name="val[callback_item_id]" value="{$iItem}" /></div>
	{/if}		
		<div id="js_music_upload_song">
			<div><input type="hidden" name="val[method]" value="{$sMethod}"></div>
			{template file='music.block.upload'}
			{if $bIsEdit}
			<div class="table_clear">
				<input type="submit" value="{phrase var='music.update'}" class="btn btn-primary btn-block" />
			</div>			
			{/if}
		</div>
	</form>
</div>
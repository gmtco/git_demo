{if $bAllowedAlbums}
<script type="text/javascript">
{literal}
	function addNewAlbum()
	{
	{/literal}
		if ({$sGetJsForm})
	{literal}
		{
			$('#js_create_new_album').ajaxCall('photo.addAlbum');	
		}
		
		return false;
	}
{/literal}
</script>
{$sCreateJs}
<div class="main_break"></div>
<form class="mac-form-create-photo-album form-horizontal" method="post" action="{url link='current'}" id="js_create_new_album" onsubmit="return addNewAlbum();">
	{if $sModule}
		<div><input type="hidden" name="val[module_id]" value="{$sModule}" /></div>
	{/if}
	{if $iItem}
		<div><input type="hidden" name="val[group_id]" value="{$iItem}" /></div>		
	{/if}	
	<div id="js_custom_privacy_input_holder_album"></div>
	{template file='photo.block.form-album'}
	<div class="form-group">
		<div class="col-lg-12">
			<input type="submit" value="{phrase var='photo.submit'}" class="btn btn-primary btn-block" />
		</div>
	</div>
	{if Phpfox::getParam('core.display_required')}
	<div class="alert alert-info">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		{phrase var='core.required_fields'}
	</div>
	{/if}	
</form>
{else}
{phrase var='photo.you_have_reached_your_limit_you_are_currently_unable_to_create_new_photo_albums'}
{/if}
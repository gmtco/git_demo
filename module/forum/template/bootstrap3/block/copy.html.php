<span id="js_copying_forum"></span>
<form method="post" action="#" onsubmit="$('#js_copying_forum').html($.ajaxProcess('{phrase var='forum.copying' phpfox_squote=true}')); $(this).ajaxCall('forum.processCopy'); return false;">
	<div><input type="hidden" name="thread_id" value="{$aThread.thread_id}" /></div>

	<div class="form-group input-group">
		<span class="input-group-addon">{phrase var='forum.new_title'}</span>
		<input class="form-control" placeholder="{phrase var='forum.new_title'}" type="text" name="title" value="{$aThread.title|clean}" size="30" />
	</div>	

	<div class="clear"></div>

	<div class="form-group input-group">
		<span class="input-group-addon">{phrase var='forum.destination_forum'}</span>
		<select name="forum_id" class="form-control">
			{$sForums}
		</select>
	</div>

	<div class="clear"></div>

	<div class="form-group">
		<div class="col-lg-12">
			<input type="submit" value="{phrase var='forum.copy_thread'}" class="btn btn-primary btn-block" /> 
			
		</div>
	</div>
	<hr class="invisible">
</form>
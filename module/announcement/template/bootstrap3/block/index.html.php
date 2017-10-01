<div id="mac-announcement" class="alert alert-info">
	{if $aAnnouncement.can_be_closed == 1 && Phpfox::getUserParam('announcement.can_close_announcement')}
		<div class="pull-right">
			<a href="#" onclick="$.ajaxCall('announcement.hide', 'id={$aAnnouncement.announcement_id}'); $('#mac-announcement').hide(); return false;">
			 <i class="icon-remove icon-2x"></i>
			</a>
		</div>
	{/if}	

		<div class="js_announcement_subject">	
			<div class="announcement_date">
				{$aAnnouncement.time_stamp|date}
			</div>
			{phrase var=$aAnnouncement.subject_var}
		</div>
		
	<div class="js_announcement_content">
		{if isset($aAnnouncement.intro_var) && !empty($aAnnouncement.intro_var)}
			{phrase var=$aAnnouncement.intro_var}
		{else}
			{phrase var=$aAnnouncement.content_var}
		{/if}
			
		{if !empty($aAnnouncement.content_var) && !isset($bHideViewMore)}
		<div class="js_announcement_more">
			( <a href="{url link='announcement.view' id=$aAnnouncement.announcement_id}">{phrase var='announcement.read_more'}</a> )
		</div>
		{/if}		
	</div>
</div>
<div class="global_attachment_holder_section" id="global_attachment_link">	
	<div class="js_preview_content_holder_action" id="global_attachment_link_holder">

		<div class="input-group">
			<input type="text" name="val[link][url]" placeholder="http://" value="http://" id="js_global_attach_value" class="form-control" />
			<span class="input-group-btn">
				<input type="button" class="btn btn-default" value="{phrase var='link.attach'}" id="js_global_attach_link" />	
			</span>						
		</div>			
		
	</div>
	<div class="js_preview_content_holder" id="js_preview_link_attachment"></div>
	<div id="js_global_attachment_link_cancel" class="p_4 t_right" style="display:none;">
		<a href="#" onclick="$('#js_preview_link_attachment').html(''); $('#global_attachment_link_holder').show(); $('#activity_feed_submit').attr('disabled','disabled').addClass('button_not_active');$('#js_global_attach_value').val('http://'); return false;">{phrase var='link.cancel'}</a>
	</div>
</div>
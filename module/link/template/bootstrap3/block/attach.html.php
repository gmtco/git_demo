<script type="text/javascript">$Core.loadStaticFile('{jscript file='attach.js' module='link'}');</script>
<div class="js_preview_link_attachment_custom_add_parent">
	<div class="js_preview_link_attachment_custom_add">
		<div class="js_preview_link_attachment_custom_error"></div>

		<div>
	 	<div class="input-group">
	      <input type="text" name="val[link][url]" value="" class="js_global_attach_value_custom form-control input-lg" placeholder="http://"  />
	      <span class="input-group-btn">
	        <input type="button" value="{phrase var='link.attach'}" onclick="$Core.attachmentLink(this);" class="btn-lg btn btn-default" />
	      </span>

	    </div><!-- /input-group -->
		<span class="js_global_attach_link_ajax" style="display:none;text-align:center;width:100%;">
			<i class="icon-spinner icon-spin icon-4x"></i>
		</span>
		</div>
	</div>
	<div class="js_preview_link_attachment_custom_holder" style="display:none;">
		<form method="post" action="#" onsubmit="return $Core.attachmentLinkAdd(this);">
			<div><input type="hidden" name="val[link][url]" value="" class="js_hidden_link_id" /></div>
			<div><input type="hidden" name="val[category_id]" value="{$sAttachCategory}" /></div>
			<div><input type="hidden" name="val[attachment_obj_id]" value="{$sAttachmentObjId}" /></div>
			{if $bIsAttachmentInline}
			<div><input type="hidden" name="val[attachment_inline]" value="true" /></div>
			{/if}
			<div class="js_preview_link_attachment_custom_form"></div>

			<span class="js_global_attach_link_ajax_add" style="display:none;text-align:center;width:100%;">
				<i class="icon-spinner icon-spin icon-4x"></i>
			</span>

			<div class="attachment_link_button">
				<input type="submit" onClick="$bIsAdded = false; $bIsPreview = false;" id="btn_submit_attach_link" value="{phrase var='link.attach_link'}" class="btn btn-block btn-danger" />
			</div>
		</form>
	</div>
</div>
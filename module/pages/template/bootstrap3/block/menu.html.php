<div class="">

{if $aPage.is_admin}
<a class="btn btn-sm btn-default btn-block" href="{url link='pages.add' id=$aPage.page_id}">
	{phrase var='pages.edit_page'}
</a>
{/if}

{if !Phpfox::getUserBy('profile_page_id')}
<span id="js_add_pages_unlike" {if !$aPage.is_liked} style="display:none;"{/if}>
<a class="btn btn-sm btn-default btn-block mac-mrg-tp" id="js_add_pages_unlike" href="#" onclick="$(this).hide(); $('#pages_like_join_position').show(); $.ajaxCall('like.delete', 'type_id=pages&amp;item_id={$aPage.page_id}'); return false;">
	{if $aPage.page_type == '1'}{phrase var='pages.remove_membership'}{else}{phrase var='pages.unlike'}{/if}
</a>
</span>
{/if}	

{if !$aPage.is_admin && Phpfox::getUserParam('pages.can_claim_page') && empty($aPage.claim_id)}
<a href="#?call=contact.showQuickContact&amp;height=600&amp;width=600&amp;page_id={$aPage.page_id}" class="btn btn-sm btn-default btn-block mac-mrg-btm inlinePopup js_claim_page" title="{phrase var='pages.claim_page'}">
	{phrase var='pages.claim_page'}
</a>
{/if}

</div>
<div class="t_center mac-mrg-tp">
{module name='share.link' type='pages' url=$aPage.link title=$aPage.title display='menu' sharefeedid=$aPage.page_id sharemodule='pages'}
</div>
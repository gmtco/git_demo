{if Phpfox::isModule('report')}
{if $aPin.user_id != Phpfox::getUserId()}
<li>
<a href="#?call=report.add&amp;height=100&amp;width=400&amp;type={$aPin.ITEMTYPENAME}&amp;id={$aPin.ITEMID}" class="inlinePopup" title="Report">
<i class="icon-flag"></i> Report
</a> 
</li> 
{/if}
{/if}
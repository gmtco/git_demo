<div class="mac_privacy_setting_div">
	
<div>
	<input type="hidden" id="{$sPrivacyFormName}" name="val{if !empty($sPrivacyArray)}[{$sPrivacyArray}]{/if}[{$sPrivacyFormName}]" value="{$aSelectedPrivacyControl.value}" />
</div>

<div class="btn-group">
  <a href="#" class="mac_change_privacy btn btn-default dropdown-toggle{if Phpfox::isMobile()} btn-sm{/if}" data-toggle="dropdown">
  	<i class="icon-globe"></i> {$aSelectedPrivacyControl.phrase} <i class="icon-chevron-down"></i>
  </a>

  <ul class="dropdown-menu">
	{foreach from=$aPrivacyControls name=privacycontrol item=aPrivacyControl}
	<li>
		<a href="#"{if isset($aPrivacyControl.onclick)} onclick="{$aPrivacyControl.onclick} return false;"{/if} rel="{$aPrivacyControl.value}" {if (isset($aPrivacyControl.is_active)) || (isset($bNoActive) && $bNoActive && $phpfox.iteration.privacycontrol == 1)}class="is_active_image"{/if}>
			{if $aPrivacyControl.value == 0}
			<i class="icon-globe"></i>
			{elseif $aPrivacyControl.value == 1}
			<i class="icon-group"></i>
			{elseif $aPrivacyControl.value == 2}
			<i class="icon-group"></i>
			{elseif $aPrivacyControl.value == 3}
			<i class="icon-user"></i>
			{elseif $aPrivacyControl.value == 4}
			<i class="icon-cog"></i>
			{/if}
			{$aPrivacyControl.phrase}
		</a>
	</li>
	{/foreach}
  </ul>
</div>

</div>
<br>
{if !empty($sPrivacyFormInfo)}
<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#">&times;</a>
	{$sPrivacyFormInfo}
</div>
{/if}
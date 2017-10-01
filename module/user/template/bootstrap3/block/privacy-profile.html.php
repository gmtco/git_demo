<li class="list-group-item">
			
		<div class="row">
				
			{if ($sPrivacy != 'rss.can_subscribe_profile') || !Phpfox::getParam('core.friends_only_community')}
				
				<div class="col-6 col-lg-6">
					<h4>{$aProfile.phrase}</h4>
				</div>
		
				<div class="col-6 col-lg-6">
					<select class="form-control" name="val[privacy][{$sPrivacy}]">
					{if !isset($aProfile.anyone) && !Phpfox::getParam('core.friends_only_community')}					
							<option value="0"{if $aProfile.default == '0'} selected="selected"{/if}>{phrase var='user.anyone'}</option>
					{/if}
					{if !isset($aProfile.no_user)}
						{if !Phpfox::getParam('core.friends_only_community')}
							<option value="1"{if $aProfile.default == '1'} selected="selected"{/if}>{phrase var='user.community'}</option>									
						{/if}
						{if Phpfox::isModule('friend')}
						<option value="2"{if $aProfile.default == '2'} selected="selected"{/if}>{phrase var='user.friends_only'}</option>
						{/if}
					{/if}
						<option value="4"{if $aProfile.default == '4'} selected="selected"{/if}>{phrase var='user.no_one'}</option>
					</select>				
				</div>	
			
			{else}			
			Empty
			{/if}
		
		</div>
		
	</li>
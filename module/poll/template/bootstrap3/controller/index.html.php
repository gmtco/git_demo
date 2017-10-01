{if !Phpfox::isModule('pinpoll')}

	{if !count($aPolls)}
		<div class="alert alert-info">
			{phrase var='poll.no_polls_found'}
		</div>
	{else}

		{if Phpfox::getUserParam('poll.poll_can_moderate_polls')}
		{moderation}
		<hr class="invisible clear">
		{/if}

		<div class="mac-isotope2-wrapper">
			<div id="mac-isotope2" class="row mac-poll-browse">
			{foreach from=$aPolls item=aPoll key=iKey name=polls}
				<div class="mac-element-poll">
					<div class="mac-element col-xs-12 col-sm-6 col-md-6 col-lg-6">
						{template file='macore.block.bootstrap3-poll-entry'}
					</div>
				</div>
			{/foreach}
			</div>
		</div>

	{pager}
	{/if}
	
{/if}
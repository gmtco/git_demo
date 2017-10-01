<?php
/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  
*/
defined('PHPFOX') or exit('NO DICE!');
?>
{if isset($aPoll)}
<div id="poll_holder_{$aPoll.poll_id}" class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title">
			<span id="poll_view_{$aPoll.poll_id}">
			<a href="{permalink module='poll' id=$aPoll.poll_id title=$aPoll.question}" id="poll_inner_title_{$aPoll.poll_id}">
				{$aPoll.question|clean|shorten:55:'...'|split:40}
			</a>
			</span>
			{phrase var='poll.by'} {$aPoll|user}
			<small class="mac-time-small">{$aPoll.time_stamp|convert_time}</small>
		</h3>
	</div>
	<div class="panel-body">
	
		<div class="vote_holder_{$aPoll.poll_id}">		

			<div class="media">	

				<a class="pull-left" href="{permalink module='poll' id=$aPoll.poll_id title=$aPoll.question}">
					<img src="{img user=$aPoll suffix='_50_square' max_width=50 max_height=50 return_url=true}" alt="">
				</a>
				<div class="media-body">

					<h4 class="media-heading">
					{$aPoll.question|clean|split:40}	
					</h4>
					
					<hr class="invisible clear">
					
					{if isset($aPoll.image_path) && $aPoll.image_path != ''}
					<div>
						{img thickbox=true server_id=$aPoll.server_id title=$aPoll.question path='poll.url_image' file=$aPoll.image_path suffix=$sSuffix max_width='poll.poll_max_image_pic_size' max_height='poll.poll_max_image_pic_size'}
					</div>					
					<hr class="invisible clear">
					{/if}	

					<div id="js_poll_results_{$aPoll.poll_id}">			
					{template file='poll.block.vote'}
					</div>	

					
					{if !isset($bIsViewingPoll) && isset($aPoll.aFeed)}				
					<hr class="invisible clear">
					{module name='feed.comment' aFeed=$aPoll.aFeed}
					{/if}	
					

				</div>

			</div>
		</div>

	</div>

	{if !isset($bDesign) && 
	(Phpfox::getUserParam('poll.poll_can_moderate_polls') || 
	$aPoll.bCanEdit || 
	(isset($aPoll.user_id) && 
	$aPoll.user_id == Phpfox::getUserId() && 
	Phpfox::getUserParam('poll.poll_can_delete_own_polls')))}    
	<div class="panel-footer">
	<div class="pull-left">
		{if isset($aPoll.view_id) && $aPoll.view_id == 1 && Phpfox::getUserParam('poll.poll_can_moderate_polls')}
			<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
			<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('poll.moderatePoll','iResult=0&amp;iPoll={$aPoll.poll_id}&amp;inline=true'); return false;">{phrase var='poll.approve'}</a>
		{/if}			

		<div class="dropdown">
			<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
				<i class="icon-cogs"></i> {phrase var='poll.actions'}
			</a>		
			<ul class="dropdown-menu">
				{template file='poll.block.link'}
			</ul>			
		</div>
	</div>
	<hr class="invisible clear">								
	{if !isset($bDesign) && Phpfox::getUserParam('poll.poll_can_moderate_polls')}				
	<a href="#{$aPoll.poll_id}" class="moderate_link" rel="poll">
		{phrase var='poll.moderate'}
	</a>							
	{/if}
	</div>
	{/if}

</div>
{/if}
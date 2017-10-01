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

<div id="js_quiz_{$aQuiz.quiz_id}" class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title">
			<a href="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}" id="quiz_inner_title_{$aQuiz.quiz_id}" class="link" title="{$aQuiz.title|clean}">
				{$aQuiz.title|clean|shorten:75:'...'}
			</a>
			{phrase var='quiz.by'} {$aQuiz|user}
			<small class="mac-time-small">{$aQuiz.time_stamp|convert_time}</small>
		</h3>
	</div>

	<div class="panel-body">
		
		<div id="js_message_{$aQuiz.quiz_id}" style="display: none;"></div>

		{if !isset($bIsViewingQuiz)}
		<div class="media">
			<a class="pull-left" href="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}">
				<img src="{img user=$aQuiz suffix='_50_square' max_width=50 max_height=50 return_url=true}" alt="">
			</a>

			<div class="media-body mac-el-visible">
				{if isset($aQuiz.image_path) && $aQuiz.image_path != ''}
				<div class="col-lg-12">
					{img thickbox=true server_id=$aQuiz.server_id title=$aQuiz.title path='quiz.url_image' file=$aQuiz.image_path suffix=$sSuffix max_width='quiz.quiz_max_image_pic_size' max_height='quiz.quiz_max_image_pic_size'}
				</div>
				{/if}	

				<div class="col-lg-12">
					{$aQuiz.description|parse|split:55}				
					{if !isset($bIsViewingQuiz) && isset($aQuiz.aFeed)}
					<hr class="invisible clear">
					{module name='feed.comment' aFeed=$aQuiz.aFeed}
					{/if}			
				</div>
			</div>
		</div>
	</div>	
	{if Phpfox::getUserParam('quiz.can_approve_quizzes') 
		|| Phpfox::getUserParam('quiz.can_delete_others_quizzes')
		|| ( ($aQuiz.user_id == Phpfox::getUserId()) && Phpfox::getUserParam('quiz.can_delete_own_quiz') )
		|| ($aQuiz.user_id == Phpfox::getUserId())
		|| ( (Phpfox::getUserId() == $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_own_questions') || Phpfox::getUserParam('quiz.can_edit_own_title'))) || (Phpfox::getUserId() != $aQuiz.user_id && (Phpfox::getUserParam('quiz.can_edit_others_questions') || Phpfox::getUserParam('quiz.can_edit_others_title'))))
	}   
	<div class="panel-footer">	
		<div>
			{if isset($aPoll.view_id) && $aPoll.view_id == 1 && Phpfox::getUserParam('poll.poll_can_moderate_polls')}
				<a href="#" class="item_bar_approve item_bar_approve_image" onclick="return false;" style="display:none;" id="js_item_bar_approve_image">{img theme='ajax/add.gif'}</a>			
				<a href="#" class="item_bar_approve" onclick="$(this).hide(); $('#js_item_bar_approve_image').show(); $.ajaxCall('poll.moderatePoll','iResult=0&amp;iPoll={$aPoll.poll_id}&amp;inline=true'); return false;">{phrase var='poll.approve'}</a>
			{/if}			

			<div class="dropdown">
				<a href="#" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown">
					<i class="icon-cogs"></i> {phrase var='poll.actions'}
				</a>		
				<ul class="dropdown-menu">
					{template file='quiz.block.link'}
				</ul>			
			</div>
		</div>					
		{if Phpfox::getUserParam('quiz.can_approve_quizzes')}
		<a href="#{$aQuiz.quiz_id}" class="moderate_link" rel="quiz">
			{phrase var='quiz.moderate'}
		</a>
		{/if}
	</div>
	{/if}

</div>
{/if}
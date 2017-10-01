{if !Phpfox::isModule('pinquiz')}

	{if !count($aQuizzes)}
		<div class="alert alert-info">
			{phrase var='quiz.no_quizzes_found'}
		</div>
	{else}

		{if Phpfox::getUserParam('quiz.can_approve_quizzes')}
		{moderation}
		<hr class="invisible">
		{/if}

		<div class="mac-isotope2-wrapper">
			<div id="mac-isotope2" class="row mac-quiz-browse">
			{foreach from=$aQuizzes name=quizzes item=aQuiz}
				<div class="mac-element-quiz">
					<div class="mac-element col-xs-12 col-sm-6">
						{template file='macore.block.bootstrap3-quiz-entry'}
					</div>
				</div>
			{/foreach}
			</div>
		</div>

	{pager}
	{/if}

{/if}
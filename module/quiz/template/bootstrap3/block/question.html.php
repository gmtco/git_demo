<div class="table full_question_holder row1">

	<div class="col-lg-push-2 col-lg-8 col-12">

		<label>
			{if isset($phpfox.iteration.question) && $phpfox.iteration.question <= Phpfox::getUserParam('quiz.min_questions')}
				{required}
			{/if}
			{phrase var='quiz.question'} {if isset($phpfox.iteration.question)}{$phpfox.iteration.question}{/if}
		</label>

		{if (isset($phpfox.iteration.question) && $phpfox.iteration.question <= Phpfox::getUserParam('quiz.min_questions')) ||
		    (isset($Question.iQuestionIndex) && $Question.iQuestionIndex <= Phpfox::getUserParam('quiz.min_questions')) ||
			(!isset($phpfox.iteration.question) && !isset($Question.iQuestionIndex))}
		
		<div id="removeQuestion" style="display:none;float:right;">

		{else}

		<div id="removeQuestion" style="float:right;">
        {/if}

		<a href="#" onclick="return $Core.quiz.removeQuestion(this);">
			<i class="icon-remove"></i>
		</a>			
			
		</div>
		
		<div class="input-group">
			<span class="input-group-addon"><i class="icon-question"></i></span>
			
			<input placeholder="{phrase var='quiz.question'} {if isset($phpfox.iteration.question)}{$phpfox.iteration.question}{/if}" 
			class="form-control question_title" type="text" 
			name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][question]" 
			value="{if isset($Question.question)}{$Question.question}{/if}" maxlength="200" size="30" />
		
		</div>

		<div class="p_4">		
			<label>{phrase var='quiz.answers'}:</label>
			<div class="p_4 answer_holder answers_holder">
				{if isset($Question.answers)}
					{foreach from=$Question.answers item=aAnswer name=iAnswer}					
						<div class="input-group p_2 answer_parent {if isset($aAnswer.is_correct) && $aAnswer.is_correct == 1}correctAnswer{/if}">
						
							<input type="hidden" class="hdnCorrectAnswer" name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][answers][{if isset($aAnswer.answer_id) && $aAnswer.answer_id != ''}{$aAnswer.answer_id}{else}{$phpfox.iteration.iAnswer}{/if}][is_correct]" value="{if isset($aAnswer.is_correct)}{$aAnswer.is_correct}{else}found none{/if}">
							{if isset($aAnswer.answer_id)}
								{* On error when adding this should not be set but when editing yes *}
								<input type="hidden" name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][answers][{if isset($aAnswer.answer_id) && $aAnswer.answer_id != ''}{$aAnswer.answer_id}{else}{$phpfox.iteration.iAnswer}{/if}][answer_id]" class="hdnAnswerId"  value="{if !isset($bErrors) || $bErrors == false}{$aAnswer.answer_id}{/if}">
								<input type="hidden" name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][answers][{if isset($aAnswer.answer_id) && $aAnswer.answer_id != ''}{$aAnswer.answer_id}{else}{$phpfox.iteration.iAnswer}{/if}][question_id]" class="hdnQuestionId"  value="{if isset($aAnswer.question_id)}{$aAnswer.question_id}{/if}">
							{else}
								{* This happens when there is an error submitting (forgot to add a question title maybe) *}
							{/if}
							<input placeholder="{phrase var='quiz.answer'} 1" class="form-control answer" type="text" 

							name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][answers][{if isset($aAnswer.answer_id) && $aAnswer.answer_id != ''}{$aAnswer.answer_id}{elseif isset($phpfox.iteration.iAnswer)}{$phpfox.iteration.iAnswer}{else}{$phpfox.iteration.iAnswer}{/if}][answer]" 

							tabindex="" value="{$aAnswer.answer}" maxlength="100" 

							onblur="{literal}if(this.value == ''){ this.value = '{/literal}{$aAnswer.answer}{literal}';}{/literal}" 
							onfocus="{literal}if ( (this.value.length == 'Answer X...'.length || this.value.length == 'Answer XY...'.length) && (this.value.substr(0,'Answer '.length) == 'Answer ') && (this.value.substr('Answer X'.length, 3) == '...')){this.value = '';}{/literal}" />
							
							<span class="input-group-addon" onclick="return $Core.quiz.appendAnswer(this);">
								<a title="Add new answer" href="#" class="a_addAnswer">
									<i class="icon-plus"></i>
								</a>
							</span>

							<span class="input-group-addon" onclick="return $Core.quiz.deleteAnswer(this);">
								<a title="Remove this answer" href="#" class="a_removeAnswer_{$i}" id="a_removeAnswer">
									<i class="icon-remove"></i>
								</a>
							</span>

							<span class="input-group-addon" onclick="return $Core.quiz.setCorrect(this);">
								<a title="Set as correct answer" href="#" class="a_setCorrect_{$i}" id="a_setCorrect">
									<i class="icon-ok"></i>
								</a>
							</span>
						</div>
					{/foreach}
				{else}
					{for $i=1; $i <= 6; $i++}
						<div id="answer_[iQuestionId]_{$i}" class="p_2 input-group answer_parent">
							<input name="val[q][{if isset($Question.question_id)}{$Question.question_id}{elseif isset($phpfox.iteration.question)}{$phpfox.iteration.question}{else}0{/if}][answers][{$i}][is_correct]" type="hidden" class="hdnCorrectAnswer" value="0">
							<input type="hidden" class="hdnAnswerId"  value="">
							<input type="hidden" class="hdnQuestionId"  value="">
							
							

								<input placeholder="{phrase var='quiz.answer'} {$i}" class="form-control col-lg-6 col-8 answer answer_{$i}" type="text" name="" tabindex="{$i}" value="" maxlength="100" />
								
								<span class="input-group-addon" onclick="return $Core.quiz.appendAnswer(this);">
									<a title="Add new answer" href="#" class="a_addAnswer">
										<i class="icon-plus"></i>
									</a>
								</span>

								<span class="input-group-addon" onclick="return $Core.quiz.deleteAnswer(this);">
									<a title="Remove this answer" href="#" class="a_removeAnswer_{$i}" id="a_removeAnswer">
										<i class="icon-remove"></i>
									</a>
								</span>

								<span class="input-group-addon" onclick="return $Core.quiz.setCorrect(this);">
									<a title="Set as correct answer" href="#" class="a_setCorrect_{$i}" id="a_setCorrect">
										<i class="icon-ok"></i>
									</a>
								</span>

							
						</div>
					{/for}
				{/if}
			</div>
		</div>

	</div>
</div>
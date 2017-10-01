{foreach from=$aQuestions item=aQuestion}
	<div class="table">
		<div class="table_left">
			<label>{$aQuestion.question_phrase|convert}</label>
		</div>
		<div class="table_right">
			{if isset($aQuestion.image_path) && !empty($aQuestion.image_path)}
				<img src="{$aQuestion.image_path}" />
			{/if}
			<div>
				<input placeholder="{$aQuestion.question_phrase|convert}" type="text" class="form-control input-lg" name="val[spam][{$aQuestion.question_id}]" value="" />
			</div>
		</div>
	</div>
{/foreach}
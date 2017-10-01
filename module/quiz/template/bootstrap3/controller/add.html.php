{if isset($aQuiz.quiz_id)}
<div class="view_item_link">
	<a href="{permalink module='quiz' id=$aQuiz.quiz_id title=$aQuiz.title}">{phrase var='quiz.view_quiz'}</a>
</div>
{/if}
{$sCreateJs}

<div class="main_break"></div>
<div style="display:none;" id="hiddenQuestion">
	<div id="js_quiz_layout_default">
		{template file="quiz.block.question"}
	</div>
</div>
<form class="mac-form-quiz-add form-horizontal" method="post" action="{$sFormAction}" id="js_form" name="js_form" {if $bShowTitle}onsubmit="{$sGetJsForm}"{/if} {if Phpfox::getUserParam('quiz.can_upload_picture')}enctype="multipart/form-data"{/if}>
	<div id="js_custom_privacy_input_holder">
	{if isset($aQuiz.quiz_id)}
		{module name='privacy.build' privacy_item_id=$aQuiz.quiz_id privacy_module_id='quiz'}	
	{/if}
	</div>	
	{if isset($aQuiz.quiz_id)}
	  <input type="hidden" name="val[quiz_id]"  value="{$aQuiz.quiz_id}" />
	{/if}
	{if !$bShowTitle}<div style="display:none;">{/if}
		<div class="table">
			<div class="table_left">
				<label>{phrase var='quiz.title'}:</label>
			</div>
			<div class="table_right">
				{if isset($aQuiz.title) && ( ($aQuiz.user_id == Phpfox::getUserId() && Phpfox::getUserParam('quiz.can_edit_own_title')) ||
				($aQuiz.user_id != Phpfox::getUserId() && Phpfox::getUserParam('quiz.can_edit_others_title')))}
				<input placeholder="{phrase var='quiz.title'}" class="form-control" type="text" name="val[title]" value="{$aQuiz.title}" id="title" maxlength="150" size="40" />
				{else}
				<input placeholder="{phrase var='quiz.title'}" class="form-control" type="text" name="val[title]" value="{value type='input' id='title'}" id="title" maxlength="150" size="40" />
				{/if}
			</div>
		</div>
		<div class="table">
			<div class="table_left">
				<label>{phrase var='quiz.description'}:</label>
			</div>
			<div class="table_right">
				{if isset($aQuiz.description)}
				<textarea placeholder="{phrase var='quiz.description'}" class="form-control" name="val[description]" id="description" onkeyup="limitChars('description', 255, 'js_limit_info');">{$aQuiz.description}</textarea>
				<div id="js_limit_info" class="extra_info">{phrase var='quiz.255_character_limit'}</div>
				{else}
				<textarea placeholder="{phrase var='quiz.description'}" class="form-control" name="val[description]" id="description" onkeyup="limitChars('description', 255, 'js_limit_info');">{value type='textarea' id='description'}</textarea>
				<div id="js_limit_info" class="extra_info">{phrase var='quiz.255_character_limit'}</div>
				{/if}
			</div>
		</div>
		
	{if !$bShowTitle}<div style="display:none;">{/if}
		{if Phpfox::getUserParam('quiz.can_upload_picture')}
		<div class="table">
			<div class="table_left">
				<label>
					{if Phpfox::getUserParam('quiz.is_picture_upload_required')}
					{required}
					{/if}
					{phrase var='quiz.image'}:
				</label>
			</div>

			<div class="table_right" id="js_event_current_image" {if !isset($aQuiz.image_path) || $aQuiz.image_path == ''} style="display: none;"{/if}>
				 {if isset($aQuiz) && isset($aQuiz.title) && isset($aQuiz.image_path)}
				 <div class="p_4">

					{img thickbox=true title=$aQuiz.title path='quiz.url_image' file=$aQuiz.image_path suffix=$sSuffix max_width='quiz.quiz_max_image_pic_size' max_height='quiz.quiz_max_image_pic_size'}
					<br />
					<a href="#" onclick="$Core.quiz.deleteImage({$aQuiz.quiz_id});return false;">{phrase var='quiz.click_here_to_delete_this_image_and_upload_a_new_one_in_its_place'}</a>
				</div>
				{/if}
			</div>

			<div class="table_right" id="js_submit_upload_image" {if isset($aQuiz.image_path) && $aQuiz.image_path != ''} style="display: none;"{/if}>
				 <input type="file" id='image' name="image" />
				<div class="alert alert-info mac-mrg-tp">
					<a class="close" data-dismiss="alert" href="#">&times;</a>
					{phrase var='quiz.you_can_upload_a_jpg_gif_or_png_file'}
				</div>
			</div>
		</div>
		{/if}

		{if !$bShowTitle}
	</div>
	{/if} {* end of IF bShowTitle *}		
		
	{if !$bShowTitle}</div>{/if}
	{if !$bShowQuestions}<div style="display:none">{/if}

		<h3>{phrase var='quiz.quiz_questions'}</h3>

		<div id="js_quiz_container" class="row">
			{if isset($aQuiz.questions)}
			{foreach from=$aQuiz.questions item=Question name=question}
			{template file="quiz.block.question"}
			{/foreach}
			{else}
			{* Not Editing *}
			{/if}			
		</div>

		<div class="clear"></div>

		<div class="quiz_add_new_question text-center">
			<a class="btn btn-default" href="#" id="js_add_question">
				{phrase var='quiz.add_another_question'}
			</a>				
		</div>		
		
	{if !$bShowQuestions}</div>{/if}
	
		{if Phpfox::isModule('privacy')}
		<div class="row mac-mrg-tp">

			<div class="col-lg-6 col-12">
				<label>
					{phrase var='quiz.privacy'}
				</label>
				{module name='privacy.form' privacy_name='privacy' privacy_info='quiz.control_who_can_see_this_quiz' default_privacy='quiz.default_privacy_setting'}
			</div>			

			{if Phpfox::isModule('comment')}
			<div class="col-lg-6 col-12">
				<label>
					{phrase var='quiz.comment_privacy'}:
				</label>		
				{module name='privacy.form' privacy_name='privacy_comment' privacy_info='quiz.control_who_can_comment_on_this_quiz' privacy_no_custom=true}
			</div>
			{/if}

		</div>
		{/if}	
	

		<input type="submit" value="{if isset($aQuiz.quiz_id)}{phrase var='quiz.update'}{else}{phrase var='quiz.submit'}{/if}" class="btn btn-primary btn-block btn-lg" />

</form>
{if count($aQuizTakers)}
<ul class="block_listing">
{foreach from=$aQuizTakers key=iLatestUser item=aQuizTaker}
	<li>
		<div class="block_listing_image">
			{if isset($aQuizTaker.user_info)}
				{img user=$aQuizTaker.user_info suffix='_50_square' max_width=32 max_height=32}
			{else}			
			{img user=$aQuizTaker suffix='_50_square' max_width=32 max_height=32}
			{/if}
		</div>
		<div class="block_listing_title" style="padding-left:40px;">
			{if isset($aQuizTaker.user_info)}
				{$aQuizTaker.user_info|user}
			{else}
				{$aQuizTaker|user}
			{/if}	
			{if (Phpfox::getParam('quiz.show_percentage_in_track'))}
				({$aQuizTaker.iSuccessPercentage}%)
			{else}
				({$aQuizTaker.total_correct} / {$aQuizTaker.iTotalCorrectAnswers})
			{/if}				
			<div class="extra_info">
							
				<div class="p_top_8">
					<a class="no_ajax_link btn btn-xs btn-default" href="{permalink module='quiz' id=$aQuizTaker.user_info.quiz_id title=$aQuizTaker.user_info.title}results/id_{if isset($aQuizTaker.user_info)}{$aQuizTaker.user_info.user_id}{else}{$aQuizTaker.user_id}{/if}/">{phrase var='quiz.view_results'}</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</li>	
{/foreach}
</ul>
{else}
<div class="extra_info">
	{phrase var='quiz.be_the_first_to_answer_this_quiz'}
</div>
{/if}
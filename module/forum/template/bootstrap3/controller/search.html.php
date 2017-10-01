<div class="main_break"></div>
<form class="form-horizontal mac-form-forum-search" method="post" action="{if $aCallback === false}{url link='forum.search'}{else}{url link='forum.search' module='pages' item=$aCallback.group_id}{/if}">
	{if $aCallback !== false}
	<div><input type="hidden" name="search[group_id]" value="{$aCallback.group_id}" /></div>
	{/if}
	<div class="table">
		<div class="table_left">
			<label>{phrase var='forum.search_for_keyword_s'}</label>
		</div>
		<div class="table_right mac-inputize">
			{$aFilters.keyword}				
		</div>
	</div>	
	
	<div class="table">
		<div class="table_left">
			<label>{phrase var='forum.search_for_author'}</label>
		</div>
		<div class="table_right mac-inputize">
			{$aFilters.user}	
		</div>
	</div>			

	<h3>{phrase var='forum.search_options'}</h3>

	{if $aCallback === false}
	<div class="table">
		<div class="table_left">
			<label>{phrase var='forum.find_in_forum'}</label>
		</div>
		<div class="table_right">
			<select class="form-control" name="search[forum][]" multiple="multiple" size="10">
				{$sForumList}
			</select>
		</div>
	</div>	
	
	<hr class="invisible">
	{/if}

	<div class="row">

		<div class="col-lg-12 col-md-12 col-xs-12">
			<label>{phrase var='forum.display'}</label>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 mac-inputize">			
			{$aFilters.display}
		</div>

	</div>
	<hr class="invisible">
	<div class="row">

		<div class="col-lg-12 col-md-12 col-xs-12">
			<label>{phrase var='forum.sort'}</label>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 mac-inputize">		
			{$aFilters.sort} in {$aFilters.sort_by}
		</div>

	</div>
	<hr class="invisible">
	<div class="row">

		<div class="col-lg-12 col-md-12 col-xs-12">
			<label>{phrase var='forum.from'}</label>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 mac-inputize">			
			{$aFilters.days_prune}
		</div>
	</div>
	
	<hr class="invisible">
	<div class="row">

		<div class="col-lg-12 col-md-12 col-xs-12">
			<label>{phrase var='forum.display_results_as'}</label>
		</div>
		<div class="col-lg-12 col-md-12 col-xs-12 mac-icheck-wrap">			
			{$aFilters.result}
		</div>
	</div>		
	<hr>
	<div class="table_clear">
		<input type="submit" name="search[submit]" value="{phrase var='forum.search'}" class="btn btn-primary btn-block" />
	</div>
</form>
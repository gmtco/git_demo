<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplForm')));
	foreach($aTplVars['aTplForm'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>


{literal}
<script type="text/javascript" language="javascript">

function {/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_change_cat(sValue)
{ 
	
	
	var sQuery = 'module=block:::{/literal}<?php echo $aCon['alias']; ?>{literal}.utility.catsubselectsearch'; 
	sQuery += '&cat='+sValue;
	sQuery += '&custom_input_ajax=no';
	sQuery += '&field=subcat1';
	sQuery += '&form_id=void';
	
	 
	abstractJQueryAjaxA(
			'{/literal}<?php echo $aSite['path']; ?>{literal}',  
			sQuery,
            '{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_subcat_container', 
            'html', 
            '', 
            '', 
            '',
            '',
            '',
            '.',
            '.',
            '.'
			);
	
	 		
	$(".{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_cat_select").val(sValue); 
	
	$("#{/literal}<?php echo $aCon['alias']; ?>{literal}_custom_input_subsearch_response").html(''); 
	
	abstractJQueryAjaxA(
			'{/literal}<?php echo $aSite['path']; ?>{literal}',  
			'module=block:::{/literal}<?php echo $aCon['alias']; ?>{literal}.utility.inputssearch&cat_type=1&cat_id='+sValue+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
			'{/literal}<?php echo $aCon['alias']; ?>{literal}_custom_input_catsearch_response', 
			'html',
			'slideDown', 
			'slow'
	);
}

function {/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_change_sub(sValue)
{ 
	 		
	$(".{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_sub_select").val(sValue); 
	
	abstractJQueryAjaxA(
			'{/literal}<?php echo $aSite['path']; ?>{literal}',  
			'module=block:::{/literal}<?php echo $aCon['alias']; ?>{literal}.utility.inputssearch&cat_type=2&cat_id='+sValue+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
			'{/literal}<?php echo $aCon['alias']; ?>{literal}_custom_input_subsearch_response', 
			'html',
			'slideDown', 
			'slow'
	);
}

function {/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_change_country(sValue)
{ 
	
	 
	var sQuery = 'module=block:::{/literal}<?php echo $aCon['alias']; ?>{literal}.utility.countrystateselectsearch'; 
	sQuery += '&country_id='+sValue;
	sQuery += '&form_id=void';
	
	  
	abstractJQueryAjaxA(
			'{/literal}<?php echo $aSite['path']; ?>{literal}',  
			sQuery,
            '{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_state_container', 
            'html', 
            '', 
            '', 
            '',
            '',
            '',
            '.',
            '.',
            '.'
			);
	
	  		
	$(".{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_country_select").val(sValue); 
}

function {/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_change_state(sValue)
{ 
	 		
	$(".{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_state_select").val(sValue);
}

function {/literal}<?php echo $aCon['alias']; ?>{literal}_toggle_search_form(sForm)
{ 
	
	if(sForm != 'bus'){  document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus').style.display='none'; }
	if(sForm != 'news'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews').style.display='none'; }
	if(sForm != 'revs'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs').style.display='none'; }
	if(sForm != 'docs'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs').style.display='none'; }
	if(sForm != 'events'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents').style.display='none'; }
	if(sForm != 'videos'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos').style.display='none'; }
	 
	var sOldFormId = document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_active').value; 
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value; 
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_keyword').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_keyword').value;
	
	
	 
	if(document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_open').checked==1){ 
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_open').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_open').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_open').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_open').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_open').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_open').checked=1;
	}else{ 
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_open').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_open').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_open').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_open').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_open').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_open').checked=0;
	}
	
	if(document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_featured').checked==1){ 
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_featured').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_featured').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_featured').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_featured').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_featured').checked=1;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_featured').checked=1;
	}else{ 
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_featured').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_featured').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_featured').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_featured').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_featured').checked=0;
		document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_featured').checked=0;
	}
	
	 
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value; 
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value;	
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value;
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_city').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_city').value;
	
	 
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value; 
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value;
	
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value;
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos_zip').value=document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form'+sOldFormId+'_zip').value;
	
	
	 
	document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_active').value=sForm;
	
	 
	if(sForm == 'bus'){  document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formbus').style.display=''; }
	if(sForm == 'news'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formnews').style.display=''; }
	if(sForm == 'revs'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formrevs').style.display=''; }
	if(sForm == 'docs'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formdocs').style.display=''; }
	if(sForm == 'events'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formevents').style.display=''; }
	if(sForm == 'videos'){ document.getElementById('{/literal}<?php echo $aCon['alias']; ?>{literal}_search_formvideos').style.display=''; }
	   
}

</script>
{/literal}


<input type="hidden" id="<?php echo $aCon['alias']; ?>_search_form_active" value="<?php 

	if($sSection == 'listings'): 	echo 'bus'; endif; 
	if($sSection == 'news'): 		echo 'news'; endif; 
	if($sSection == 'reviews'): 	echo 'revs'; endif; 
	if($sSection == 'documents'): 	echo 'docs'; endif;
	if($sSection == 'events'): 	echo 'events'; endif;
	if($sSection == 'videos'): 	echo 'videos'; endif; 

?>" />

<?php if(Phpfox::isMobile()): ?>
<div style="display:;padding:8px;" id="abstractbusiness_mobile_search_form_edit_button">
<a style="cursor:pointer;" onclick="$('#abstractbusiness_mobile_search_form_edit_button').hide('fast');$('#abstractbusiness_mobile_search_form').show('fast');"><h1>>> <?php echo $aLangPhrases['button_edit']; ?> <?php echo $aLangPhrases['button_search']; ?></h1></a>
</div>
<div style="display:none;padding:8px;" id="abstractbusiness_mobile_search_form">
<?php endif; ?>
 
	
	<div style="display:none;" class="<?php echo $aSiteCss['tab_menu_container']; ?>">
	<ul>

		<li class="<?php if($sSection == 'listings'): echo ' '.$aSiteCss['li_active']; else: echo $aSiteCss['li_nonactive']; endif; ?>">
        	<a {*href="<?php echo $aUrls['sSearchBusinessesUrl']; ?>"*} onclick="<?php echo $aCon['alias']; ?>_toggle_search_form('bus');" 
            ><?php echo $aLangPhrases['item_businesses']; ?></a>
        </li>
 
		<li class="<?php if($sSection == 'news'): echo ' '.$aSiteCss['tab_menu_active']; else: echo $aSiteCss['tab_menu_nonactive']; endif; ?>">
        	<a {*href="<?php echo $aUrls['sSearchNewsUrl']; ?>"*} onclick="<?php echo $aCon['alias']; ?>_toggle_search_form('news');" 
            ><?php echo $aLangPhrases['item_news']; ?></a>
        </li>
        
        <li class="<?php if($sSection == 'reviews'): echo ' '.$aSiteCss['tab_menu_active']; else: echo $aSiteCss['tab_menu_nonactive']; endif; ?>">
        	<a {*href="<?php echo $aUrls['sSearchReviewsUrl']; ?>"*} onclick="<?php echo $aCon['alias']; ?>_toggle_search_form('revs');" 
            ><?php echo $aLangPhrases['item_reviews']; ?></a>
        </li>
 
		<li class="<?php echo $aSiteCss['tab_menu_last']; 
			if($sSection == 'documents'): echo ' '.$aSiteCss['tab_menu_active']; else: echo $aSiteCss['tab_menu_nonactive']; endif; ?>">
        	<a {*href="<?php echo $aUrls['sSearchDocumentsUrl']; ?>"*} onclick="<?php echo $aCon['alias']; ?>_toggle_search_form('docs');" 
            ><?php echo $aLangPhrases['item_documents']; ?></a>
        </li>

	</ul>
		<div class="<?php echo $aSiteCss['clear']; ?>"></div>
	</div>
    
    <?php if($aCon['search_sections'] != ''): ?>
    <div style="margin-bottom:6px;">
    <select class="form-control" name="" id="" onchange="<?php echo $aCon['alias']; ?>_toggle_search_form(this.value);">
    	
        <option value="bus" <?php if($sSection == 'listings'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_businesses']; ?></option>
        <?php if(substr_count($aCon['search_sections'],'news') > 0): ?>
        <option value="news" <?php if($sSection == 'news'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_news']; ?></option>
        <?php endif; ?>
        <?php if(substr_count($aCon['search_sections'],'revs') > 0): ?>
        <option value="revs" <?php if($sSection == 'reviews'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_reviews']; ?></option>
       	<?php endif; ?>
        <?php if(substr_count($aCon['search_sections'],'docs') > 0): ?>
        <option value="docs" <?php if($sSection == 'documents'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_documents']; ?></option>
    	<?php endif; ?>
        <?php if(substr_count($aCon['search_sections'],'events') > 0): ?>
        <option value="events" <?php if($sSection == 'events'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_events']; ?></option>
    	<?php endif; ?>
        <?php if(substr_count($aCon['search_sections'],'videos') > 0): ?>
        <option value="videos" <?php if($sSection == 'videos'): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['item_videos']; ?></option>
    	<?php endif; ?>
    </select>
    </div>
    <?php endif; ?>




	<?php if($sSection == ''): echo 'generic search form'; endif; ?>
    <div id="<?php echo $aCon['alias']; ?>_search_formbus" style="display:<?php if($sSection != 'listings'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formbus', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>
    <div id="<?php echo $aCon['alias']; ?>_search_formnews" style="display:<?php if($sSection != 'news'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formnews', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>
    <div id="<?php echo $aCon['alias']; ?>_search_formrevs" style="display:<?php if($sSection != 'reviews'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formrevs', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>
    <div id="<?php echo $aCon['alias']; ?>_search_formdocs" style="display:<?php if($sSection != 'documents'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formdocs', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>
    <div id="<?php echo $aCon['alias']; ?>_search_formevents" style="display:<?php if($sSection != 'events'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formevents', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>
    <div id="<?php echo $aCon['alias']; ?>_search_formvideos" style="display:<?php if($sSection != 'videos'): echo 'none'; endif; ?>;">
                    <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.search.formvideos', 
                                'aParams'=>array('aSearch'=>$aSearch,'aCon'=>$aCon)
                                
                                )); 
                            
                    ?>
    </div>

<?php if(Phpfox::isMobile()): ?>
</div>
<?php endif; ?>
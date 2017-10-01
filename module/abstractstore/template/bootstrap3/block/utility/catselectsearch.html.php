<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplFormProdSearchCatSelect')));
	foreach($aTplVars['aTplFormProdSearchCatSelect'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

            <select class="form-control" name="cat[cat1]" style="max-width:150px;" 
            class="<?php echo $aCon['alias']; ?>_search_form_cat_select" 
            <?php if($aBlockParams['hidesubs'] != 'yes'): ?>
            	onchange="<?php echo $aCon['alias']; ?>_search_form_change_cat(this.value);" 
            <?php endif; ?> 
            >
            		<option value="0" ><?php echo $aLangPhrases['field_cat']; ?></option>
				<?php foreach($aCats as $aCat){left_curly} ?>
            		<option value="<?php echo $aCat['cat_id']; ?>" 
                    <?php if($aCat['cat_id'] == $aCatsSubmit['cat1']): ?>selected<?php endif; ?>
                    ><?php echo $aCat['cat_text']; ?></option>  	
            	<?php {right_curly} ?>
            </select>

            <?php if($aBlockParams['hidesubs'] != 'yes'): ?>
            	<span class="<?php echo $aCon['alias']; ?>_search_form_subcat_container" 
                style="display:<?php if($aCon['subcats_req'] == "2"): ?>none<?php endif; ?>;">
                <?php $oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.catsubselectsearch', 
							'aParams'=>array(
								
										'cat'=>$aCatsSubmit['cat1'],
										'sub'=>$aCatsSubmit['subcat1'],
										'form_id'=>$sFormId,
										'field'=>'subcat1',
										'custom_input_ajax'=>'no'
										
										)
							
							)); 
						
				?> 
                </span>
            <?php endif; ?>
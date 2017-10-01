<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplFormProdSearchCatSubSelect')));
	foreach($aTplVars['aTplFormProdSearchCatSubSelect'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

            <select class="form-control" name="cat[<?php echo $sSubField; ?>]" style="max-width:150px;" 
            class="<?php echo $aCon['alias']; ?>_search_form_sub_select" 
            onchange="<?php echo $aCon['alias']; ?>_search_form_change_sub(this.value);" >
            		<option value="0" > Subcategory </option>
					<?php foreach($aSubs as $aSub){left_curly} ?>
                        <option value="<?php echo $aSub['sub_id']; ?>" 
                        <?php if($iSubSelected == $aSub['sub_id']): ?>selected<?php endif; ?> 
                        ><?php echo $aSub['sub_text']; ?></option>  	
                    <?php {right_curly} ?>
            </select>
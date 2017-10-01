<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTpl')));
	foreach($aTplVars['aTpl'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

			
		<span style="display:<?php if($aCon['subcats_req'] == "2"): ?>none<?php endif; ?>;">                
                
            <select class="form-control" id="<?php echo $aCon['alias']; ?>_<?php echo $sSubField; ?>" name="cat[<?php echo $sSubField; ?>]" 
            <?php if($sCustomInputAjax == 'yes'): ?>
            onchange="
            		abstractJQueryAjaxA(
                            '<?php echo $aSite['path']; ?>',  
                            'module=block:::<?php echo $aCon['alias']; ?>.utility.inputs&cat_type=2&cat_id='+this.value+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all&situation=0',
                            '<?php echo $aCon['alias']; ?>_custom_input_<?php echo $sSubField; ?>_response', 
                            'html',
                            'slideDown', 
                            'slow'
                          );"
            <?php endif; ?>
            >
            	<?php if($aCon['subcats_req'] == "1" || $aCon['subcats_req'] == "2"): ?>
            		<option value="0" > - </option>
                <?php else: ?>
                	<option value="0" > - </option>
                <?php endif; ?>
				<?php foreach($aSubs as $aSub){left_curly} ?>
            		<option value="<?php echo $aSub['sub_id']; ?>" 
                    <?php if($iSubSelected == $aSub['sub_id']): ?>selected<?php endif; ?> 
                    ><?php echo $aSub['sub_text']; ?></option>  	
            	<?php {right_curly} ?>
            </select>

		</span>
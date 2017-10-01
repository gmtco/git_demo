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

{literal}
<script type="text/javascript">

	var iCat1Prev = 0;
	var iCat2Prev = 0;
	var iCat3Prev = 0;
	
	var iCat1Loaded = {/literal}<?php echo $aCatsSubmit['cat1']; ?>{literal};
	var iCat2Loaded = {/literal}<?php if($aCatsSubmit['cat1'] != $aCatsSubmit['cat2']): echo $aCatsSubmit['cat2']; else: echo 0; endif; ?>{literal};
	var iCat3Loaded = {/literal}<?php if($aCatsSubmit['cat1'] != $aCatsSubmit['cat3'] && $aCatsSubmit['cat2'] != $aCatsSubmit['cat3']): echo $aCatsSubmit['cat2']; else: echo 0; endif; ?>{literal};
	
	function ajaxCustomInputs(){ 
		
		var iCat1 = $('#{/literal}<?php echo $aCon['alias']; ?>{literal}_cat1').val();
		var iCat2 = $('#{/literal}<?php echo $aCon['alias']; ?>{literal}_cat2').val();
		var iCat3 = $('#{/literal}<?php echo $aCon['alias']; ?>{literal}_cat3').val();
		
		var iCat1Changed = false;
		var iCat2Changed = false;
		var iCat3Changed = false;
		
		if(iCat1 != iCat1Prev){ iCat1Changed = true; }
		if(iCat2 != iCat2Prev){ iCat2Changed = true; }
		if(iCat3 != iCat3Prev){ iCat3Changed = true; }
		
		if(iCat1 == 0 || (iCat1 != iCat2 && iCat1 != iCat3)){ 
			if(iCat1 != iCat1Prev || (iCat1 == iCat2Prev && iCat2Changed == true) || (iCat1 == iCat3Prev && iCat3Changed == true)){  
				if(iCat1Loaded != iCat1){
					{/literal}
					iCat1Loaded = iCat1;
					abstractJQueryAjaxA(
									'<?php echo $aSite['path']; ?>',  
									'module=block:::<?php echo $aCon['alias']; ?>.utility.inputs&cat_type=1&cat_id='+iCat1+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
									'<?php echo $aCon['alias']; ?>_custom_input_cat1_response', 
									'html',
									'slideDown', 
									'slow'
								  );
					{literal} 
				}
			}
		}
		
		if(iCat2 == 0 || (iCat2 != iCat1 && iCat2 != iCat3)){ 
			if(iCat2 != iCat2Prev || (iCat2 == iCat1Prev && iCat1Changed == true) || (iCat2 == iCat3Prev && iCat3Changed == true)){ 
				if(iCat2Loaded != iCat2){
					{/literal}
					iCat2Loaded = iCat2;
					abstractJQueryAjaxA(
									'<?php echo $aSite['path']; ?>',  
									'module=block:::<?php echo $aCon['alias']; ?>.utility.inputs&cat_type=1&cat_id='+iCat2+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
									'<?php echo $aCon['alias']; ?>_custom_input_cat2_response', 
									'html',
									'slideDown', 
									'slow'
								  );
					{literal} 
				}
			}
		}
		
		if(iCat3 == 0 || (iCat3 != iCat1 && iCat3 != iCat2)){ 
			if(iCat3 != iCat3Prev || (iCat3 == iCat1Prev && iCat1Changed == true) || (iCat3 == iCat2Prev && iCat2Changed == true)){
				if(iCat3Loaded != iCat3){
					{/literal} 
					iCat3Loaded = iCat3;
					abstractJQueryAjaxA(
									'<?php echo $aSite['path']; ?>',  
									'module=block:::<?php echo $aCon['alias']; ?>.utility.inputs&cat_type=1&cat_id='+iCat3+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
									'<?php echo $aCon['alias']; ?>_custom_input_cat3_response', 
									'html',
									'slideDown', 
									'slow'
								  );
					{literal}	
				}
			}
		}
		
		iCat1Prev = iCat1;
		iCat2Prev = iCat2;
		iCat3Prev = iCat3;
	}
	
</script>
{/literal}
			
            <table>
            <tr>
            <td style="text-align:right;">
            <select class="form-control" id="<?php echo $aCon['alias']; ?>_cat1" name="cat[cat1]" 
            onchange="	
                    abstractJQueryAjaxA(
                        '<?php echo $aSite['path']; ?>',  
                        'module=block:::<?php echo $aCon['alias']; ?>.utility.catsubselect&cat='+this.value+'&custom_input_ajax=yes&field=subcat1',
                        '<?php echo $aCon['alias']; ?>_cat1_select_response', 
                        'html'
                    );
                      <?php if($sCustomInputAjax == 'yes'): ?>
                         $('#<?php echo $aCon['alias']; ?>_custom_input_subcat1_response').html('');
                          ajaxCustomInputs();
            		  <?php endif; ?>      
                      return false;" 
            >
            
									            
            		<option value="0" ><?php echo $aLangPhrases['field_select_one']; ?></option>
				<?php foreach($aCats as $aCat){left_curly} ?>
            		<option value="<?php echo $aCat['cat_id']; ?>" 
                    <?php if($aCat['cat_id'] == $aCatsSubmit['cat1']): ?>selected<?php endif; ?>
                    ><?php echo $aCat['cat_text']; ?></option>  	
            	<?php {right_curly} ?>
            </select>
           	</td>
            <td>
            	<span id="<?php echo $aCon['alias']; ?>_cat1_select_response" >
                <?php $oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.catsubselect', 
							'aParams'=>array(
								
										'cat'=>$aCatsSubmit['cat1'],
										'sub'=>$aCatsSubmit['subcat1'],
										'field'=>'subcat1',
										'custom_input_ajax'=>'yes'
										
										)
							
							)); 
						
				?> 
                </span>
            </td>
            </tr>
                
            <?php if($aCon['multi_cat'] == 0): ?>
            <tr>
            <td style="text-align:right;">
            	<select  class="form-control" id="<?php echo $aCon['alias']; ?>_cat2" name="cat[cat2]"  
                onchange="
                	abstractJQueryAjaxA(
                        '<?php echo $aSite['path']; ?>',  
                        'module=block:::<?php echo $aCon['alias']; ?>.utility.catsubselect&cat='+this.value+'&custom_input_ajax=yes&field=subcat2',
                        '<?php echo $aCon['alias']; ?>_cat2_select_response', 
                        'html'
                    );
                      <?php if($sCustomInputAjax == 'yes'): ?>
                         $('#<?php echo $aCon['alias']; ?>_custom_input_subcat2_response').html('');
                         ajaxCustomInputs();
            		  <?php endif; ?>      
                      return false;" 
                >
            			<option value="0" ><?php echo $aLangPhrases['field_optional']; ?></option>
					<?php foreach($aCats as $aCat){left_curly} ?>
            			<option value="<?php echo $aCat['cat_id']; ?>" 
                        <?php if($aCat['cat_id'] == $aCatsSubmit['cat2']): ?>selected<?php endif; ?>
                        ><?php echo $aCat['cat_text']; ?></option>  	
            		<?php {right_curly} ?>
            	</select>
             </td>
             <td> 
                <span id="<?php echo $aCon['alias']; ?>_cat2_select_response" >
            	<?php $oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.catsubselect', 
							'aParams'=>array(
							
										'cat'=>$aCatsSubmit['cat2'],
										'sub'=>$aCatsSubmit['subcat2'],
										'field'=>'subcat2',
										'custom_input_ajax'=>'yes'
										
										)
							
							)); 
						
				?>
                </span>
 			</td>
            </tr>
            <tr>
            <td style="text-align:right;">           		
            	<select class="form-control" id="<?php echo $aCon['alias']; ?>_cat3" name="cat[cat3]" 
                onchange="
                	abstractJQueryAjaxA(
                        '<?php echo $aSite['path']; ?>',  
                        'module=block:::<?php echo $aCon['alias']; ?>.utility.catsubselect&cat='+this.value+'&custom_input_ajax=yes&field=subcat3',
                        '<?php echo $aCon['alias']; ?>_cat3_select_response', 
                        'html'
                    );
                      <?php if($sCustomInputAjax == 'yes'): ?>
                         $('#<?php echo $aCon['alias']; ?>_custom_input_subcat3_response').html('');
                         ajaxCustomInputs();
            		  <?php endif; ?>      
                      return false;" 
                >
            			<option value="0" ><?php echo $aLangPhrases['field_optional']; ?></option>
					<?php foreach($aCats as $aCat){left_curly} ?>
            			<option value="<?php echo $aCat['cat_id']; ?>"  
                        <?php if($aCat['cat_id'] == $aCatsSubmit['cat3']): ?>selected<?php endif; ?>
                        ><?php echo $aCat['cat_text']; ?></option>  	
            		<?php {right_curly} ?>
            	</select> 
             </td>
             <td>
                <span id="<?php echo $aCon['alias']; ?>_cat3_select_response" >
            	<?php $oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.catsubselect', 
							'aParams'=>array(
							
										'cat'=>$aCatsSubmit['cat3'],
										'sub'=>$aCatsSubmit['subcat3'],
										'field'=>'subcat3',
										'custom_input_ajax'=>'yes'
										
										)
							
							)); 
						
				?>
                </span>
            </td>
            </tr>	
            <?php endif; ?>
			
            
            </table>
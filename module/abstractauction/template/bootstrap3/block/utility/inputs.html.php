<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTpl')));
	$suckas = $aTplVars['aTpl'];
	foreach($aTplVars['aTpl'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

<?php if($iInputs > 0): ?>

	<?php if($sLayout == 'submit'): ?> 

		<?php if(isset($aCat['cat_text'])): ?> 
        	<h3><?php echo $aCat['cat_text']; ?></h3>
        <?php endif; ?>
        
        <?php if(isset($aSub['sub_text'])): ?> 
        	<h3><?php echo $aSub['aCat']['cat_text'].': '.$aSub['sub_text']; ?></h3>
        <?php endif; ?>
		
        <?php foreach($aInputs as $aInput){left_curly} ?>
		<div class="<?php echo $aSiteCss['table']; ?>">
			<div class="<?php echo $aSiteCss['table_left']; ?>">
				<?php if($aInput['inputs_type'] != 2): ?>
					<?php if($aInput['inputs_req'] == 1): ?>
                	<span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span>
                    <?php endif; ?>
					<?php echo $aInput['inputs_prompt_text']; ?>:
                <?php endif; ?>
			</div>
			<div class="<?php echo $aSiteCss['table_right']; ?>">
            <?php if($aInput['inputs_type'] == 0): ?>
                 <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="custom[<?php echo $aInput['inputs_id']; ?>]" 
                 value="<?php echo $aInputsData[$aInput['inputs_id']]; ?>" />
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 1): ?>

                 <?php if($aCon['texteditor'] == 1): ?>
                 
                 	
                    <div class="edit_menu_container w_95">
                        <div id="js_editor_menu_<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>" 
                        class="editor_menu"></div>
                        <script type="text/javascript">
							Editor.setId('<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>');
                        </script>
                        <div id="layer_<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>">
                            <textarea name="custom[<?php echo $aInput['inputs_id']; ?>]" rows="" cols="" style="width:98%;" 
                            id="<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>"><?php echo $aInputsData[$aInput['inputs_id']]; ?></textarea>
                        </div>
                    </div>
                 
                 <?php else: ?>
                 
            	 <![if IE]>		
            		<!--[if lt IE 8]>
					<textarea class="form-control" name="custom[<?php echo $aInput['inputs_id']; ?>]" 
            	    id="<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>" 
                    ><?php echo $aInputsData[$aInput['inputs_id']]; ?></textarea>
					<![endif]-->
            	    <!--[if gte IE 8]>
            	    <textarea class="form-control" name="custom[<?php echo $aInput['inputs_id']; ?>]"  
            		onkeyup="abstractAutoTextboxRows(this);" 
            	    id="<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>" 
                    ><?php echo $aInputsData[$aInput['inputs_id']]; ?></textarea>
            	    <![endif]-->
            	<![endif]-->
				<![if !IE]>
            	<textarea class="form-control" name="custom[<?php echo $aInput['inputs_id']; ?>]"  
            	onkeyup="abstractAutoTextboxRows(this);" 
            	id="<?php echo $aCon['alias']; ?>_submit_custom_<?php echo $aInput['inputs_id']; ?>" 
                ><?php echo $aInputsData[$aInput['inputs_id']]; ?></textarea>
				<![endif]> 
                
				<?php endif; ?>
                 
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 2): ?>
            <label>
                 <input type="checkbox" class="<?php echo $aSiteCss['checkbox']; ?>" name="custom[<?php echo $aInput['inputs_id']; ?>]" 
                 value="1" <?php if($aInputsData[$aInput['inputs_id']] == 1): ?>checked<?php endif; ?> /> 
				 <?php echo $aInput['inputs_prompt_text']; ?><?php if($aInput['inputs_req'] == 1): ?><span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?>
                 <input type="hidden" name="custom_checkboxes[<?php echo $aInput['inputs_id']; ?>]" value="<?php echo $aInput['inputs_req']; ?>" />
            </label>
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 3): ?>
                 <?php /*print_r($aInput['aOptions']);*/ ?> 
                 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>
                 <label>
                 	<input type="radio" class="<?php echo $aSiteCss['radio']; ?>" name="custom[<?php echo $aInput['inputs_id']; ?>]" 
                 	value="<?php echo $aOption['inputs_options_id']; ?>" 
					<?php if($aInputsData[$aInput['inputs_id']] == $aOption['inputs_options_id']): ?>checked<?php endif; ?> /> 
					<?php echo $aOption['inputs_options_text']; ?>
                </label>
                 <?php {right_curly} ?>
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 4): ?>
                 <?php /*print_r($aInput['aOptions']);*/ ?>
                 <select class="form-control" name="custom[<?php echo $aInput['inputs_id']; ?>]">
				 <?php if($aInput['inputs_req'] != 1): ?><option value="0"> - </option><?php endif; ?>
				 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>
                 	<option value="<?php echo $aOption['inputs_options_id']; ?>" 
                    <?php if($aInputsData[$aInput['inputs_id']] == $aOption['inputs_options_id']): ?>selected<?php endif; ?>
                    > <?php echo $aOption['inputs_options_text']; ?></option>
                 <?php {right_curly} ?>
                 </select>
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 5): ?>
                 
                 <?php /*echo $aInputsData[$aInput['inputs_id']];*/ ?>
                 
                 <?php 
				 $aMCBValues = array(); 
				 $aInputsData[$aInput['inputs_id']] = str_replace(':','',$aInputsData[$aInput['inputs_id']]);
				 if(substr_count($aInputsData[$aInput['inputs_id']],'|') > 0): 						
					$aMCBValues = explode('|',$aInputsData[$aInput['inputs_id']]);
				 endif;
				 ?>
                 
                 <input type="hidden" name="custom[<?php echo $aInput['inputs_id']; ?>]" value="" />
                 {*<div class="extra_info">
				 	<?php echo $aLangPhrases['field_check_all_that_apply']; ?> 
					<?php if($aInput['inputs_req'] == 1): ?> <?php echo $aLangPhrases['field_must_select_at_least_one']; ?><?php endif; ?>
                 </div>*}
                 <table style="width:100%;">
				 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>
                	<tr>
                	<td style="padding:4px;width:15px;vertical-align:top;">
                	 	<input type="checkbox" class="<?php echo $aSiteCss['checkbox']; ?>" 
                	    name="custom_checkboxes_multi[<?php echo $aInput['inputs_id']; ?>|<?php echo $aOption['inputs_options_id']; ?>]" 
                	 	<?php foreach($aMCBValues as $aMCBValue){l}
                        if($aMCBValue == $aOption['inputs_options_id']): echo ' checked '; endif; 
						{r} ?>
                        value="1" /> 
					</td>
					<td style="padding:4px;vertical-align:top;">
					<?php echo $aOption['inputs_options_text']; ?>
                	</td>
                	</tr>
                 <?php {right_curly} ?>
                 </table>
                 
            <?php endif; ?>
            
			</div>
			<div class="<?php echo $aSiteCss['clear']; ?>"></div>
		</div>
        <?php {right_curly} ?>

	<?php endif; ?>







	<?php if($sLayout == 'splash'): ?> 

		<?php if(isset($aCat['cat_text'])): ?> 
        	{*<h3><?php echo $aCat['cat_text']; ?></h3>*}
        <?php endif; ?>
        
        <?php if(isset($aSub['sub_text'])): ?> 
        	{*<h3><?php echo $aSub['aCat']['cat_text'].' &raquo; '.$aSub['sub_text']; ?></h3>*}
        <?php endif; ?>
		
        <?php foreach($aInputs as $aInput){left_curly} ?>
        <?php if(( $aInput['inputs_type'] != 2 && ($aInputsData[$aInput['inputs_id']] != '' || $aInputsData[$aInput['inputs_id']] > 0)) 
				
				|| ($aInput['inputs_type'] == 2)
				
				): ?>
        
		{*
        <div class="<?php echo $aSiteCss['table']; ?>">
			<div class="<?php echo $aSiteCss['table_left']; ?>">
				
					<span class="<?php echo $aSiteCss['extra_info']; ?>"><?php echo $aInput['inputs_prompt_search_text']; ?>:</span>
                
			</div>
			<div class="<?php echo $aSiteCss['table_right']; ?>" style="vertical-align:middle;">
            <?php if($aInput['inputs_type'] == 0 || $aInput['inputs_type'] == 1): ?>
                <?php 
				 
				 	//Formulate Display Text (Replace \r\n with Html) 
					$aStrMatch = array("\r\n", "\n", "\r");
					$aInputsData[$aInput['inputs_id']] = str_replace($aStrMatch,'<br />',$aInputsData[$aInput['inputs_id']]);
					$aInputsData[$aInput['inputs_id']] = str_replace('&quot;','"',$aInputsData[$aInput['inputs_id']]);
					$aInputsData[$aInput['inputs_id']] = str_replace('&#039;',"'",$aInputsData[$aInput['inputs_id']]);
				 	echo $aInputsData[$aInput['inputs_id']]; 
					
				?>
            <?php endif; ?>
            
            
            
            <?php if($aInput['inputs_type'] == 2): ?>
                 
			 <?php if($aInputsData[$aInput['inputs_id']] == 1): echo $aLangPhrases['button_yes']; else: echo $aLangPhrases['button_no']; endif; ?> 
				 
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 3 || $aInput['inputs_type'] == 4): ?>
                 <?php /*print_r($aInput['aOptions']);*/ ?> 
                 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>
                 	
					<?php if($aInputsData[$aInput['inputs_id']] == $aOption['inputs_options_id']): echo $aOption['inputs_options_text']; endif; ?>  			
                    
                 <?php {right_curly} ?>
            <?php endif; ?>
            
            
			</div>
			<div class="<?php echo $aSiteCss['clear']; ?>"></div>
		</div>
        *}
        
        <?php $iTableLeftWidth = '25%'; ?>
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<span class="<?php echo $aSiteCss['extra_info']; ?>"><?php echo $aInput['inputs_prompt_search_text']; ?>:</span>
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php if($aInput['inputs_type'] == 0 || $aInput['inputs_type'] == 1): ?>
                <?php 
				 
				 	//Formulate Display Text (Replace \r\n with Html) 
					$aStrMatch = array("\r\n", "\n", "\r");
					$aInputsData[$aInput['inputs_id']] = str_replace($aStrMatch,'<br />',$aInputsData[$aInput['inputs_id']]);
					$aInputsData[$aInput['inputs_id']] = str_replace('&quot;','"',$aInputsData[$aInput['inputs_id']]);
					$aInputsData[$aInput['inputs_id']] = str_replace('&#039;',"'",$aInputsData[$aInput['inputs_id']]);
				 	echo $aInputsData[$aInput['inputs_id']]; 
					
				?>
            <?php endif; ?>
            
            
            
            <?php if($aInput['inputs_type'] == 2): ?>
                 
			 <?php if($aInputsData[$aInput['inputs_id']] == 1): echo $aLangPhrases['button_yes']; else: echo $aLangPhrases['button_no']; endif; ?> 
				 
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 3 || $aInput['inputs_type'] == 4): ?>
                 <?php /*print_r($aInput['aOptions']);*/ ?> 
                 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>
                 	
					<?php if($aInputsData[$aInput['inputs_id']] == $aOption['inputs_options_id']): echo $aOption['inputs_options_text']; endif; ?>  			
                    
                 <?php {right_curly} ?>
            <?php endif; ?>
            
            <?php if($aInput['inputs_type'] == 5): ?>
                 
                 <?php 
				 $aMCBValues = array(); 
				 $aInputsData[$aInput['inputs_id']] = str_replace(':','',$aInputsData[$aInput['inputs_id']]);
				 if(substr_count($aInputsData[$aInput['inputs_id']],'|') > 0): 						
					$aMCBValues = explode('|',$aInputsData[$aInput['inputs_id']]);
				 endif;
				 ?>
                 
                 
				 <?php foreach($aInput['aOptions'] as $aOption){left_curly} ?>	 
                	 	<?php foreach($aMCBValues as $aMCBValue){l}
                        if($aMCBValue == $aOption['inputs_options_id']): ?>
							<div style="padding-bottom:2px;"><?php echo $aOption['inputs_options_text']; ?></div> 
						<?php endif; {r} ?>
                 <?php {right_curly} ?>
                 
                 
            <?php endif; ?>
            
        </td>
        </tr>
        </table>
        
        
        
        
        <?php endif; ?>
        <?php {right_curly} ?>

	<?php endif; ?>





<?php endif; ?>
<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplSubmitAdv')));
	foreach($aTplVars['aTplSubmitAdv'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

<?php if($bCallbackItemInvalidError == true): ?>
	
    <?php if($aModule['module'] != 'new' && $aModule['module'] != ''): ?>
    <div class="<?php echo $aSiteCss['error_message']; ?>"><?php echo $aLangPhrases['error_auc_callback_item_invalid']; ?></div>
	<div class="<?php echo $aSiteCss['main_break']; ?>"></div>
    <?php endif; ?>
    
    
            {literal}
            <script type="text/javascript">
            
            	function auctionSelectSellerModule(value){ 
					
					if(value != ''){
						if($('#seller_sel_module_'+value+'').val() == 'user'){ 
							window.location='{/literal}<?php echo $aUrls['sSubmitUrlBlank']; ?>{literal}';
						}else{ 
							window.location='{/literal}<?php echo $aUrls['sSubmitUrlBlank']; ?>{literal}module_'+$('#seller_sel_module_'+value+'').val()+'/type_'+$('#seller_sel_type_'+value+'').val()+'/item_'+$('#seller_sel_item_'+value+'').val()+'/';
						}
					}
				}
			
			</script>
            {/literal}
            
            
            <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                         
                            <?php echo $aLangPhrases['field_seller_by']; ?>:
                        
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         
                         <select name="storeselector" class="form-control" onchange="auctionSelectSellerModule(this.value);">
							<option value=""> - </option>
							<?php foreach($aStorePossibles as $aStorePossible){left_curly} ?>	
                                <option value="<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>"><?php echo $aStorePossible['title']; ?></option>
                            <?php {right_curly} ?>
                        </select>
                        
                        
                        <div style="display:none;">
                        	
                            <?php foreach($aStorePossibles as $aStorePossible){left_curly} ?>	
                                <br>
                                <input id="seller_sel_module_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['module']; ?>" /> 
                                
                                <input id="seller_sel_item_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['item']; ?>" />
                                
                                <input id="seller_sel_type_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['type']; ?>" />
                                
                            <?php {right_curly} ?>
                            
                        </div>
            
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>    
    
    
    
    
    
<?php else: ?>

<?php if($bCallbackItemOwnerError == true): ?>
	<div class="<?php echo $aSiteCss['error_message']; ?>"><?php echo $aLangPhrases['error_auc_callback_item']; ?>: <?php echo $aCallbackItem['title']; ?></div>
	<div class="<?php echo $aSiteCss['main_break']; ?>"></div>
<?php else: ?>



        
        <div id="<?php echo $aCon['alias']; ?>_form_container" style="display:;">
        
        <?php if(count($aAbstractErrors)): ?>
            <?php foreach($aAbstractErrors as $aError){left_curly} ?>
                <div class="<?php echo $aSiteCss['error_message']; ?>"><?php echo $aError['error_text']; ?></div>
            <?php {right_curly} ?>
            <div class="<?php echo $aSiteCss['main_break']; ?>"></div>
        <?php endif; ?>
        
        <?php if($aUser['aSubmit']['plans_submit_commission'] > 0): ?>
            <div class="<?php echo $aSiteCss['message']; ?>"><?php echo $aLangPhrases['notice_commission_charge']; ?></div>
            {*<div class="<?php echo $aSiteCss['main_break']; ?>"></div>*}
        <?php endif; ?>
        
        <?php if($aUser['aSubmit']['plans_submit_prepay_mode'] == 1): ?>
        	
            <?php if($aUser['aSubmit']['plans_submit_listing_fee'] > 0): ?> 
                <div class="<?php echo $aSiteCss['message']; ?>"><?php echo $aLangPhrases['notice_prepay_listing_charge']; ?></div>
                {*<div class="<?php echo $aSiteCss['main_break']; ?>"></div>*}
            <?php else: ?>
            	
            <?php endif; ?>   
                
        <?php else: ?>
			
            <?php if($aUser['aSubmit']['plans_submit_listing_fee'] > 0): ?> 
                <div class="<?php echo $aSiteCss['message']; ?>"><?php echo $aLangPhrases['notice_listing_charge']; ?></div>
                {*<div class="<?php echo $aSiteCss['main_break']; ?>"></div>*}
            <?php endif; ?>
            
		<?php endif; ?>
        
        <?php if($aUser['aSubmit']['plans_submit_days_min'] > 0 && $aUser['aSubmit']['plans_submit_days_min'] == $aUser['aSubmit']['plans_submit_days_max'] 
			&& $aUser['aSubmit']['plans_submit_expire_mode'] == 0): ?>
        	<div class="<?php echo $aSiteCss['message']; ?>"><?php echo $aLangPhrases['notice_day_constant']; ?></div>
        <?php endif; ?>
        
        <?php if($aCon['hours_can_edit'] > 0): ?>
            <div class="<?php echo $aSiteCss['message']; ?>"><?php echo $aLangPhrases['notice_edit_time_limit']; ?></div>
            {*<div class="<?php echo $aSiteCss['main_break']; ?>"></div>*}
        <?php endif; ?>
       
        <br><br>
        <form method="post" action="<?php echo $aUrls['sSubmitUrl']; ?>" enctype="multipart/form-data">
        <div style="display:none;">{token}</div>
        
        <input type="hidden" name="module" id="seller_module" value="<?php echo $aModule['module']; ?>" />
        <input type="hidden" name="item" id="seller_item" value="<?php echo $aModule['item']; ?>" />
        <input type="hidden" name="type" id="seller_type" value="<?php echo $aModule['type']; ?>" />
        
        
        	
        
        
        <?php if(isset($aCallbackItem['title'])): ?> 
        
            <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aModule['module'] == 'event'): ?>	
                            <?php echo $aLangPhrases['field_seller_event']; ?>:
                        <?php else: ?> 
                            <?php echo $aLangPhrases['field_seller_by']; ?>:
                        <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <span style="font-size:16pt;">
						 <?php echo $aCallbackItem['title']; ?> - <a href="<?php echo $aUrls['sSubmitUrlBlank'].'module_new/'; ?>">x</a>
                         </span>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
        
        <?php else: ?>
        	
            {literal}
            <script type="text/javascript">
            
            	function auctionSelectSellerModule(value){ 
					
					$('#seller_module').val($('#seller_sel_module_'+value+'').val());
					$('#seller_item').val($('#seller_sel_item_'+value+'').val());
					$('#seller_type').val($('#seller_sel_type_'+value+'').val());
					
					if($('#seller_sel_module_'+value+'').val() == 'user'){ 
						$('#seller_module').val('');
						$('#seller_item').val('');
						$('#seller_type').val('');
					}
					
					changeCurrencyFromStoreSelector($('#seller_sel_currency_'+value+'').val());
				
				}
			
			</script>
            {/literal}
            
            
            <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                         
                            <?php echo $aLangPhrases['field_seller_by']; ?>:
                        
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         
                         <select name="storeselector" style="width:400px;max-width:400px;" onchange="auctionSelectSellerModule(this.value);">
							<?php foreach($aStorePossibles as $aStorePossible){left_curly} ?>	
                                <option value="<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>"><?php echo $aStorePossible['title']; ?></option>
                            <?php {right_curly} ?>
                        </select>
                        
                        
                        <div style="display:none;">
                        	
                            <?php foreach($aStorePossibles as $aStorePossible){left_curly} ?>	
                                <br>
                                <input id="seller_sel_module_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['module']; ?>" /> 
                                
                                <input id="seller_sel_item_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['item']; ?>" />
                                
                                <input id="seller_sel_type_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['type']; ?>" />
                                
                                <input id="seller_sel_currency_<?php echo $aStorePossible['module'].'_'.$aStorePossible['item'].'_'.$aStorePossible['type']; ?>" 
                                type="text" value="<?php echo $aStorePossible['currency']; ?>" />
                                
                            <?php {right_curly} ?>
                            
                        </div>
            
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
        
        <?php endif; ?> 
        
            <?php if($aUser['sIsAdmin'] == 'yes' && $aModule['module'] == ''): ?>
                <div class="<?php echo $aSiteCss['table']; ?>" style="display:none;">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                    {*<span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_unclaimed']; ?>:*}
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         
                         {*
                         <input type="radio" class="<?php echo $aSiteCss['radio']; ?>" name="auc[unclaimed]" value="1" 
                         <?php if(!isset($aAucSubmit['unclaimed']) || (isset($aAucSubmit['unclaimed']) && $aAucSubmit['unclaimed'] == 1)): ?>
                            checked
                         <?php endif; ?>
                          /> 
                         <?php echo $aLangPhrases['field_site_auction']; ?> 
                         <input type="radio" class="<?php echo $aSiteCss['radio']; ?>" name="auc[unclaimed]" value="0" 
                         <?php if(isset($aAucSubmit['unclaimed']) && $aAucSubmit['unclaimed'] == 0): ?>
                            checked
                         <?php endif; ?> /> 
                         <?php echo $aLangPhrases['field_user_auction']; ?> 
                          
                         <i><?php echo $aLangPhrases['notice_admin_only_p']; ?></i>
                         *}
                         <input type="hidden" name="auc[unclaimed]" value="0" />
                         
                         {*<br><br>*}
                         Auction Alias (the field below) is used as a static identifier for special Site Auctions, 
                         or Auctions integrated with other modules. Leave blank if not doing something like that. 
                         Auctions with aliases will not appear in normal Auction Search or Display areas.<br><br>
                         
                         Alias: <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="15" name="auc[auc_alias]" 
                         value="<?php if(isset($aAucSubmit['auc_alias'])): echo $aAucSubmit['auc_alias']; ?><?php endif; ?>" />
                         
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php else: ?> 
                <?php if(!isset($aUser['user_id']) || (isset($aUser['user_id']) && $aUser['user_id'] == 0)): ?>
                    <input type="hidden" name="auc[unclaimed]" value="1" />
                <?php else: ?> 
                    <input type="hidden" name="auc[unclaimed]" value="0" />
                <?php endif; ?>  
                <input type="hidden" name="auc[auc_alias]" value="" />  
            <?php endif; ?>
        
                
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_name']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc[auc_name]" 
                         value="<?php if(isset($aAucSubmit['auc_name'])): echo $aAucSubmit['auc_name']; ?><?php endif; ?>" />
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
        
        <span style="display:none;">
        Logo Mode: <?php echo $aUser['aSubmit']['plans_submit_logo_mode']; ?><br>
        0 = Required<br>
        1 = Not Required<br>
        2 = Off, Invis<br>
        3 = Off, Upgrade Prompt<br>
        </span>
        
            <?php if($aUser['aSubmit']['plans_submit_logo_mode'] != 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_logo_mode'] == 0): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?>
                        <?php echo $aLangPhrases['field_logo']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_logo_mode'] == 3): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                    <?php else: ?>
                         <input type="file" class="<?php echo $aSiteCss['text_line']; ?>" size="35" 
                         id="<?php echo $aCon['alias']; ?>-photo-1" name="<?php echo $aCon['alias']; ?>-photo-1" accept="image/jpeg,image/png,image/gif" />
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php endif; ?>
                
        
        
        
        <?php if(!isset($aUser['user_id']) || (isset($aUser['user_id']) && $aUser['user_id'] == 0)): ?>
                    <input type="hidden" name="auc[auc_display]" value="0" />
        <?php else: ?>        		
        
            <?php if($aUser['aSubmit']['plans_submit_profile_mode'] == 0 || $aUser['aSubmit']['plans_submit_profile_mode'] == 3): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_associate']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_profile_mode'] == 3): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                        <input type="hidden" name="auc[auc_display]" value="0" />
                    <?php else: ?>
                         <input type="radio" class="<?php echo $aSiteCss['radio']; ?>" name="auc[auc_display]" value="0" 
                         <?php if(isset($aAucSubmit['auc_display']) && $aAucSubmit['auc_display'] == 0): ?>
                            checked
                         <?php endif; ?> />
                         <?php echo $aLangPhrases['button_no']; ?>
                         <input type="radio" class="<?php echo $aSiteCss['radio']; ?>" name="auc[auc_display]" value="1" 
                         <?php if(!isset($aAucSubmit['auc_display']) || (isset($aAucSubmit['auc_display']) && $aAucSubmit['auc_display'] == 1)): ?>
                            checked
                         <?php endif; ?> /> 
                         <?php echo $aLangPhrases['button_yes']; ?> 
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php else: ?> 
                <?php if($aUser['aSubmit']['plans_submit_profile_mode'] == 1): ?>
                    <input type="hidden" name="auc[auc_display]" value="1" />
                <?php endif; ?>
                <?php if($aUser['aSubmit']['plans_submit_profile_mode'] == 2): ?>
                    <input type="hidden" name="auc[auc_display]" value="0" />
                <?php endif; ?>
            <?php endif; ?>
            
        <?php endif; ?>    
        
        
        
        
        
            
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_catize']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.catselect', 
                                    'aParams'=>array('custom_input_ajax'=>'yes')
                                    
                                    )); 
                                
                        ?>
                    
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
        
        
        
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_cat1_response" style="display:;">
                        <?php 
						
							
								$oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'1',
                                            'cat_id'=>$aCatsSubmit['cat1'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                              
                        ?>
                        </span>
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_subcat1_response" style="display:;">
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'2',
                                            'cat_id'=>$aCatsSubmit['subcat1'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                                
                        ?>
                        </span>
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_cat2_response" style="display:;">
                        <?php 
						
							if($aCatsSubmit['cat2'] != $aCatsSubmit['cat1']):
								$oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'1',
                                            'cat_id'=>$aCatsSubmit['cat2'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                             endif;   
                        ?>
                        </span>
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_subcat2_response" style="display:;">
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'2',
                                            'cat_id'=>$aCatsSubmit['subcat2'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                                
                        ?>
                        </span>
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_cat3_response" style="display:;">
                        <?php 
						
							if($aCatsSubmit['cat3'] != $aCatsSubmit['cat1'] && $aCatsSubmit['cat3'] != $aCatsSubmit['cat2']):
								$oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'1',
                                            'cat_id'=>$aCatsSubmit['cat3'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                             endif;   
                        ?>
                        </span>
                        <span id="<?php echo $aCon['alias']; ?>_custom_input_subcat3_response" style="display:;">
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'2',
                                            'cat_id'=>$aCatsSubmit['subcat3'],
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                                
                        ?>
                        </span>
        
        
        
        




{literal}
<script type="text/javascript">

	function noexpire() {
		
		
		var bIsChecked = document.getElementById('auc_expire_mode').checked;
		
		if(bIsChecked==true){
			$('#auc_days_container').fadeOut('fast');
		}else{	
			$('#auc_days_container').fadeIn('fast');
		}
		
	}
</script> 
{/literal}

<?php if($aUser['aSubmit']['plans_submit_expire_mode'] == 2): ?> 
	<input type="hidden" name="auc[auc_days]" value="0" />
    <input type="hidden" name="auc[auc_expire_mode]" value="1" />
<?php else: ?>
        
	<?php if($aUser['aSubmit']['plans_submit_days_min'] > 0 && $aUser['aSubmit']['plans_submit_days_min'] == $aUser['aSubmit']['plans_submit_days_max'] 
        	&& $aUser['aSubmit']['plans_submit_expire_mode'] == 0): ?>
    {* If days_min > 0 and days_min == days_max then days value is a set constant *}
    <input type="hidden" name="auc[auc_days]" value="<?php echo $aUser['aSubmit']['plans_submit_days_min']; ?>" />
    <input type="hidden" name="auc[auc_expire_mode]" value="0" />
    <?php else: ?>
    
            <h3><?php echo $aLangPhrases['field_upgrade_header_schedule']; ?></h3>       
            	
                <?php if($aUser['aSubmit']['plans_submit_days_min'] > 0 && $aUser['aSubmit']['plans_submit_days_min'] == $aUser['aSubmit']['plans_submit_days_max'] 
        				&& $aUser['aSubmit']['plans_submit_expire_mode'] == 1): ?>
                	
                    
                            <div class="<?php echo $aSiteCss['table']; ?>">
                                <div class="<?php echo $aSiteCss['table_left']; ?>">
                                    
                                </div>
                                <div class="<?php echo $aSiteCss['table_right']; ?>"> 
                                        <div class="<?php echo $aSiteCss['extra_info']; ?>">
                                            <?php echo $aLangPhrases['field_upgrade_noexpire_notice']; ?> 
                                        </div>
                                    
                                    <input type="hidden" name="auc[auc_days]" value="<?php echo $aUser['aSubmit']['plans_submit_days_min']; ?>" />
                                    
                                    <input type="checkbox" name="auc[auc_expire_mode]" value="1" 
                                    <?php if(isset($aAucSubmit['auc_expire_mode']) && $aAucSubmit['auc_expire_mode'] == 1): echo 'checked'; endif; ?> /> 
                                    <?php echo $aLangPhrases['field_upgrade_noexpire']; ?>
                                
                                </div>
                                <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                            </div>              
                
                <?php else: ?>
                
                    
                    
                    <div class="<?php echo $aSiteCss['table']; ?>">
                        <div class="<?php echo $aSiteCss['table_left']; ?>">
                            
                        </div>
                        <div class="<?php echo $aSiteCss['table_right']; ?>"> 
                                <div class="<?php echo $aSiteCss['extra_info']; ?>">
                                        <?php if($aUser['aSubmit']['plans_submit_days_min'] > 0): ?>
                                        <?php echo $aLangPhrases['field_upgrade_days_min']; ?> 
                                        <?php endif; ?>
                                        
                                        <?php if($aUser['aSubmit']['plans_submit_days_max'] > 0): ?>
                                        <?php echo $aLangPhrases['field_upgrade_days_max']; ?> 
                                        <?php endif; ?>
                                </div>
                        </div>
                        <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                    </div>
                    
                    <?php if($aCon['days_can_schedule'] > 0): ?>
                    <div class="<?php echo $aSiteCss['table']; ?>">
                        <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_sched_title']; ?>:
                        </div>
                        <div class="<?php echo $aSiteCss['table_right']; ?>"> 
                                <div class="<?php echo $aSiteCss['extra_info']; ?>">
                                
								<?php 
								
								$iWithinDaysLimit = $aCon['days_can_schedule']; 
								$iTimeZoneOffset = $aCon['days_can_schedule_offset'] * 3600;
								
								 
								?>
								
                                {literal}
                                <script type="text/javascript">
                                
									function toggleAuctionSchedule(val){ 
										if(val==1){ 
											$('#auction-schedule-containter').show('fast');
										}else{ 
											$('#auction-schedule-containter').hide('fast');
										}
									}
									
								</script>
                                {/literal}
                                
                                  
                                <select name="auc_time[type]" onchange="toggleAuctionSchedule(this.value);">
                                	<option value="0" <?php if(isset($aAucTime['type']) && $aAucTime['type'] == 0): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['field_sched_now']; ?></option>
                                    <option value="1" <?php if(isset($aAucTime['type']) && $aAucTime['type'] == 1): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['field_sched_sched']; ?></option>
                                </select>
                                
                                <div id="auction-schedule-containter" style="padding-top:4px;padding-bottom:4px;display:<?php if(isset($aAucTime['type']) && $aAucTime['type'] == 1): else: ?>none<?php endif; ?>;">
                                
                                <?php if($aLangPhrases['field_sched_timezone'] != ''): ?>
                                <div style="padding-bottom:4px;"><?php echo $aLangPhrases['field_sched_timezone']; ?></div>
                                <?php endif; ?>
                                
                                <select name="auc_time[time]">
                                <?php $iNextDayTime = (mktime(0,0,0,date("n"),date("j"),date("Y")*1) - $iTimeZoneOffset); ?> 
                                <?php while($iWithinDaysLimit > 0){l} ?>	
                                     
                                    <option value="<?php echo $iNextDayTime; ?>" 
                                     <?php if(isset($aAucTime['time']) && $aAucTime['time'] == $iNextDayTime): 
									 	echo 'selected'; endif; ?> ><?php 
											
											$sSchedDate = date('M j, Y',$iNextDayTime); 
											$sSchedDate = str_replace('Jan',$aLangPhrases['common_january'],$sSchedDate);
											$sSchedDate = str_replace('Feb',$aLangPhrases['common_february'],$sSchedDate);
											$sSchedDate = str_replace('Mar',$aLangPhrases['common_march'],$sSchedDate);
											$sSchedDate = str_replace('Apr',$aLangPhrases['common_april'],$sSchedDate);
											$sSchedDate = str_replace('May',$aLangPhrases['common_may'],$sSchedDate);
											$sSchedDate = str_replace('Jun',$aLangPhrases['common_june'],$sSchedDate);
											$sSchedDate = str_replace('Jul',$aLangPhrases['common_july'],$sSchedDate);
											$sSchedDate = str_replace('Aug',$aLangPhrases['common_august'],$sSchedDate);
											$sSchedDate = str_replace('Sep',$aLangPhrases['common_september'],$sSchedDate);
											$sSchedDate = str_replace('Oct',$aLangPhrases['common_october'],$sSchedDate);
											$sSchedDate = str_replace('Nov',$aLangPhrases['common_november'],$sSchedDate);
											$sSchedDate = str_replace('Dec',$aLangPhrases['common_december'],$sSchedDate);
											echo $sSchedDate; 
										?></option>
									<?php $iNextDayTime = $iNextDayTime + 86400; ?>
                                    <?php $iWithinDaysLimit = $iWithinDaysLimit-1; ?>
                                <?php {r} ?>
                                </select>
                                
                                <select name="auc_time[plus]">
                                <?php $iHours = 0; while($iHours < 24){l} ?>	
                                    <option value="<?php echo $iHours * 3600; ?>" 
                                    <?php if(isset($aAucTime['plus']) && $aAucTime['plus'] == $iHours * 3600): echo 'selected'; endif; ?>>+<?php echo $iHours.':00'; ?></option>
                                <?php $iHours++; {r} ?>
                                </select>
                                </div>
                                
								
								
                                </div>
                        </div>
                        <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                    </div>
                    <?php endif; ?>
                    
                    
                    <div class="<?php echo $aSiteCss['table']; ?>">
                        <div class="<?php echo $aSiteCss['table_left']; ?>">
                           <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_upgrade_days_length']; ?>: 
                        </div>
                        <div class="<?php echo $aSiteCss['table_right']; ?>"> 
                        		
                               
								
								
								<?php if($aUser['aSubmit']['plans_submit_expire_mode'] == 1): ?>
                        			<div style="padding-bottom:8px;">
                                    <input type="checkbox" name="auc[auc_expire_mode]" value="1" id="auc_expire_mode" onclick="noexpire();"
                                    <?php if(isset($aAucSubmit['auc_expire_mode']) && $aAucSubmit['auc_expire_mode'] == 1): echo 'checked'; endif; ?> /> 
                                    <?php echo $aLangPhrases['field_upgrade_noexpire']; ?>
                                    </div>
                                <?php else: ?> 
                                	<input type="hidden" name="auc[auc_expire_mode]" value="0" />
                                <?php endif; ?>
                                
                                <span id="auc_days_container" 
                                	style="display:<?php if(isset($aAucSubmit['auc_expire_mode']) && $aAucSubmit['auc_expire_mode'] == 1): echo 'none'; endif; ?>;">   
                                <input type="text" name="auc[auc_days]" size="3" 
                                value="<?php if(isset($aAucSubmit['auc_days'])): echo $aAucSubmit['auc_days']; else: echo $aUser['aSubmit']['plans_submit_days_min']; endif; ?>" />
                                
                                <?php if($aUser['aSubmit']['plans_submit_day_fee'] > 0): ?>
                                    <?php echo $aLangPhrases['field_upgrade_days']; ?> 
                                <?php endif; ?>
                                </span>
                                
                                
                        </div>
                        <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                    </div>
                    
               <?php endif; ?>
               
    <?php endif; ?>                        
<?php endif; ?>





        
        
        
        <h3><?php echo $aLangPhrases['common_information']; ?></h3>       
        
        
        
        		<?php if($aUser['aSubmit']['plans_submit_types_mode'] == 0): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span>
                        <?php echo $aLangPhrases['field_type']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    
                        <label>
                         <input type="radio" name="auc[auc_type]" value="0" id="auc_type_both" 
                         onclick="$('#reserve_container').show('fast');$('#price_container').show('fast');ifBidHigherThanBuyNow();" 
						 <?php if((isset($aAucSubmit['auc_type']) && $aAucSubmit['auc_type'] == 0) || (!isset($aAucSubmit['auc_type']))): echo 'checked'; endif; ?> /> <?php echo $aLangPhrases['field_type_both']; ?>
                         </label>

                        <label>
                         <input type="radio" name="auc[auc_type]" value="1" 
                         onclick="$('#reserve_container').show('fast');$('#price_container').hide('fast');" 
						 <?php if(isset($aAucSubmit['auc_type']) && $aAucSubmit['auc_type'] == 1): echo 'checked'; endif; ?> /> <?php echo $aLangPhrases['field_type_bidding']; ?> 
                         </label>

                        <label>
                         <input type="radio" name="auc[auc_type]" value="2" 
                         onclick="$('#reserve_container').hide('fast');$('#price_container').show('fast');" 
						 <?php if(isset($aAucSubmit['auc_type']) && $aAucSubmit['auc_type'] == 2): echo 'checked'; endif; ?> /> <?php echo $aLangPhrases['field_type_buynow']; ?> 
                        </label>

                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                	<?php if($aUser['aSubmit']['plans_submit_types_mode'] == 1): ?>
                    	<input type="hidden" name="auc[auc_type]" value="1" />
                    <?php else: ?>
                    	<input type="hidden" name="auc[auc_type]" value="2" />
                    <?php endif; ?>
                <?php endif; ?>
        
        
        
                <?php if($aUser['aSubmit']['plans_submit_quantity_mode'] == 0 || $aUser['aSubmit']['plans_submit_quantity_mode'] == 1): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_quantity']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                        
                        <?php if($aUser['aSubmit']['plans_submit_quantity_mode'] == 1): ?>
                        	
                            <?php $aAucSubmit['auc_quantity_type'] = 0; ?>
                            <input type="hidden" name="auc[auc_quantity_type]" value="0" />
                            
                        <?php else: ?>
                            
                            <label>
                            <input type="radio" name="auc[auc_quantity_type]" value="1" 
                            onclick="$('#quantity_field_container').slideUp('fast');$('#quantity_field').val('0');" 
                            <?php if(!isset($aAucSubmit['auc_quantity_type']) || (isset($aAucSubmit['auc_quantity_type']) && $aAucSubmit['auc_quantity_type'] == 1)): echo 'checked'; endif; ?> /> 
                            <?php echo $aLangPhrases['field_quantity_unlimited']; ?> 
                            </label>

                            <label>
                            <input type="radio" name="auc[auc_quantity_type]" value="0" 
                            onclick="$('#quantity_field_container').slideDown('fast');" 
                            <?php if(isset($aAucSubmit['auc_quantity_type']) && $aAucSubmit['auc_quantity_type'] == 0): echo 'checked'; endif; ?> /> 
                            <?php echo $aLangPhrases['field_quantity_limited']; ?>
                            </label>

                        <?php endif; ?>

                        <br> <br>
                        <label>
                            <input type="checkbox" name="auc[auc_quantity_multiple]" value="1" 
                            <?php if($bFormPosted != true || (isset($aAucSubmit['auc_quantity_multiple']) && $aAucSubmit['auc_quantity_multiple'] == 1)): echo 'checked'; endif; ?> 
                            /> <?php echo $aLangPhrases['field_quantity_multiple']; ?>
                        </label>

                        <br> <br>
                        

                         <div style="padding-top:6px;display:<?php if(!isset($aAucSubmit['auc_quantity_type']) || (isset($aAucSubmit['auc_quantity_type']) && $aAucSubmit['auc_quantity_type'] == 1)): echo 'none'; endif; ?>;" id="quantity_field_container">
                         <input type="text" name="auc[auc_quantity]" size="5" id="quantity_field" 
                         value="<?php if(isset($aAucSubmit['auc_quantity'])): echo $aAucSubmit['auc_quantity']; else: echo '0'; endif; ?>" /> 
                         <?php echo $aLangPhrases['field_quantity_howmany']; ?>
                         </div>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?>
                	<?php if($aUser['aSubmit']['plans_submit_quantity_mode'] == 2): ?>
                		
                        <div class="<?php echo $aSiteCss['table']; ?>">
                            <div class="<?php echo $aSiteCss['table_left']; ?>">
                                {*<span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_quantity']; ?>:*}
                            </div>
                            <div class="<?php echo $aSiteCss['table_right']; ?>">
                            
                            <input type="checkbox" name="auc[auc_quantity_multiple]" value="1" 
                        	<?php if($bFormPosted != true || (isset($aAucSubmit['auc_quantity_multiple']) && $aAucSubmit['auc_quantity_multiple'] == 1)): echo 'checked'; endif; ?> 
                        	/> <?php echo $aLangPhrases['field_quantity_multiple']; ?>
                        
                            <input type="hidden" name="auc[auc_quantity_type]" value="1" />
                            <input type="hidden" name="auc[auc_quantity]" value="0" />
                            
                            </div>
                            <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                        </div>
                        
                	<?php else: ?>
                    	
                        <input type="hidden" name="auc[auc_quantity_type]" value="0" />
                        <input type="hidden" name="auc[auc_quantity]" value="1" />
                        <input type="hidden" name="auc[auc_quantity_multiple]" value="0" />
                        
                    <?php endif; ?>
                <?php endif; ?>
                
        		
                
                
                {literal}
                <script type="text/javascript">
					
					function changeCurrency(curr){ 
						
						
						if($('#currency-selector')){ $('#currency-selector').val(curr); }
						if($('#currency-selector')){ $('#currency-reserve').html(curr); }
						if($('#currency-selector')){ $('#currency-price').html(curr); }
						
					}
					
					function changeCurrencyFromStoreSelector(curr){ 
						
						if(curr != ''){
							if($('#currency-selector-container')){ $('#currency-selector-container').hide('fast'); }
							if($('#currency-selector')){ $('#currency-selector').val(curr); }
							if($('#currency-selector')){ $('#currency-reserve').html(curr); }
							if($('#currency-selector')){ $('#currency-price').html(curr); }
						}else{ 
							if($('#currency-selector-container')){ $('#currency-selector-container').show('fast'); }
						}
					}
				
                </script>
                {/literal}
                <?php if(isset($aCartCon['userstores_currency_can']) && $aCartCon['userstores_currency_can'] == 1): ?>
					<?php if(!isset($aStore['store_currency'])): ?>
                    <div id="currency-selector-container" style="display:;" class="<?php echo $aSiteCss['table']; ?>">
                        <div class="<?php echo $aSiteCss['table_left']; ?>">
                            <?php echo $aLangPhrases['field_currency']; ?>:
                        </div>
                        <div class="<?php echo $aSiteCss['table_right']; ?>">
                            
                            <select name="auc[auc_currency]" id="currency-selector" onchange="changeCurrency(this.value);">
                            <?php foreach($aCurrencies as $key => $aCurrency){l} ?>
                                <option value="<?php echo $aCurrency['currency_id']; ?>" <?php 
									if(isset($aAucSubmit['auc_currency']) && $aAucSubmit['auc_currency'] == $aCurrency['currency_id']): 
										echo 'selected'; 
									else: 
										if(!isset($aAucSubmit['auc_currency']) && $sDefCurrency == $aCurrency['currency_id']): echo 'selected'; endif; 	
									endif; ?> ><?php 
                                    echo $aCurrency['currency_id']; ?></option>
                            <?php {r} ?>
                            </select> 
                            
                        </div>
                        <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                    </div>
                    <?php else: ?>
                    <div id="currency-selector-container" style="display:none;" class="<?php echo $aSiteCss['table']; ?>">
                        <div class="<?php echo $aSiteCss['table_left']; ?>">
                            <?php echo $aLangPhrases['field_currency']; ?>:
                        </div>
                        <div class="<?php echo $aSiteCss['table_right']; ?>">
                            
                            <select name="auc[auc_currency]" id="currency-selector" onchange="changeCurrency(this.value);">
                            <?php foreach($aCurrencies as $key => $aCurrency){l} ?>
                                <option value="<?php echo $aCurrency['currency_id']; ?>" <?php 
									if($aStore['store_currency'] == $aCurrency['currency_id']): 
										echo 'selected'; 
									endif; ?> ><?php 
                                    echo $aCurrency['currency_id']; ?></option>
                            <?php {r} ?>
                            </select> 
                            
                        </div>
                        <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                    </div>
                    <?php endif; ?>
                <?php else: ?>
                        <input type="hidden" name="auc[auc_currency]" id="currency-selector" value="<?php echo $sDefCurrency; ?>" />
                <?php endif; ?>
                
                
                
                
                
                <?php if($aUser['aSubmit']['plans_submit_types_mode'] == 0 || $aUser['aSubmit']['plans_submit_types_mode'] == 1): ?>
                <div class="<?php echo $aSiteCss['table']; ?>" id="reserve_container" 
                style="display:<?php if(isset($aAucSubmit['auc_type']) && $aAucSubmit['auc_type'] == 2): echo 'none'; endif; ?>;">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_price_reserve']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="7" name="auc[auc_reserve]" 
                         id="auc_reserve" <?php if($aUser['aSubmit']['plans_submit_types_mode'] == 0): ?>onblur="ifBidHigherThanBuyNow();"<?php endif; ?> 
                         value="<?php if(isset($aAucSubmit['auc_reserve'])): echo str_replace($aCon['money_thousand_char'],'',$aAucSubmit['auc_reserve']); endif; ?>" /> 
                         <span id="currency-reserve"><?php echo $sDefCurrency; ?></span>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <input type="hidden" name="auc[auc_reserve]" value="0.00" />
                <?php endif; ?>


                
                
{literal}
<script type="text/javascript">

	function ifBidHigherThanBuyNow() {
		
		if(1 * $('#auc_price').val() < 1 * $('#auc_reserve').val() && $('#auc_type_both').attr('checked') == true){
			
			$('#auc_price').val($('#auc_reserve').val());
			
		}
		
	}
</script> 
{/literal} 
               
                
                
                <?php if($aUser['aSubmit']['plans_submit_types_mode'] == 0 || $aUser['aSubmit']['plans_submit_types_mode'] == 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>" id="price_container" 
                style="display:<?php if(isset($aAucSubmit['auc_type']) && $aAucSubmit['auc_type'] == 1): echo 'none'; endif; ?>;">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_price']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="7" name="auc[auc_price]" 
                         id="auc_price" <?php if($aUser['aSubmit']['plans_submit_types_mode'] == 0): ?>onblur="ifBidHigherThanBuyNow();"<?php endif; ?> 
                         value="<?php if(isset($aAucSubmit['auc_price'])): echo str_replace($aCon['money_thousand_char'],'',$aAucSubmit['auc_price']); endif; ?>" /> 
                         <span id="currency-price"><?php echo $sDefCurrency; ?></span>
                         
                         <?php if($aUser['aSubmit']['plans_submit_msrp_mode'] == 1): ?>
                         <div id="discount-display" style="display:;margin-top:10px;">
                         <?php echo $aLangPhrases['sale_opt_field']; ?>:<br> 
                         <select name="auc[auc_msrp_type]">
                         	<option value="0"> - </option>
                            <option value="1" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 1): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_1_select']; ?></option>
                            <option value="2" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 2): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_2_select']; ?></option>
                            <option value="3" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 3): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_3_select']; ?></option>
                            <option value="4" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 4): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_4_select']; ?></option>
                            <option value="5" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 5): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_5_select']; ?></option>
                            <option value="6" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 6): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_6_select']; ?></option>
                            <option value="7" <?php if(isset($aAucSubmit['auc_msrp_type']) && $aAucSubmit['auc_msrp_type'] == 7): echo 'selected'; endif; ?> ><?php echo $aLangPhrases['sale_opt_7_select']; ?></option>
                         </select> 
                         
                         <input type="text" size="4" name="auc[auc_msrp_value]" 
                         value="<?php if(isset($aAucSubmit['auc_msrp_value'])): echo str_replace($aCon['money_thousand_char'],'',$aAucSubmit['auc_msrp_value']); else: echo '0.00'; endif; ?>" /> <?php echo $aLangPhrases['sale_opt_field_value']; ?>
                         
                         </div>
                         <?php else: ?>
                         <div id="discount-display" style="display:none;">
                         <input type="hidden" name="auc[auc_msrp_type]" value="0" />
                         <input type="hidden" name="auc[auc_msrp_value]" value="0.00" />
                         </div>
                         <?php endif; ?>
                         
                         
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <input type="hidden" name="auc[auc_price]" value="0.00" />
                <?php endif; ?>
                
                
                
                <?php if($aUser['aSubmit']['plans_submit_points_can'] != 1): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_points_can'] == 2): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?><?php echo $aLangPhrases['field_price_points']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="5" name="auc[auc_price_points]" 
                         value="<?php if(isset($aAucSubmit['auc_price_points'])): echo $aAucSubmit['auc_price_points']; else: echo '0'; endif; ?>" />
                    
                    <?php if($aUser['aSubmit']['plans_submit_points_can'] == 0): echo $aLangPhrases['field_price_points_ex']; endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <input type="hidden" name="auc[auc_price_points]" value="0" />
                <?php endif; ?>
                
                
                
                
                
        
                
        
                
                
                <?php if($aUser['aSubmit']['plans_submit_shipping_can'] != 1): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_shipping']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                        
                         <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.buttons.shipping', 
                                    'aParams'=>array(
                                            
                                            'aCon' => $aCon,
                                            'permission'=>$aUser['aSubmit']['plans_submit_shipping_can'],
                                            'data'=>$sShipSubmit,
                                            'edit'=>'no',
											'additional-rate'=>$aAucSubmit['auc_shipping_multiple_rate'],
                                            
                                            )
                                    
                                    )); 
                                
                        ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <input type="hidden" name="shipping[auc_shipping]" value="auc_shipping" />
                    <input type="hidden" name="auc[auc_shipping_multiple_rate]" value="100" />
                <?php endif; ?>
               
        
                <?php if($aUser['aSubmit']['plans_submit_weight_mode'] != 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>" 
                style="display:<?php  
                    $aData = unserialize($sShipSubmit); 
                    if(in_array('auc_shipping',$aData) || $bFormPosted == false): echo 'none'; 
                endif; ?>;" 
                id="shipping_weight_container">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_weight_mode'] == 0): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?><?php echo $aLangPhrases['field_weight']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="5" name="auc[auc_weight]" 
                         value="<?php if(isset($aAucSubmit['auc_weight'])): echo $aAucSubmit['auc_weight']; else: echo '0'; endif; ?>" /> 
                         
                         <select name="auc[auc_weight_type]">
                            <option value="0" <?php if(($aCon['default_weight_units'] == 0 && !isset($aAucSubmit['auc_weight_type'])) || 
                                        (isset($aAucSubmit['auc_weight_type']) && $aAucSubmit['auc_weight_type'] == 0)): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_weight_lbs']; ?></option>
                            <option value="1" <?php if(($aCon['default_weight_units'] == 1 && !isset($aAucSubmit['auc_weight_type'])) || 
                                        (isset($aAucSubmit['auc_weight_type']) && $aAucSubmit['auc_weight_type'] == 1)): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_weight_kgs']; ?></option>
                         </select>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <span style="display:;" id="shipping_weight_container"></span>
                    <input type="hidden" name="auc[auc_weight]" value="0" />
                    <input type="hidden" name="auc[auc_weight_type]" value="<?php echo $aCon['default_weight_units']; ?>" />
                <?php endif; ?>        
                
        
        
                
                
                <?php if($aUser['aSubmit']['plans_submit_points_can'] != 2 && $aUser['aSubmit']['plans_submit_tax_can'] != 1): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_taxable']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="radio" class="<?php echo $aSiteCss['text_line']; ?>" name="auc[auc_taxable]" 
                         value="0" <?php if(isset($aAucSubmit['auc_taxable']) && $aAucSubmit['auc_taxable'] == 0): echo 'checked'; endif; ?> /> <?php echo $aLangPhrases['button_no']; ?>
                         
                         <input type="radio" class="<?php echo $aSiteCss['text_line']; ?>" name="auc[auc_taxable]" 
                         value="1" <?php if(!isset($aAucSubmit['auc_taxable']) || (isset($aAucSubmit['auc_taxable']) && $aAucSubmit['auc_taxable'] == 1)): echo 'checked'; endif; ?> /> 
                         <?php echo $aLangPhrases['button_yes']; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <input type="hidden" name="auc[auc_taxable]" value="1" />
                <?php endif; ?>
                
                        
                <?php if($aUser['aSubmit']['plans_submit_auto_mode'] == 0): ?>
                <div class="<?php echo $aSiteCss['table']; ?>" style="display:none;">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_autoprocess']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="radio" class="<?php echo $aSiteCss['text_line']; ?>" name="auc[auc_auto]" 
                         value="0" <?php if(!isset($aAucSubmit['auc_auto']) || (isset($aAucSubmit['auc_auto']) && $aAucSubmit['auc_auto'] == 0)): echo 'checked'; endif; ?> /> <?php echo $aLangPhrases['button_no']; ?>
                         
                         <input type="radio" class="<?php echo $aSiteCss['text_line']; ?>" name="auc[auc_auto]" 
                         value="1" <?php if(isset($aAucSubmit['auc_auto']) && $aAucSubmit['auc_auto'] == 1): echo 'checked'; endif; ?> /> 
                         <?php echo $aLangPhrases['button_yes']; ?> 
                         | <?php echo $aLangPhrases['field_autoprocess_ex']; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                <?php else: ?> 
                    <?php if($aUser['aSubmit']['plans_submit_auto_mode'] == 1): ?>	
                        <input type="hidden" name="auc[auc_auto]" value="1" />
                    <?php else: ?> 
                        <input type="hidden" name="auc[auc_auto]" value="0" />
                    <?php endif; ?>
                <?php endif; ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        <span style="display:none;">
        Website Mode: <?php echo $aUser['aSubmit']['plans_submit_website_mode']; ?><br>
        0 = Required<br>
        1 = Not Required<br>
        2 = Required + Recip<br>
        3 = Off, Invis<br>
        4 = Off, Upgrade Prompt<br>
        5 = Not Required, reciprocation if used<br>
        </span>
        
            <?php if($aUser['aSubmit']['plans_submit_website_mode'] != 3): ?> 
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_website_mode'] == 0 || $aUser['aSubmit']['plans_submit_website_mode'] == 2): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?><?php echo $aLangPhrases['field_website']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_website_mode'] == 4): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                    <?php else: ?>
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc_info[auc_info_website]" 
                         value="<?php if(isset($aAucInfoSubmit['auc_info_website'])): echo $aAucInfoSubmit['auc_info_website']; ?><?php endif; ?>" />
                         <?php if($aUser['sIsAdmin'] == 'yes'): ?>
                            <div style="margin-top:8px;">
                            <?php echo $aLangPhrases['field_dwebsite']; ?> 
                            <i><?php echo $aLangPhrases['notice_admin_only_p']; ?></i>:<br>
                            <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc_info[auc_info_website_display]" 
                            value="<?php if(isset($aAucInfoSubmit['auc_info_website_display'])): echo $aAucInfoSubmit['auc_info_website_display']; ?><?php endif; ?>" /> 
                            </div>
                         <?php endif; ?>
                         
                         <?php if($aUser['aSubmit']['plans_submit_website_mode'] == 2 || $aUser['aSubmit']['plans_submit_website_mode'] == 5): ?>
                            <div style="margin-top:8px;margin-bottom:8px;">
                            <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php echo $aLangPhrases['field_recip']; ?>:
                                <div class="<?php echo $aSiteCss['extra_info']; ?>">
                                <?php echo $aLangPhrases['field_recip_info']; ?>
                                <br> -  
                                <a href="<?php echo $aCon['aff_get_link']; ?>" target="_banners"><?php echo $aLangPhrases['field_recip_banner']; ?></a>
                                </div>
                            <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc_info[auc_info_website_recip]" 
                            value="<?php if(isset($aAucInfoSubmit['auc_info_website_recip'])): echo $aAucInfoSubmit['auc_info_website_recip']; ?><?php endif; ?>" />
                            </div>
                         <?php endif; ?>
                         
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php endif; ?>
            
        
        
        <span style="display:none;">
        Customer Service Email Mode: <?php echo $aUser['aSubmit']['plans_submit_email_mode']; ?><br>
        0 = Required<br>
        1 = Not Required<br>
        2 = Off, Invis<br>
        3 = Off, Upgrade Prompt<br>
        </span>
        
            <?php if($aUser['aSubmit']['plans_submit_email_mode'] != 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_email_mode'] == 0): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?>
                        <?php echo $aLangPhrases['field_email_cs']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_email_mode'] == 3): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                    <?php else: ?>
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc_info[auc_info_email]" 
                         value="<?php if(isset($aAucInfoSubmit['auc_info_email'])): echo $aAucInfoSubmit['auc_info_email']; ?><?php endif; ?>" />
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php endif; ?>
        
        
        
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.inputs', 
                                    'aParams'=>array(
                                            
                                            'cat_type'=>'0',
                                            'cat_id'=>'0',
                                            'item_type'=>'0',
                                            'item_id'=>'0',
                                            'input_types'=>'all',
                                            'layout'=>'submit',
                                            'display_location' => 'all',
                                            'req'=>'all',
                                            'situation'=>'0',
                                            
                                            )
                                    
                                    )); 
                                
                        ?>
                        
                        
        
        
        
        
        
        <span style="display:none;">
        Slogan Mode: <?php echo $aUser['aSubmit']['plans_submit_descr_mode']; ?><br>
        0 = Required<br>
        1 = Not Required<br>
        2 = Off, Invis<br>
        3 = Off, Upgrade Prompt<br>
        </span>
        
            <?php if($aUser['aSubmit']['plans_submit_descr_mode'] != 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_descr_mode'] == 0): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?>
                        <?php echo $aLangPhrases['field_slogan']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_descr_mode'] == 3): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                    <?php else: ?>
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc[auc_descr]" 
                         value="<?php if(isset($aAucSubmit['auc_descr'])): echo $aAucSubmit['auc_descr']; ?><?php endif; ?>" />
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php endif; ?>
        
        
        
        <span style="display:none;">
        Bio Mode: <?php echo $aUser['aSubmit']['plans_submit_fulldescr_mode']; ?><br>
        0 = Required<br>
        1 = Not Required<br>
        2 = Off, Invis<br>
        3 = Off, Upgrade Prompt<br>
        </span>
        
            <?php if($aUser['aSubmit']['plans_submit_fulldescr_mode'] != 2): ?>
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php if($aUser['aSubmit']['plans_submit_fulldescr_mode'] == 0): ?>
                        <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span><?php endif; ?>
                        <?php echo $aLangPhrases['field_bio']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    <?php if($aUser['aSubmit']['plans_submit_fulldescr_mode'] == 3): ?>
                        <i><?php echo $aLangPhrases['notice_upgrade_req']; ?></i> 
                    <?php else: ?>
                         
                         <?php if($aCon['texteditor'] == 1): ?>
                         
                            
                            <div class="edit_menu_container w_95">
                                <div id="js_editor_menu_<?php echo $aCon['alias']; ?>_submit_bio" 
                                class="editor_menu"></div>
                                <script type="text/javascript">
                                    Editor.setId('<?php echo $aCon['alias']; ?>_submit_bio');
                                </script>
                                <div id="layer_<?php echo $aCon['alias']; ?>_submit_bio">
                                    <textarea name="auc_info[auc_info_fulldescr]" rows="" cols="" style="width:98%;" 
                                    id="<?php echo $aCon['alias']; ?>_submit_bio"><?php if(isset($aAucInfoSubmit['auc_info_fulldescr'])): echo $aAucInfoSubmit['auc_info_fulldescr']; ?><?php endif; ?></textarea>
                                </div>
                            </div>
                         
                         <?php else: ?>
                         
                         <![if IE]>		
                            <!--[if lt IE 8]>
                            <textarea name="auc_info[auc_info_fulldescr]" rows="2" cols="50" style="overflow:visible;" 
                            id="<?php echo $aCon['alias']; ?>_submit_bio"><?php if(isset($aAucInfoSubmit['auc_info_fulldescr'])): echo $aAucInfoSubmit['auc_info_fulldescr']; ?><?php endif; ?></textarea>
                            <![endif]-->
                            <!--[if gte IE 8]>
                            <textarea name="auc_info[auc_info_fulldescr]" rows="2" cols="50" style="overflow:hidden;" style="width:100%; height:30px;"  
                            onkeyup="abstractAutoTextboxRows(this);" 
                            id="<?php echo $aCon['alias']; ?>_submit_bio" ><?php if(isset($aAucInfoSubmit['auc_info_fulldescr'])): echo $aAucInfoSubmit['auc_info_fulldescr']; ?><?php endif; ?></textarea>
                            <![endif]-->
                        <![endif]-->
                        <![if !IE]>
                        <textarea name="auc_info[auc_info_fulldescr]" rows="2" cols="50" style="overflow:hidden;" style="width:100%; height:30px;"  
                        onkeyup="abstractAutoTextboxRows(this);" 
                        id="<?php echo $aCon['alias']; ?>_submit_bio" ><?php if(isset($aAucInfoSubmit['auc_info_fulldescr'])): echo $aAucInfoSubmit['auc_info_fulldescr']; ?><?php endif; ?></textarea>
                        <![endif]> 
                        
                        <?php endif; ?>
                    
                    <?php endif; ?>
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
            <?php endif; ?>
        
        
        
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php echo $aLangPhrases['field_tags']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                         <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" size="50" name="auc_info[auc_info_tags]" 
                         value="<?php if(isset($aAucInfoSubmit['auc_info_tags'])): echo $aAucInfoSubmit['auc_info_tags']; ?><?php endif; ?>" />
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>        
        
        
        
        
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.submit.locformadvanced', 
                                    'aParams'=>array()
                                    
                                    )); 
                                
                        ?>
                        
        
        
        
        
            <span style="display:<?php if($aUser['aSubmit']['plans_submit_checkout_options_can'] == 1): echo 'none'; endif; ?>;">
                <h3><?php echo $aLangPhrases['field_checkoutopts_header']; ?></h3>	
                <?php echo $aLangPhrases['field_checkoutopts_ex']; ?>
            
            {literal}
        
            <script type="text/javascript">
                
                function startAddCheckOutOption(){
                    
                    var checkout_options = $('.checkout_option');
                    var option_id = checkout_options.length + 1;
        
                    var html = '<div id="checkout_option_'+option_id+'_container" style="display:none;padding:4px;">';
                    html += '<table>';
                    html += '<tr>';
                    html += '<td style="vertical-align:top;">{/literal}<?php echo $aLangPhrases['field_checkoutopts_question']; ?>{literal}:<br>';
                    html += '<input type="text" class="checkout_option" name="checkout_options[name-'+option_id+']" value="" />';
                    html += '</td>';
                    html += '<td style="vertical-align:top;">{/literal}<?php echo $aLangPhrases['field_checkoutopts_type']; ?>{literal}:<br>';
                    html += '<select id="checkout_option_'+option_id+'_select" onchange="changeCheckOutOptionType('+option_id+');" name="checkout_options[type-'+option_id+']" style="width:100%;">'; 
                    html += '<option value="text">{/literal}<?php echo $aLangPhrases['field_checkoutopts_type_text']; ?>{literal}</option>';
                    html += '<option value="select">{/literal}<?php echo $aLangPhrases['field_checkoutopts_type_select']; ?>{literal}</option>';
                    html += '</select>';
                    html += '</td>';
                    html += '<td>';
                    html += '<span id="checkout_option_'+option_id+'_options_container" style="display:none;">';
                    html += '{/literal}<?php echo $aLangPhrases['field_checkoutopts_type_select_opts']; ?>{literal} / ';
                    html += '{/literal}<?php echo $aLangPhrases['field_checkoutopts_type_select_opts_price']; ?>{literal}:<br>';
                    html += '<span id="checkout_option_'+option_id+'_more_options_container" style="display:;">';
                    html += '<div style="padding-bottom:4px;">';
                    html += '<input type="text" class="checkout_option_option_'+option_id+'" name="checkout_options[options-'+option_id+'-1]" value="" /> ';
                    html += '<input type="text" name="checkout_options[price-'+option_id+'-1]" value="0.00" size="4" /> ';
                    html += '</div>';
                    html += '</span>';
                    html += '<a onclick="startAddCheckOutOptionOption('+option_id+');" style="cursor:pointer;">+ {/literal}<?php echo $aLangPhrases['field_checkoutopts_add_option']; ?>{literal}</a>';
                    html += '</span>';
                    html += '</td>';
                    html += '</tr>';
                    html += '</table>';
                    html += '</div>';
                    
                    
                    $('#checkout_options_container').append(html); 
                    $('#checkout_option_'+option_id+'_container').slideDown('fast');
                }
                
                function changeCheckOutOptionType(id){
                    
                    var type = document.getElementById('checkout_option_'+id+'_select').value;
                    if(type == 'text'){ 
                        $('#checkout_option_'+id+'_options_container').slideUp('fast');
                    }
                    if(type == 'select'){ 
                        $('#checkout_option_'+id+'_options_container').slideDown('fast');
                    }
                }
                
                function startAddCheckOutOptionOption(id){
                    
                    var checkout_options = $('.checkout_option_option_'+id);
                    var option_id = checkout_options.length + 1;
                    
                    var html = '<div id="checkout_option_'+id+'_newoption_'+option_id+'_container" style="padding-bottom:4px;display:none;">';
                    html += '<input type="text" class="checkout_option_option_'+id+'" name="checkout_options[options-'+id+'-'+option_id+']" value="" /> ';
                    html += '<input type="text" name="checkout_options[price-'+id+'-'+option_id+']" value="0.00" size="4" />';
                    html += '</div>';	
                    
                    $('#checkout_option_'+id+'_more_options_container').append(html); 
                    $('#checkout_option_'+id+'_newoption_'+option_id+'_container').slideDown('fast');
                }
                
            </script>
        
            {/literal}    
                
                
                <div id="checkout_options_container" style="display:;padding:8px;">
                
                <?php foreach($aCheckoutInputs as $key => $aCheckoutInput){left_curly} ?>
                
                    
                            <div id="checkout_option_<?php echo $key; ?>_container" style="display:;padding:4px;">
                            <table>
                            <tr>
                            <td style="vertical-align:top;"><?php echo $aLangPhrases['field_checkoutopts_question']; ?>:<br>
                            <input type="text" class="checkout_option" name="checkout_options[name-<?php echo $key; ?>]" 
                            value="<?php echo $aCheckoutInput['name']; ?>" />
                            </td>
                            <td style="vertical-align:top;"><?php echo $aLangPhrases['field_checkoutopts_type']; ?>:<br>
                            <select id="checkout_option_<?php echo $key; ?>_select" onchange="changeCheckOutOptionType(<?php echo $key; ?>);" name="checkout_options[type-<?php echo $key; ?>]" style="width:100%;"> 
                            <option value="text" <?php if($aCheckoutInput['type'] == 'text'): echo 'selected'; endif ?> 
                            ><?php echo $aLangPhrases['field_checkoutopts_type_text']; ?></option>
                            <option value="select" <?php if($aCheckoutInput['type'] == 'select'): echo 'selected'; endif ?> 
                            ><?php echo $aLangPhrases['field_checkoutopts_type_select']; ?></option>
                            </select>
                            </td>
                            <td>
                            <span id="checkout_option_<?php echo $key; ?>_options_container" 
                            style="display:<?php if($aCheckoutInput['type'] == 'text'): echo 'none'; endif ?>;">
                            <?php echo $aLangPhrases['field_checkoutopts_type_select_opts']; ?> / 
                            <?php echo $aLangPhrases['field_checkoutopts_type_select_opts_price']; ?>:<br>
                            <span id="checkout_option_<?php echo $key; ?>_more_options_container" style="display:;">
                            
                                <?php foreach($aCheckoutInput['aOptions'] as $key2 => $aCheckoutInputOption){left_curly} ?>
                                    <div style="padding-bottom:4px;">
                                    <input type="text" class="checkout_option_option_<?php echo $key; ?>" 
                                    name="checkout_options[options-<?php echo $key; ?>-<?php echo $key2; ?>]" 
                                    value="<?php echo $aCheckoutInputOption['name']; ?>" /> 
                                    <input type="text" name="checkout_options[price-<?php echo $key; ?>-<?php echo $key2; ?>]" 
                                    value="<?php echo $aCheckoutInputOption['price']; ?>" size="4" /> 
                                    </div>
                                <?php {right_curly} ?>
                                
                            </span>
                            <a onclick="startAddCheckOutOptionOption(<?php echo $key; ?>);" style="cursor:pointer;">+ <?php echo $aLangPhrases['field_checkoutopts_add_option']; ?></a>
                            </span>
                            </td>
                            </tr>
                            </table>
                            </div>
                
                <?php {right_curly} ?>
                
                </div>
                
                <div style="padding:4px;">
                    <a onclick="startAddCheckOutOption();" style="cursor:pointer;">+ <?php echo $aLangPhrases['field_checkoutopts_add_question']; ?></a>
                </div>
                
             
            
            </span>
        
        

                 
<?php 

if( 

$aUser['aSubmit']['plans_submit_descr_fee'] + 
$aUser['aSubmit']['plans_submit_photo_fee'] + 
$aUser['aSubmit']['plans_submit_stats_fee'] +
$aUser['aSubmit']['plans_submit_bold_fee'] + 
$aUser['aSubmit']['plans_submit_highlight_fee'] + 
$aUser['aSubmit']['plans_submit_italic_fee'] 
> 0 
): 
?>
        
        <h3><?php echo $aLangPhrases['field_upgrade_header']; ?></h3>       
        
<?php endif; ?>        		
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    	
                        <?php if($aUser['aSubmit']['plans_submit_featured_fee'] > 0): ?>
                             <input type="checkbox" name="auc[auc_upgrade_featured]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_featured']) && $aAucSubmit['auc_upgrade_featured'] == 1): echo 'checked'; endif; ?> />
                             <?php echo $aLangPhrases['field_upgrade_featured']; ?> 
                             <br>
                         <?php else: ?>
                         	
                            {* 0 = Off *}
                         	<input type="hidden" name="auc[plans_submit_featured_fee]" value="0" />
                            
                         <?php endif; ?>
                         
                         <?php if($aUser['aSubmit']['plans_submit_descr_fee'] > 0): ?>
                             <input type="checkbox" name="auc[auc_upgrade_descr]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_descr']) && $aAucSubmit['auc_upgrade_descr'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_descr']; ?> 
                             <br>
                         <?php else: ?>
                         
                         	<input type="hidden" name="auc[auc_upgrade_descr]" value="1" />
                            
                         <?php endif; ?>
                         
                         <?php if($aUser['aSubmit']['plans_submit_photo_fee'] > 0): ?>
                             <input type="checkbox" name="auc[auc_upgrade_photo_main]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_photo_main']) 
                                && $aAucSubmit['auc_upgrade_photo_main'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_photo_main']; ?>
                             <br>
                         <?php else: ?>
                         
                         	<input type="hidden" name="auc[auc_upgrade_photo_main]" value="1" />
                            
                         <?php endif; ?>
                         
                         <?php if($aUser['aSubmit']['plans_submit_stats_fee'] > 0): ?>
                             <input type="checkbox" name="auc[auc_upgrade_stats]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_stats']) && $aAucSubmit['auc_upgrade_stats'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_stats']; ?>
                             <br>
                         <?php else: ?>
                         
                         	<input type="hidden" name="auc[auc_upgrade_stats]" value="1" />
                            
                         <?php endif; ?>
                         
                         <?php if($aUser['aSubmit']['plans_submit_bold_fee'] > 0): ?>
                             <input type="checkbox" name="auc[auc_upgrade_bold]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_bold']) && $aAucSubmit['auc_upgrade_bold'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_bold']; ?>
                             <br>
                         <?php else: ?>
                         	{* 0 = Off *}
                         	<input type="hidden" name="auc[auc_upgrade_bold]" value="0" />   
                         <?php endif; ?>
                          
                         
                         <?php if($aUser['aSubmit']['plans_submit_highlight_fee'] > 0): ?>   
                             <input type="checkbox" name="auc[auc_upgrade_highlight]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_highlight']) && $aAucSubmit['auc_upgrade_highlight'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_highlight']; ?>
                             <br>
                        <?php else: ?>
                        	{* 0 = Off *}
                         	<input type="hidden" name="auc[auc_upgrade_highlight]" value="0" />   
                         <?php endif; ?>
                        
                        <?php if($aUser['aSubmit']['plans_submit_italic_fee'] > 0): ?>     
                             <input type="checkbox" name="auc[auc_upgrade_italic]" value="1" 
                             <?php if(isset($aAucSubmit['auc_upgrade_italic']) && $aAucSubmit['auc_upgrade_italic'] == 1): echo 'checked'; endif; ?> /> 
                             <?php echo $aLangPhrases['field_upgrade_italic']; ?>
                             <br>
                         <?php else: ?>
                         	{* 0 = Off *}
                         	<input type="hidden" name="auc[auc_upgrade_italic]" value="0" />   
                         <?php endif; ?> 
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>
                




        
        
            
            <span style="display:<?php if($aUser['sIsAdmin'] == 'yes' && $aModule['module'] == ''): echo 'none'; else: echo 'none'; endif; ?>;">
                <h3><?php echo $aLangPhrases['field_auction_php_code_header']; ?></h3>	
                       
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php echo $aLangPhrases['field_auction_php_code']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    
                        <a style="cursor:pointer;display:;" id="auc_php_code_buy_link_1"  
                            onclick="$('#auc_php_code_buy_container').slideToggle('fast');
                                $('#auc_php_code_buy_link_1').hide();
                                $('#auc_php_code_buy_link_2').show();
                                editAreaLoader.init({literal}{{/literal}
                                    id: 'auc_php_code_buy'	
                                    ,start_highlight: true
                                    ,allow_resize: 'both'
                                    ,allow_toggle: false
                                    ,word_wrap: false
                                    ,language: 'en'
                                    ,syntax: 'php'
                                {literal}}{/literal});
                                return false;" 
                        ><u><?php echo $aLangPhrases['button_edit']; ?></u></a> 
                        <a style="cursor:pointer;display:none;" id="auc_php_code_buy_link_2" 
                        onclick="$('#auc_php_code_buy_container').slideToggle('fast');return false;" 
                        ><u><?php echo $aLangPhrases['button_edit']; ?></u></a>
                        
                        
                        <div id="auc_php_code_buy_container" style="display:none;">
                        <?php echo $aLangPhrases['field_auction_php_code_ex']; ?>:<br>
                        <textarea name="auc[auc_php_code_buy]" rows="10" cols="50" id="auc_php_code_buy" ><?php 
                            if(isset($aAucSubmit['auc_php_code_buy'])): echo $aAucSubmit['auc_php_code_buy']; endif; ?></textarea>
                        </div>
                    
                         
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>    
                
                <div class="<?php echo $aSiteCss['table']; ?>">
                    <div class="<?php echo $aSiteCss['table_left']; ?>">
                        <?php echo $aLangPhrases['field_auction_php_code_ref']; ?>:
                    </div>
                    <div class="<?php echo $aSiteCss['table_right']; ?>">
                    
                        <a style="cursor:pointer;display:;" id="auc_php_code_cancel_link_1" 
                            onclick="$('#auc_php_code_cancel_container').slideToggle('fast');
                                $('#auc_php_code_cancel_link_1').hide();
                                $('#auc_php_code_cancel_link_2').show();
                                editAreaLoader.init({literal}{{/literal}
                                    id: 'auc_php_code_cancel'	
                                    ,start_highlight: true
                                    ,allow_resize: 'both'
                                    ,allow_toggle: false
                                    ,word_wrap: false
                                    ,language: 'en'
                                    ,syntax: 'php'
                                {literal}}{/literal});
                                return false;"><u><?php echo $aLangPhrases['button_edit']; ?></u></a> 
                        <a style="cursor:pointer;display:none;" id="auc_php_code_cancel_link_2" 
                        onclick="$('#auc_php_code_cancel_container').slideToggle('fast');return false;" 
                        ><u><?php echo $aLangPhrases['button_edit']; ?></u></a>
                       
                    
                        <div id="auc_php_code_cancel_container" style="display:none;">
                        <?php echo $aLangPhrases['field_auction_php_code_ref_ex']; ?>:<br>
                        <textarea name="auc[auc_php_code_cancel]" rows="10" cols="50" id="auc_php_code_cancel" ><?php 
                            if(isset($aAucSubmit['auc_php_code_cancel'])): echo $aAucSubmit['auc_php_code_cancel']; endif; ?></textarea>	
                        </div>
                         
                    </div>
                    <div class="<?php echo $aSiteCss['clear']; ?>"></div>
                </div>    
        
                
            </span>    
            
        
        
        
                        
                        
                        <?php $oServAbsBrMod->loadModule(array(
                    
                                    'sModule'=>$aCon['alias'].'.utility.adminseo', 
                                    'aParams'=>array('type'=>0,'id'=>0)
                                    
                                    )); 
                                
                        ?>
        
                
                        <div class="<?php echo $aSiteCss['table_clear']; ?>">
                            <input type="hidden" name="<?php echo $aCon['alias']; ?>_form_posted" value="new_auction"  />
                            <input type="submit" class="<?php echo $aSiteCss['button']; ?>" value="<?php echo $aLangPhrases['button_submit']; ?>" 
                            onclick="document.getElementById('<?php echo $aCon['alias']; ?>_form_container').style.display='none';
                                     document.getElementById('<?php echo $aCon['alias']; ?>_loading').style.display='';" 
                            />
                            <br><br>
                            <span class="<?php echo $aSiteCss['required']; ?>"><?php echo $aLangPhrases['button_req']; ?></span> 
                            <?php echo $aLangPhrases['button_req_field']; ?>
                        </div>
                        
        </form>     
        </div>
        
                            <div id="<?php echo $aCon['alias']; ?>_loading" style="display:none;text-align:center;padding:50px;">
                            <?php $oServAbsBrMod->loadModule(array(
                                'sModule'=>'abstractbridge.image.image', 
                                'aParams'=>array('type'=>'module','type_id'=>'abstractbridge','file'=>'img_ajax_large','style'=>'vertical-align:middle;')
                                )); 
                            
                            ?>
                            </div>   
                            
<?php endif; ?>
<?php endif; ?>
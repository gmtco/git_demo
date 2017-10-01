<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aProdFormTpl')));
	foreach($aTplVars['aProdFormTpl'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>


<form method="post" action="<?php echo $aUrls['sSearchProductsUrl']; ?>" enctype="multipart/form-data">
<div style="display:none;">{token}</div>

			<div class="<?php echo $aSiteCss['p_top_4']; ?>">
				
                
            	<?php $oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.catselectsearch', 
							'aParams'=>array(
									
									'aCon'=>$aCon,
									'custom_input_ajax'=>'no', 
									'form_id'=>'formprod',
									'cat_type'=>'0', 
									
									
									)
							
							)); 
						
				?>
               

				 
				<div class="<?php echo $aSiteCss['p_top_4']; ?>">
                     <?php echo $aLangPhrases['common_keyword']; ?>:
                    <div class="<?php echo $aSiteCss['p_4']; ?>">
                        <input type="text" class="form-control" name="search[keyword]" 
                        style="width:90%;" 
                        id="<?php echo $aCon['alias']; ?>_search_formprod_keyword" 
                        value="<?php echo $aSearch['keyword']; ?>" {*size="30"*} />
                    </div>
                </div>
                
                <div class="<?php echo $aSiteCss['p_top_4']; ?>">
                     <?php echo $aLangPhrases['field_search_order']; ?>:
                    <div class="<?php echo $aSiteCss['p_4']; ?>">
                        
                        <select class="form-control" name="search[order]" id="<?php echo $aCon['alias']; ?>_search_formprod_order">
                        
                        	<option value="new" <?php if($aSearch['order'] == 'new' || $aSearch['order'] == ''): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_new']; ?></option>
                                
                            <option value="pricelow" <?php if($aSearch['order'] == 'pricelow'): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_price_lowtohigh']; ?></option>
                            
                            <option value="pricehigh" <?php if($aSearch['order'] == 'pricehigh'): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_price_hightolow']; ?></option>
                            
                            <option value="bestselling" <?php if($aSearch['order'] == 'bestselling'): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_bestselling']; ?></option>
                            
                            <option value="rating" <?php if($aSearch['order'] == 'rating'): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_rating']; ?></option>
                            
                            <option value="alpha" <?php if($aSearch['order'] == 'alpha'): echo 'selected'; endif; ?> 
                            ><?php echo $aLangPhrases['field_search_order_alpha']; ?></option>
                            
                            
                        </select>
                    </div>
                </div>
                
                
                
                <div style="display:<?php if($aCon['search_form_hide_locs'] == 1): echo 'none'; endif; ?>;">
					 
                      
                     
                     
                     
					 <div class="<?php echo $aSiteCss['p_top_4']; ?>" 
                     style="display:<?php if($aCon['search_form_hide_locs'] == 2 || $aCon['search_form_hide_locs'] == 3): echo 'none'; endif; ?>;">
                     <?php 	if($aCon['search_form_hide_locs'] == 4): 
					 			echo $aLangPhrases['common_state']; 
							else: 
								echo $aLangPhrases['common_country']; 
							endif; ?>:
                     <div class="<?php echo $aSiteCss['p_4']; ?>">
					 <?php $oServAbsBrMod->loadModule(array(
                
                                'sModule'=>$aCon['alias'].'.utility.countryselectsearch', 
                                'aParams'=>array( 
                                		
										'aCon'=>$aCon,
                                        'layout'=>'below',
                                        'country_id'=>$aSearch['country'],
                                        'state_id'=>$aSearch['state'], 
										'form_id'=>'formprod',
                                        
                                        )
                                
                                )); 
                            
                    ?> 
                    </div>
                    </div>
                
                	<div class="<?php echo $aSiteCss['p_top_4']; ?>" 
                    style="display:<?php if($aCon['search_form_hide_locs'] == 2 || $aCon['search_form_hide_locs'] == 6 
											 || $aCon['search_form_hide_locs'] == 8): echo 'none'; endif; ?>;">
                    <?php echo $aLangPhrases['common_city']; ?>:
                    <div class="<?php echo $aSiteCss['p_4']; ?>">
                	<input type="text" class="<?php echo $aSiteCss['text_line']; ?>" name="loc[city]" 
                    id="<?php echo $aCon['alias']; ?>_search_formprod_city" 
                    value="<?php echo $aSearch['city']; ?>" size="30" />
                    </div>
                    </div>
                    
                    <div class="<?php echo $aSiteCss['p_top_4']; ?>" 
                    style="display:<?php if($aCon['search_form_hide_locs'] == 7 || $aCon['search_form_hide_locs'] == 8): echo 'none'; endif; ?>;">
                    <?php echo $aLangPhrases['common_zip']; ?>:
                    <div class="<?php echo $aSiteCss['p_4']; ?>">
                    <input type="text" class="<?php echo $aSiteCss['text_line']; ?>" name="loc[zip]" 
                    id="<?php echo $aCon['alias']; ?>_search_formprod_zip" 
                    value="<?php echo $aSearch['zip']; ?>" size="30" />
                    </div>
                    </div>
                    
                    <div class="<?php echo $aSiteCss['p_top_4']; ?>" 
                     style="display:<?php if($aCon['search_open_now_display'] != 1): ?>none<?php endif; ?>;padding-bottom:8px;">
                         <input type="checkbox" name="loc[open]" value="1" 
                         id="<?php echo $aCon['alias']; ?>_search_formprod_open" 
                         <?php if(isset($aSearch['open']) && $aSearch['open'] == 1): echo 'checked'; endif; ?> 
                         /> <?php echo $aLangPhrases['field_open_now']; ?> 
                    </div>
                      
                </div>
                
			</div>



                <div class="<?php echo $aSiteCss['clear']; ?>">
					<input type="hidden" name="<?php echo $aCon['alias']; ?>_form_posted" value="search_product"  />
					<input type="submit" class="btn btn-default btn-block" value="<?php echo $aLangPhrases['button_search']; ?>" />
                </div>
</form>
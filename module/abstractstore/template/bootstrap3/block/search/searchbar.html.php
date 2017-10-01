<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplStoreSearchBar')));
	foreach($aTplVars['aTplStoreSearchBar'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

{literal}
<style>
	#left{}
	#nb_name_abstract{margin-top:50px;}
</style>
{/literal}

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
	
	$("#{/literal}<?php echo $aCon['alias']; ?>{literal}_custom_input_subsearch_response").html(''); 
	$(".{/literal}<?php echo $aCon['alias']; ?>{literal}_search_form_sub_select").val(sValue); 
	
	abstractJQueryAjaxA(
			'{/literal}<?php echo $aSite['path']; ?>{literal}',  
			'module=block:::{/literal}<?php echo $aCon['alias']; ?>{literal}.utility.inputssearch&cat_type=2&cat_id='+sValue+'&item_type=0&item_id=0&input_types=all&layout=submit&display_location=all&req=all',
			'{/literal}<?php echo $aCon['alias']; ?>{literal}_custom_input_subsearch_response', 
			'html',
			'', 
			''
	);
}


</script>
{/literal}
                        
<div class="col-xs-12" id="mac-store-filters-wrap">

<form method="post" action="<?php echo $aUrls['sSearchProductsUrl']; ?>" class="form-inline mac-fix-hidden-field" role="form">
<span style="display:none;">{token}</span>

		<div class="form-group">
		    <?php 
	            $oServAbsBrMod->loadModule(array(
	                'sModule'=>$aCon['alias'].'.utility.catselectsearch', 
	                'aParams'=>array(
	                        'aCon'=>$aCon,
	                        'custom_input_ajax'=>'no', 
	                        'form_id'=>'formprod',
	                        'cat_type'=>'0', 
	                        'hidesubs'=>'no',
	                        )
	                )); 
		    ?>

			<div id="absstoreadvancedsearch" style="display:<?php if(!isset($aSearch['absstore_advanced']) || $aSearch['absstore_advanced'] == 0): echo 'none'; endif; ?>;">

	            <?php $oServAbsBrMod->loadModule(array(
				
								'sModule'=>$aCon['alias'].'.utility.inputssearch', 
								'aParams'=>array(
										
										'cat_type'=>'0',
										'cat_id'=>'0',
										'item_type'=>'0',
										'item_id'=>0,
										'input_types'=>'all',
										'layout'=>'submit',
										'display_location' => 'all',
										'req'=>'all',
										
										)
								
								)); 
							
					?>
				
				<span id="<?php echo $aCon['alias']; ?>_custom_input_catsearch_response" style="display:;">
                <?php if(isset($aSearch['category']) && is_numeric($aSearch['category']) && $aSearch['category'] > 0): 
					
					$oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.inputssearch', 
							'aParams'=>array(
									
									'cat_type'=>'1',
									'cat_id'=>$aSearch['category'],
									'item_type'=>'0',
									'item_id'=>0,
									'input_types'=>'all',
									'layout'=>'submit',
									'display_location' => 'all',
									'req'=>'all',
									
									)
							
							)); 
					endif; 
				?>
                </span>
                <span id="<?php echo $aCon['alias']; ?>_custom_input_subsearch_response" style="display:;">
				<?php if(isset($aSearch['subcategory']) && is_numeric($aSearch['subcategory']) && $aSearch['subcategory'] > 0): 
				
					$oServAbsBrMod->loadModule(array(
			
							'sModule'=>$aCon['alias'].'.utility.inputssearch', 
							'aParams'=>array(
									
									'cat_type'=>'2',
									'cat_id'=>$aSearch['subcategory'],
									'item_type'=>'0',
									'item_id'=>0,
									'input_types'=>'all',
									'layout'=>'submit',
									'display_location' => 'all',
									'req'=>'all',
									
									)
							
							)); 
					endif; 
				?>
                </span>        
       	 	</div>


    	</div>

		<div class="form-group">    

	         {*<?php echo $aLangPhrases['common_keyword']; ?>:*}
			<input placeholder="<?php echo $aLangPhrases['common_keyword']; ?>" type="text" class="hidden-xs form-control <?php echo $aSiteCss['text_line']; ?>" name="search[keyword]" 
			id="<?php echo $aCon['alias']; ?>_search_formprod_keyword" 
			value="<?php echo $aSearch['keyword']; ?>" size="<?php echo $aCon['searchbar_keywordsize']; ?>" />
    	</div> 

		<div class="form-group"> 
			{*<?php echo $aLangPhrases['field_search_order']; ?>:*}
                            
                                    
            <select class="hidden-xs form-control" name="search[order]" id="<?php echo $aCon['alias']; ?>_search_formprod_order">
            
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

		<div class="form-group"> 

        	<span class="hidden-xs" style="<?php if($aCon['search_free_option'] == 1): ?>display:none;<?php endif; ?>">
            
                <label>
                	<input type="checkbox" name="search[free]" value="1" 
				<?php if($aSearch['free'] == 1): echo 'checked'; endif; ?> />
				<?php echo $aLangPhrases['common_free']; ?> 
				</label>           
                               
            </span>
           
            <input type="hidden" name="<?php echo $aCon['alias']; ?>_form_posted" value="search_product"  />
            <input type="submit" class="<?php echo $aSiteCss['button']; ?>" 
            value="<?php echo $aLangPhrases['button_search']; ?>" class="btn btn-primary"/> 
                                
              {literal}
			  <script type="text/javascript">
			  	
				function absstoreToggleAdvSearch(){ 
					
					var iAdvToggle = $('#absstore_advanced').val();
					if(iAdvToggle == 0){ 
						
						$('#absstoreadvancedsearch').slideDown();
						$('#absstore_advanced').val('1');
						
					}else{ 
						
						$('#absstoreadvancedsearch').slideUp();
						$('#absstore_advanced').val('0');
					}
				}
				
			  </script>
              {/literal}

              <span id="absstoreadvbutton" style="display:none;">
              &nbsp;<a style="cursor:pointer;" onclick="absstoreToggleAdvSearch();"><?php echo $aLangPhrases['field_search_advanced']; ?></a>&nbsp;
              </span>

              <input type="hidden" name="search[absstore_advanced]" id="absstore_advanced" 
              value="<?php if(isset($aSearch['absstore_advanced'])): echo $aSearch['absstore_advanced']; else: echo '0'; endif; ?>"  />              

    	</div> 
		
		<div class="form-group">    
			<?php 
				$oServAbsBrMod->loadModule(array(
					'sModule'=>'abstractcart.checkoutsmall', 
					'aParams'=>array()
				)); 
			?>
		</div>

</form>

</div>
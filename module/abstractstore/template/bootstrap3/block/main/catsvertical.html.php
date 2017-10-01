<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplMainCatVertBlock')));
	foreach($aTplVars['aTplMainCatVertBlock'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

<?php $aSiteCss['li_active'] = 'category active'; $aSiteCss['li_nonactive'] = 'category';?>

<?php if($aCatsSubmit['cat1'] == 0 || (isset($aCatSingle['aSubs']) && count($aCatSingle['aSubs']) == 0) || $aCon['subcats_req'] == "2"): ?>

<div>
	<?php if(!count($aCats)): echo '<div style="padding:8px;">'.$aLangPhrases['common_nfound'].'</div>'; else: ?>
        	
            <div class="sub_section_menu">
			<ul class="list-group" style="word-wrap:break-word;">
            
            <?php $i=0; foreach($aCats as $key => $aCat){left_curly} ?> 
            
                    <a href="<?php echo $aCat['sCatUrl-Prod']; ?>" class="list-group-item<?php if($aCatsSubmit['cat1'] == $aCat['cat_id']): echo ' active';endif; ?>"><?php echo $aCat['cat_text']; 
						
							if($aCon['cats_count'] == 1 && isset($aCat['iCatCount']) && $aCat['iCatCount'] > 0): 
							
								echo '&nbsp;('.$aCat['iCatCount'].')';
							
							endif;
						
						?>&nbsp;&#9656;</a>
                 
            <?php {right_curly} ?>
        	
            </ul>
            </div>
            
    <?php endif; ?>
</div>

<?php else: ?>


                    
                    
                    
                    		<div class="sub_section_menu" style="margin-top:0px;margin-bottom:0px;">
                            <ul class="action" style="padding:6px;padding-right:0px;word-wrap:break-word;">
                    
                            	<li style="font-size:12pt;" class="<?php echo $aSiteCss['li_nonactive']; ?>">
                                    <a href="<?php echo $aCatSingle['sCatUrl-Prod']; ?>" style="padding:1px;">&#9662; <?php echo $aCatSingle['cat_text']; 
						
										if($aCon['cats_count'] == 1 && isset($aCatSingle['iCatCount']) && $aCatSingle['iCatCount'] > 0): 
										
											echo '&nbsp;('.$aCatSingle['iCatCount'].')';
										
										endif;
									
									?></a>
                                </li>
                                
                            <?php foreach($aCatSingle['aSubs'] as $aSub){left_curly} ?>  
                               
                              <li style="{*padding:6px;*}" class="<?php 
								if(isset($aCatsSubmit['subcat1']) && $aCatsSubmit['subcat1'] != '' && $aCatsSubmit['subcat1'] != 0 
										&& ($aCatsSubmit['subcat1'] == $aSub['sub_url_name'] || $aCatsSubmit['subcat1'] == $aSub['sub_id'])): 
                                    echo $aSiteCss['li_active']; else: echo $aSiteCss['li_nonactive']; endif; ?>">
                                    <a href="<?php echo $aSub['sSubUrl-Prod']; ?>" style="padding:1px;"><?php 
									
									echo $aSub['sub_text']; 
									
									if($aCon['subs_count'] == 1 && isset($aSub['iSubCount']) && $aSub['iSubCount'] > 0): 
							
										echo '&nbsp;('.$aSub['iSubCount'].')';
									
									endif;
									
									?>&nbsp;&#9656;</a>
                                </li>  
                                
                            <?php {right_curly} ?>
                            
                            </ul>
                            </div>

<?php endif; ?>
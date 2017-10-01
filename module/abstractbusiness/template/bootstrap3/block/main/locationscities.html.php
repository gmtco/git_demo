<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplMainLocationsCitiesBlock')));
	foreach($aTplVars['aTplMainLocationsCitiesBlock'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>


<div {*class="<?php echo $aSiteCss['bordered_div']; ?>"*}>
	<?php if(!count($aCountries)): echo '<div style="padding:8px;">'.$aLangPhrases['common_nfound'].'</div>'; else: ?>
        
        <?php foreach($aCountries as $key => $aCountry){left_curly} ?> 
            
        	<h3><a href="<?php echo $aCountry['sCountryUrl-Bus']; ?>"><b><?php echo $aCountry['country_name']; 
						
							if($aCon['cats_count'] == 1 && isset($aCountry['iCountryCount'])): 
							
								echo '&nbsp;('.$aCountry['iCountryCount'].')';
							
							endif;
						
						?></b> &#9656;</a>
				</h3>     
  
<div class="<?php echo $aSiteCss['extra_info']; ?>"><?php if(isset($aCountry['aCities']) && count($aCountry['aCities']) > 0): ?><?php foreach($aCountry['aCities'] as $aCity){left_curly} ?><a href="<?php echo $aCity['sCityUrl-Bus']; ?>"><?php echo $aCity['city_name'];if($aCon['subs_count'] == 1 && isset($aCity['iCityCount'])):echo '&nbsp;('.$aCity['iCityCount'].')';endif;?>&nbsp;&#9656;</a>&nbsp;<?php {right_curly} ?><?php endif; ?></div>
                               
             
                    
    	<?php {right_curly} ?>
	<?php endif; ?>
</div>
<br>
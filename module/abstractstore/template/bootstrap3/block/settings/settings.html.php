<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplSettings')));
	foreach($aTplVars['aTplSettings'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>

<?php $iTableLeftWidth = '10%'; ?>

<?php if ($sBlockMessage != ''): ?><div class="<?php echo $aSiteCss['message']; ?>" ><?php echo $sBlockMessage; ?></div><?php endif; ?>

<form method="post" action="<?php echo $aUrls['sSettingsUrl']; ?>">
<div style="display:none;">{token}</div>

<?php if(isset($aUser['aAccess']['plans_access_id'])): ?>

	<h3><?php echo $aLangPhrases['setting_fav_header']; ?></h3>
    	
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_news]" 
                <?php if($aSettings['user_settings_email_fav_news'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_news']; ?>
        </td>
        </tr>
        </table>
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_pics]" 
                <?php if($aSettings['user_settings_email_fav_pics'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_pics']; ?>
        </td>
        </tr>
        </table>
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_docs]" 
                <?php if($aSettings['user_settings_email_fav_docs'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_docs']; ?>
        </td>
        </tr>
        </table>
        
        
        <table style="width:100%;display:none;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_locs]" 
                <?php if($aSettings['user_settings_email_fav_locs'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_locs']; ?>
        </td>
        </tr>
        </table>
        
        
        
        <table style="width:100%;display:none;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_events]" 
                <?php if($aSettings['user_settings_email_fav_events'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_events']; ?>
        </td>
        </tr>
        </table>
        
        <table style="width:100%;display:;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_videos]" 
                <?php if($aSettings['user_settings_email_fav_videos'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_videos']; ?>
        </td>
        </tr>
        </table>
        
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_fav_comm]" 
                <?php if($aSettings['user_settings_email_fav_comm'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_fav_email_comm']; ?>
        </td>
        </tr>
        </table>
        
        
       
<?php endif; ?>        
	
<?php if(isset($aUser['aSubmit']['plans_submit_id'])): ?>

    <h3><?php echo $aLangPhrases['setting_my_header']; ?></h3>
    	
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_my_comm]" 
                <?php if($aSettings['user_settings_email_my_comm'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_my_email_comm']; ?>
        </td>
        </tr>
        </table>
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_my_revs]" 
                <?php if($aSettings['user_settings_email_my_revs'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_my_email_revs']; ?>
        </td>
        </tr>
        </table>
        
        
        
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	<input type="checkbox" name="settings[user_settings_email_my_foll]" 
                <?php if($aSettings['user_settings_email_my_foll'] == 1): echo 'checked'; endif; ?> 
                value="1" class="<?php echo $aSiteCss['checkbox']; ?>" />
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<?php echo $aLangPhrases['setting_my_email_foll']; ?>
        </td>
        </tr>
        </table>
        
        
        
<?php endif; ?>

<?php if(isset($aUser['aAccess']['plans_access_id']) || isset($aUser['aSubmit']['plans_submit_id'])): ?>
		
        <table style="width:100%;"> 
        <tr>
        <td style="width:<?php echo $iTableLeftWidth; ?>;vertical-align:top;padding:4px;text-align:right;">
        	
        </td>
        <td style="width:70%;vertical-align:top;padding:4px;">
        	<input type="hidden" name="<?php echo $aCon['alias']; ?>_form_posted" value="settings"  />
                    <input type="hidden" name="settings[user_settings_user_id]" value="<?php echo $aSettings['user_settings_user_id']; ?>" />
					<input type="submit" class="<?php echo $aSiteCss['button']; ?>" value="<?php echo $aLangPhrases['button_update']; ?>" />
        </td>
        </tr>
        </table>
        
                
<?php else: ?> 
	<div class="<?php echo $aSiteCss['extra_info']; ?>" style="padding:10px;"><?php echo $aLangPhrases['notice_upgrade_req']; ?></div>
<?php endif; ?>

</form>


<br>
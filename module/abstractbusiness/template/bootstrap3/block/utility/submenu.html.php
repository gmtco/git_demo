<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplBusSubMenu')));
	foreach($aTplVars['aTplBusSubMenu'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>


<div class="panel panel-default">
	<div class="panel-heading">
		<h2 class="panel-title">Submenu</h2>
	</div>
	<ul class="list-group">
		<li class="{*active*} list-group-item"><a href="{url link='abstractbusiness.main'}"><?php echo Phpfox::getPhrase('abstractbusiness.submenu_main'); ?></a></li>
        <li class="{*active*} list-group-item"><a href="{url link='abstractbusiness.search'}"><?php echo Phpfox::getPhrase('abstractbusiness.submenu_search'); ?></a></li>
		<li class="list-group-item"><a href="{url link='abstractbusiness.following'}"><?php echo Phpfox::getPhrase('abstractbusiness.submenu_following'); ?></a></li>
		<li class="list-group-item"><a href="{url link='abstractbusiness.manage'}"><?php echo Phpfox::getPhrase('abstractbusiness.submenu_mybusinesses'); ?></a></li>
	</ul>
</div>
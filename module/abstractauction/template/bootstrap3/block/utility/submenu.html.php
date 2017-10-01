<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplAuctionSubMenu')));
	foreach($aTplVars['aTplAuctionSubMenu'] as $sKey => $mValue) 
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
		<li class="{*active*} list-group-item"><a href="{url link='abstractauction.main'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_main'); ?></a></li>
        
        <li class="{*active*} list-group-item"><a href="{url link='abstractauction.search'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_search'); ?></a></li>
		
        <li class="list-group-item"><a href="{url link='abstractauction.following'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_following'); ?></a></li>

        <li class="{*active*} list-group-item"><a href="{url link='abstractcart.search'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_stores'); ?></a></li>
        
        <?php if($aCon['submenu_coupons'] == 0): ?>
        <li class="list-group-item"><a href="{url link='abstractcart.coupons.search'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_coupons'); ?></a></li>
        <?php endif; ?>
        
        <?php if($aCon['submenu_packages'] == 0): ?>
        <li class="list-group-item"><a href="{url link='abstractcart.packages.search'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_packages'); ?></a></li>
        <?php endif; ?>
        
        <li class="list-group-item"><a href="{url link='abstractcart.invoices'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_invoices'); ?></a></li>
        
        <li class="list-group-item"><a href="{url link='abstractcart.purchases'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_purchases'); ?></a></li>
		
        <?php if($bCannotSell != true): ?>
        <li class="list-group-item"><a href="{url link='abstractauction.manage'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_myauctions'); ?></a></li>
        <li class="{*active*} list-group-item"><a href="{url link='abstractcart.search.my'}"><?php echo Phpfox::getPhrase('abstractauction.submenu_mystores'); ?></a></li>
        <?php endif; ?>
        
	</ul>
</div>
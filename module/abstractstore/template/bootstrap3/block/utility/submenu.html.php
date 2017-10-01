<?php 
	//Abstract Template Bridge
	$oServAbsBrTemplate = Phpfox::getService('abstractbridge.template');
	$aTplVars = $oServAbsBrTemplate->getTemplateVariables(array('aVars' => array('aTplStoreSubMenu')));
	foreach($aTplVars['aTplStoreSubMenu'] as $sKey => $mValue) 
	{left_curly}
		${left_curly}$sKey{right_curly} = $mValue; 
	{right_curly}
	//Load Module Class
	$oServAbsBrMod = Phpfox::getService('abstractbridge.module');
?>


<div class="list-group">

	<a href="{url link='abstractstore.main'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_main'); ?></a>
	<a href="{url link='abstractstore.search'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_search'); ?></a>
	<?php if($aCon['submenu_coupons'] == 0): ?>
	<a href="{url link='abstractcart.coupons'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_coupons'); ?></a>
	<?php endif; ?>
	<?php if($aCon['submenu_packages'] == 0): ?>
	<a href="{url link='abstractcart.packages'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_packages'); ?></a>
	<?php endif; ?>
	<?php if($aCon['submenu_testimonials'] == 0): ?>
	<a href="{url link='abstractcart.testimonials'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_testimonials'); ?></a>
	<?php endif; ?>
	
	<a href="{url link='abstractstore.following'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_following'); ?></a>
	
	<?php if($aCon['submenu_invoices_purchases'] == 0): ?>
	<a href="{url link='abstractcart.purchases'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_mypurchases'); ?></a>
	<a href="{url link='abstractcart.invoices'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_myinvoices'); ?></a>
	<?php endif; ?>
	
	<?php if($bCannotSell != true): ?>
	<a href="{url link='abstractstore.manage'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_myproducts'); ?></a>
	<a href="{url link='abstractstore.submit'}" class="{*active*} list-group-item"><?php echo Phpfox::getPhrase('abstractstore.submenu_addproducts'); ?></a>
	<?php endif; ?>

</div>
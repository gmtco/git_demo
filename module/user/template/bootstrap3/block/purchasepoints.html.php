<div id="js_purchase_points">
	<form method="post" action="#" class="form-inline">
		<label>{phrase var='user.how_many_points_would_you_like_to_purchase'}</label>
		<select class="form-control" name="purchase" onchange="$(this).ajaxCall('user.processPurchasePoints');">
			<option value="">{phrase var='user.select'}:</option>
			{foreach from=$aPurchasePoints item=iPurchasePoint}
			<option value="{$iPurchasePoint.id}">{$iPurchasePoint.cost}</option>
			{/foreach}
		</select>
	</form>
</div>
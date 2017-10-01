<li class="list-group-item">
	
		<div class="row">
		
			<div class="col-md-6 col-xs-6 col-lg-6">			
				<h4>{$aItem.phrase}</h4>
			</div>
		
			<div class="col-md-6 col-xs-6 col-lg-6">
				{module name='privacy.form' privacy_name='privacy' privacy_info='' privacy_array=$sPrivacy privacy_name=$sPrivacy privacy_custom_id='js_custom_privacy_input_holder_'$aItem.custom_id'' privacy_no_custom=true}	
			</div>
		
		</div>
		
	</li>
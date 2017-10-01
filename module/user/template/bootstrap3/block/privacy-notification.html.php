<li class="list-group-item">
	
		<div class="row">
		
			<div class="col-md-6 col-xs-6 col-lg-6 {$aNotification.phrase}">			
				<h4>{$aNotification.phrase}</h4>
			</div>
		
			<div class="col-md-3 col-xs-3 col-lg-3 {$aNotification.phrase}">
				<label>
				<input type="radio" value="0" name="val[notification][{$sNotification}]" {if $aNotification.default} checked="checked"{/if} class="checkbox" /> 
				{phrase var='user.yes'}
				</label>
			</div>
				
			<div class="col-md-3 col-xs-3 col-lg-3 {$aNotification.phrase}">
				<label>
				<input type="radio" value="1" name="val[notification][{$sNotification}]" {if !$aNotification.default} checked="checked"{/if} class="checkbox" /> 
				{phrase var='user.no'}
				</label>
			</div>
		
		</div>
		
	</li>
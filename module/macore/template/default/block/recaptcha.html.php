<div class="form-group">
	<div class="col-xs-12">
		<script src='https://www.google.com/recaptcha/api.js'></script>
		<div class="g-recaptcha" data-sitekey="{if $googleSiteKey = Phpfox::getParam('macore.google_recaptcha_site_key')}{$googleSiteKey}{/if}"></div>
	</div>
</div>
					
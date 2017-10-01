<div id="message_id_{$aMail.message_id}" class="row1 mail_thread_holder{if (!PHPFOX_IS_AJAX && $phpfox.iteration.messages == count($aMessages)) || (PHPFOX_IS_AJAX && isset($bIsLastMessage) && $bIsLastMessage)} is_last_message{/if}">	
	<div class="row_title">		
		{if !defined('PHPFOX_IS_ADMIN_NEW')}
		<div class="row_title_image">
			{img user=$aMail suffix='_50_square' max_width=50 max_height=50}
			<a href="#{$aMail.message_id}" class="moderate_link" rel="mail">{phrase var='mail.moderate'}</a>
		</div>
		{/if}
		<div class="row_title_info">			
			<div class="mail_action">
				<ul>
					{if $aMail.is_mobile}
					<li class="js_hover_title">{img theme='misc/mobile.png'}<span class="js_hover_info">{phrase var='mail.sent_via_a_mobile_device'}</span></li>
					{/if}
					<li><span class="extra_info">{$aMail.time_stamp|convert_time}</span></li>					
				</ul>
			</div>			
			<div class="mail_thread_user">		
				{$aMail|user}
			</div>	
			<div>
				{$aMail.text|parse|split:100}
			</div>			
	
			
			{if isset($aMail.attachments)}
			{module name='attachment.list' sType='mail' attachments=$aMail.attachments}
			{/if}				
			
			{if isset($aMail.forwards) && count($aMail.forwards)}
			<div class="mail_thread_forward">
				{foreach from=$aMail.forwards name=submessages item=aSubMail}
					{template file='mail.block.forward'}
				{/foreach}
			</div>
			{/if}				
			
		</div>
	</div>		
</div>




{if Phpfox::isModule('macajaxmail')}

	<script>
	{if Phpfox::getParam('macajaxmail.enable_tiny_mce')}
	$Behavior.macInitTinyMCEAjaxMail = function() {l}

	sButton1 = "bold,italic,underline,separator,bullist,numlist,separator,link,unlink,separator,fontselect,fontsizeselect,forecolor";
	tinyMCE.init({l}

	  mode : 'exact',
	  elements : 'message',
	  theme : "advanced",
	  skin: "cirkuit",
	  theme_advanced_buttons1 : sButton1,
	  theme_advanced_buttons2 : sButton2,
	  theme_advanced_buttons3 : "",
	  theme_advanced_toolbar_location : "top",
	  theme_advanced_toolbar_align : "left",
	  cleanup : false,
	  plugins : "",
	  theme_advanced_resizing : false,
	  theme_advanced_resize_horizontal : false,
	  theme_advanced_more_colors : false,
	  convert_urls : false,
	  relative_urls : true,	
	  setup : function(ed) {l}
	  
		$Core.macIsCheckedPressEnter = function() {l}

			$("#js_mail_submit").fadeToggle("milliseconds");
			ed.onKeyPress.add(function(ed, event) {l}
			if (event.keyCode == 13) {l}
				$('#js_mail_submit').trigger('click');
				//return false;
				{r}
			{r});
			  
		{r}

		$Core.macIsUncheckedPressEnter = function() {l}
			$("#js_mail_submit").fadeToggle("slow");
			$('#message').attr('keypress','').unbind('keypress'); 
		{r}
		
	  {r}

	{r});

	{r}

	{else}

	$Core.macIsCheckedPressEnter = function()
	{l}
		// $("#js_mail_submit").fadeToggle("milliseconds");	
		$("#js_mail_submit").addClass("disabled");

		$('#message').bind("keypress", function (e) {l}
			if (e.keyCode == 13) {l}	        	 
				$('#js_mail_submit').trigger('click');
				return false;
			{r}
		{r});
	{r}

	$Core.macIsUncheckedPressEnter = function()
	{l}
		// $("#js_mail_submit").fadeToggle("slow");
		$("#js_mail_submit").removeClass("disabled");
		$('#message').attr('keypress','').unbind('keypress');   
	{r}

	{/if}
	</script>

	{if Phpfox::isMobile()}
	<script>
	var macUrl = '{$aThread.thread_id}';
	function macUpdateThread() {l}   
	$.ajaxCall('macajaxmail.macUpdateThread','threadId='+macUrl);
	setTimeout('macUpdateThread()',5000);
	{r}
	setTimeout('macUpdateThread()',10000);
	</script>
	{/if}

{/if}
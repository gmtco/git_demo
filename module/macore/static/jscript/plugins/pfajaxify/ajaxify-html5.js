var macbAjaxLinkIsClicked = false;
var macbCanByPassClick = false;
var macsClickProfileName = '';

$Behavior.macInitAjaxifyNow = function() {

	(function(window,undefined){

		// Prepare our Variables
		var
			History = window.History,
			$ = window.jQuery,
			document = window.document;	

		// Check to see if History.js is enabled for our Browser
		if ( !History.enabled ) {
			return false;
		}

		// Wait for Document
		$(function() {

			// Prepare Variables
			var
				/* Application Specific Variables */
			 	contentSelector = '#wrap', 
				// contentSelector = 'body', 
				$content = $(contentSelector).filter(':first'),
				contentNode = $content.get(0),
				$menu = $('#mac-main-topbar'),
				activeClass = 'active selected current',
				activeSelector = '.active,.selected,.current',
				menuChildrenSelector = '> li, > ul > li',
				completedEventName = 'statechangecomplete',
				/* Application Generic Variables */
				$window = $(window),
				$body = $(document.body),
				rootUrl = History.getRootUrl(),
				scrollOptions = {
					duration: 800,
					easing:'swing'
				};
				
			//if($('#mac-ajax-spinner').length < 1) {
			// var $el = $("<div>", {id: "mac-ajax-spinner"}).html("<img src='"+oParams.sJsHome+"module/macore/static/image/loader.png' alt='' />");
			// $el.attr("style", "display: none;position: fixed;top:50%;left:50%;margin-left:-50px;margin-top:-50px;width:100px;height:100px;");
			// $('body').append($el);
			//}
			
			// Ensure Content
			if ( $content.length === 0 ) { 
				$content = $body;
			} 
			
			// Internal Helper
			$.expr[':'].internal = function(obj, index, meta, stack){
				// Prepare
				var
					$this = $(obj),
					url = $this.attr('href')||'',
					isInternalLink;
				
				// Check link
				isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;
				
				// Ignore or Keep
				return isInternalLink;
			};
			
			// HTML Helper
			var documentHtml = function(html){ 
				
				// $("body").attr("class", /body([^>]*)class=(["']+)([^"']*)(["']+)/gi.exec(html.substring(html.indexOf("<body"), html.indexOf("</body>") + 7))[3]);
				macBodyPageClassName = html.match(/body class=\"mac-bp-v8 (.*?)\"/)[1];

				if(macBodyPageClassName.indexOf('page-profile-') > 0 || macBodyPageClassName.indexOf('page-core-index-member') > 0) {
					return ''; // stop since user profile
				}

				macBodyPageClassName += ' loading';
				//alert(macBodyPageClassName)
				$("body").attr("class", macBodyPageClassName);
				// Prepare
	            var result = String(html)
	                    .replace(/<\!DOCTYPE[^>]*>/i, '')
	                    .replace(/<(html|head|body|title|meta|script)([\s\>])/gi,'<div class="document-$1"$2')
	                    .replace(/<\/(html|head|body|title|meta|script)\>/gi,'</div>')
	            ;
	            //alert(result)
	            // Return
	            return $.trim(result);

			};

			//alert(macLinksAjaxify)
			// Ajaxify Helper
			$.fn.ajaxify = function(){
				// Prepare
				var $this = $(this);
				
				// Ajaxify // a:internal
				$this.find(macLinksAjaxify).click(function(event){
	                               
	                // Continue as normal for cmd clicks etc
	                if (event.which == 2 || event.metaKey) { return true; }

	                //alert('clicked')
	                
					// Prepare
					var
						$this = $(this),
						url = $this.attr('href'),
						title = $this.attr('title')||null;
						
					var $sLink = url;
				
					if (!$sLink)
					{ 
						document.location.href = url;
					}				
					
					if ((substr($sLink, 0, 7) != 'http://' && substr($sLink, 0, 8) != 'https://') || substr($sLink, -1) == '#')
					{
						document.location.href = url;
					}
					
					if ($(this).hasClass('photo_holder_image') && !getParam('bPhotoTheaterMode')){
						
					}
					else{
						if ($(this).hasClass('no_ajax_link') || $(this).hasClass('thickbox') || $(this).hasClass('sJsConfirm'))
						{
							document.location.href = url;
						}			
					}
					
					$('.js_box_image_holder_full').remove();
					
					var $aUrlParts = parse_url($sLink);
					
					if ($aUrlParts['host'] != getParam('sJsHostname'))
					{
						document.location.href = url;
					}
					
					if (!isset($aUrlParts['query']))
					{
						var sTempHost = $aUrlParts['scheme'] + '://' + $aUrlParts['host'] + $aUrlParts['path'];
						$aUrlParts['query']	= sTempHost.replace(getParam('sJsHome'), '/');
					}

					if (isset($aUrlParts['query']))
					{
						var aUrlParts = explode('/', $aUrlParts['query']);
						var sAdminPath = 'admincp';
						if (getParam('sAdminCPLocation') != ''){
							sAdminPath = getParam('sAdminCPLocation');
						}
						if (aUrlParts[1] == sAdminPath)
						{
							document.location.href = url;
						}
						
						if (aUrlParts[1] == 'user' && aUrlParts[2] == 'logout')
						{
							document.location.href = url;
						}			
					}
					
					if (macbCanByPassClick === true && aUrlParts[1] != macsClickProfileName){
						macbCanByPassClick = false;
						document.location.href = url;
					}		
					
					if ($('#noteform').length > 0)
					{
						$('#noteform').hide(); 
					}
					if ($('#js_photo_view_image').length > 0)
					{
						$('#js_photo_view_image').imgAreaSelect({ hide: true });		
					}
					if ($('#user_profile_photo').length > 0)
					{
						$('#user_profile_photo').imgAreaSelect({ hide: true });		
					}	
					
					$('.ajax_link_reset').hide(); 
					
					macbAjaxLinkIsClicked = true;
					
					$('body').css('cursor', 'wait');
					
					$('.js_user_tool_tip_holder').hide();
					$('#js_global_tooltip').hide();
					
					$(this).addClass('is_built');
					
					$Core.addUrlPager(this);
					
					if (typeof BehaviorlinkClickAllAClick == 'function')
					{
						var bReturn = BehaviorlinkClickAllAClick($aUrlParts);
						if (bReturn == true)
						{
							document.location.href = url;
						}
					}
					$.ajaxCall('core.page', 'ajax_page_display=true' + $Core.getRequests(this) + '&do=' + $Core.getRequests(this, true), 'GET');
		
					// Ajaxify this link
					History.pushState(null,title,url);
					event.preventDefault();
					return false;
				});
				
				// Chain
				return $this;
			};
			
			// Ajaxify our Internal Links
			$body.ajaxify();
			
			// Hook into State Changes
			$window.bind('statechange',function(){
			
				
				// Prepare Variables
				var
					State = History.getState(),
					url = State.url,
					relativeUrl = url.replace(rootUrl,'');

				// Set Loading
				$body.addClass('loading');
				// $el.show();
				$('.popover, .tooltip').remove(); // fix site tour issue
				$('.dropdown-menu').hide(); // fix site tour issue
				/*
				alert($('.user_register_holder').length);
				alert($('#js_controller_core_index-visitor').length);
				alert(url);
				if($('.user_register_holder').length && $('#js_controller_core_index-visitor').length) {
					$('.user_register_holder').remove();
				}
				*/
				

				// Start Fade Out
				// Animating to opacity to 0 still keeps the element's height intact
				// Which prevents that annoying pop bang issue when loading in new content
				$content.animate({opacity:.333333333},800);


				
				// Ajax Request the Traditional Page
				$.ajax({
					url: url,
					success: function(data, textStatus, jqXHR){ 
						// Prepare
						var
							$data = $(documentHtml(data))
							, $dataBody = $data.find('.document-body:first')
							, $dataContent = $dataBody.find(contentSelector).filter(':first')
							, $menuChildren
							, contentHtml
							, $scripts;

	 					// Fetch the scripts
	                    $scripts = $dataContent.find('.document-script');
	                    if ( $scripts.length ) {
	                    	//alert('scripts found')
	                        $scripts.detach();
	                    }

						// Fetch the content
						contentHtml = $dataContent.html()||$data.html();
						if ( !contentHtml ) {
							// alert('contentHtml not found or empty')
							document.location.href = url;
							return false;
						}
					//	alert('contentHtml: '+contentHtml)
						
						// Update the menu
						$menuChildren = $menu.find(menuChildrenSelector);
						$menuChildren.filter(activeSelector).removeClass(activeClass);
						// $menuChildren = $menuChildren.has('a[href^="'+relativeUrl+'"],a[href^="/'+relativeUrl+'"],a[href^="'+url+'"]');
						$menuChildren = $menu.find('a[href="'+url+'"]');
						if ($menuChildren.length) { 
							$menuChildren.addClass(activeClass); 
						}

						// Update the content
						$content.stop(true,true);
						$content.html(contentHtml).ajaxify().css('opacity', 100).fadeIn(); /* you could fade in here if you'd like */
						//alert('content updated')
						// Update the title
						document.title = $data.find('.document-title:first').text();
						try {
							document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
						}
						catch ( Exception ) { }

						// Add the scripts
	                    $scripts.each(function(){
	                        var $script = $(this), scriptText = $script.text(), scriptNode = document.createElement('script');
	                        if ( $script.attr('src') ) {
	                                if ( !$script[0].async ) { scriptNode.async = false; }
	                                scriptNode.src = $script.attr('src');
	                        }
	                        scriptNode.appendChild(document.createTextNode(scriptText));
	                        contentNode.appendChild(scriptNode);
	                    });


						// Complete the change
						if ( $body.ScrollTo||false ) { $body.ScrollTo(scrollOptions); } /* http://balupton.com/projects/jquery-scrollto */
						$body.removeClass('loading');
						// $el.hide();
						$window.trigger(completedEventName);
		
						// Inform Google Analytics of the change
						if ( typeof window._gaq !== 'undefined' ) {
							window._gaq.push(['_trackPageview', relativeUrl]);
						}

						// Inform ReInvigorate of a state change
						if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' ) {
							reinvigorate.ajax_track(url);
							// ^ we use the full url here as that is what reinvigorate supports
						}


						// reload PHPFox Core
						// $Core.loadInit(); 

					},
					error: function(jqXHR, textStatus, errorThrown){
						document.location.href = url;
						return false;
					}
				}); // end ajax

			}); // end onStateChange

		}); // end onDomLoad

	})(window); // end closure

};
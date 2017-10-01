/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  

Bootstraphpfox3 core.js
Bootstraphpfox3 Version 1.0					
Bootstrap Version 3.0
Phpfox Version 3.7
*/
$Core.macCore = 
{

	macMakeUrl: function(page){
		var rewriteUrl = 'index.php?do=/';
		if(oCore['core.url_rewrite'] == 1){
			rewriteUrl = '';
		}
		return oParams['sJsHome'] + rewriteUrl + page;
	}
	// init 
	, init:function()
	{
		$Core.macCore.privacyDropdown(); 	// privacy
		$Core.macCore.appendPollAnswer(); 	// append poll answer
		//$Core.macCore.isotope(); 			// isotope

		// $Core.macCore.feedIsotope(); 		// isotope for feed

		$Core.macCore.bootstrapping(); 		// bootstrapping
		//$Core.macCore.videoResponsive();
		// if(getParam('bJsIsMobile')){ $Core.macCore.macMobileSidebar(); }
		

		// fix friend
		$Core.macCore.fixFriendPage();
		if(!getParam('bJsIsMobile'))
		{
			//$Core.macCore.scrollToCover();

		}

		

		if($('#js_activity_feed_form #global_attachment_photo_file_input').length){
			$('#global_attachment_photo_file_input').on('change', $Core.macCore.handleFileUpload);
		}
		//$Core.macCore.initMediaElement();
		//$Core.macCore.onclickInitMedia();
		//$Core.macCore.adsFixed(); 		// ads fixed
		//$Core.macCore.notifyShow("Hi, Guest", "Welcome to new BootstraphpFox Theme!", "notice", "");		// welcome message
		//$Core.macCore.macFixMissingImg();
		/*
		$('.play_link').on('click', function(){
			$Core.macCore.videoResponsive();
		});
		*/
		//$Core.macCore.macMakeBootstrapping();

		$("#header_sub_menu_search_input").focus(function() {
			$('#header_sub_menu_search').addClass('mac_is_focus');
		});
		$("#header_sub_menu_search_input").focusout(function() {
			$('#header_sub_menu_search').removeClass('mac_is_focus');
		});
		$("#mac-search-filter-input-form").focus(function() {
			$('#mac-search-filter-input').addClass('mac_is_focus');
		});
		$("#mac-search-filter-input-form").focusout(function() {
			$('#mac-search-filter-input').removeClass('mac_is_focus');
		});

		// fix issue with css3 animation
		$("#mac-welcome a[href='#core.info'], #mac-welcome a[href='#core.activity']").bind('click', function(){
			$('#mac-left').removeClass('animated fadeInLeft');
		});


		// ONLY FOR NEW USER HEADER 
		//$('.page-is-profile .profile_image').prependTo('#mac-content');
		//$('.page-is-page-profile .profile_image').prependTo('#mac-content');

		$('.page_section_menu > ul').addClass('nav nav-pills');	

		// need to run only once


		// $('body').addClass('mac-browser-ie-10');
		var $myprofileimage = $('#mac-left .profile_image');
		
		if($myprofileimage.length) {
			if($('.cover_photo_link .mac-cover-pic-padding').length)
				$myprofileimage.prependTo($('.cover_photo_link .mac-cover-pic-padding'));
			else
				$myprofileimage.prependTo($('.cover_photo_link h1'));
			$('.profile_image .p_4').hide();
			$myprofileimage.show();
		}

	}

	, html5Notification: function(){

	}

	, notifyShow:function(myTitle, myContent, styleClass, iconImg){
		// This is how to change the default settings for the entire page.
		//$.pnotify.defaults.width = "400px";
		// If you don't want new lines ("\n") automatically converted to breaks ("<br />")
		//$.pnotify.defaults.insert_brs = false;
		// theme
		//$.pnotify.defaults.styling = "bootstrap";
		$.pnotify({
			//addclass: "stack-topleft",
			//stack: stack_topleft,
			title: myTitle,
			text: myContent,
			/*
			before_close: function(pnotify){
				// You can access the notice's options with this. It is read only.
				//pnotify.opts.text;

				// You can change the notice's options after the timer like this:
				//pnotify.pnotify({
					//title: pnotify.opts.title+" - Enjoy your Stay",
				//	title: "Enjoy your Stay ;)",
				//	before_close: null
				//});
				pnotify.pnotify_queue_remove();
				return false;
			},*/
		// What styling classes to use. (Can be either jqueryui or bootstrap.)
		styling: "bootstrap",
		// Create a non-blocking notice. It lets the user click elements underneath it.
		nonblock: false,
		// The opacity of the notice (if it's non-blocking) when the mouse is over it.
		nonblock_opacity: 1,
		// Display a pull down menu to redisplay previous notices, and place the notice in the history.
		history: false,
		// Width of the notice.
		width: "300px",
		// Minimum height of the notice. It will expand to fit content.
		min_height: "16px",
		// Type of the notice. "notice", "info", "success", or "error".
		type: styleClass,
		// Set icon to true to use the default icon for the selected style/type, false for no icon, or a string for your own icon class.
		icon: true,
		// The animation to use when displaying and hiding the notice. "none", "show", "fade", and "slide" are built in to jQuery. Others require jQuery UI. Use an object with effect_in and effect_out to use different effects.
		animation: "fade",
		// Speed at which the notice animates in and out. "slow", "def" or "normal", "fast" or number of milliseconds.
		animate_speed: "slow",
		// Opacity of the notice.
		opacity: 1,
		// Display a drop shadow.
		shadow: true,
		// Provide a button for the user to manually close the notice.
		closer: true,
		// Only show the closer button on hover.
		closer_hover: false,
		// Provide a button for the user to manually stick the notice.
		sticker: true,
		// Only show the sticker button on hover.
		sticker_hover: false,
		// After a delay, remove the notice.
		hide: false,
		// Delay in milliseconds before the notice is removed.
		delay: 500,
		// Reset the hide timer if the mouse moves over the notice.
		mouse_reset: true,
		// Remove the notice's elements from the DOM after it is removed.
		remove: true,
		// Change new lines to br tags.
		insert_brs: true,
		// The stack on which the notices will be placed. Also controls the direction the notices stack.
		stack: {"dir1": "down", "dir2": "left", "push": "bottom", "spacing1": 25, "spacing2": 25}
		});
		//$('.ui-pnotify-history-container').remove();
		//$('.ui-pnotify:gt(0)').addClass('mac-first-child');

		// fix issue with pnotify... this close all, work only when 1 notify per page
		//$('.ui-pnotify-closer').on('click', function(){
			//$('.ui-pnotify').remove();
		//});
	}
	, privacyDropdown: function() 
	{	

		$('.mac_privacy_setting_div .btn-group ul li a').click(function() {	

			var $oParent = $(this).parent().parent().parent().parent().find('.mac_change_privacy');
			var $sContent = $(this).html();
			
			$oParent.html($sContent + ' <i class="icon-chevron-down"></i>');
			$oParent.removeClass('is_active');
			$(this).parents('.mac_privacy_setting_div:first').find('input').val($(this).attr('rel'));

			$(this).parent().parent().parent().parent().find('.btn-group').removeClass('open');
			
			return false;
		});	
	}
	, adsFixed: function()
	{

		if(!getParam('bJsIsMobile')) 
		{
			var $macAdBlock = $('.js_ad_space_parent'); // ad block
			var macIndexMemberPage = $('#js_controller_core_index-member');
			var $macRightBlocks = $('#right .block');
			var $macRight = $('#mac-right');
			var macTop = $macRight.height();
		  
			if($macAdBlock.length) 
			{ 
			  $(window).scroll(function (event) 
			  {
				var macYpos = $(this).scrollTop();
				if (macYpos >= macTop) 
				{
					$macAdBlock.addClass('mac-fixed');
				    if(macIndexMemberPage.length) 
				    {
				  		$macRightBlocks.hide();
				    }
				} else 
				{
					$macAdBlock.removeClass('mac-fixed');
				    if(macIndexMemberPage.length) 
				    {
				  		$macRightBlocks.show();
				    }
				}
			  });
			} // end if ad block exist
		}
	}
	, appendPollAnswer: function() 
	{
		$('a#macJsAppendPollFeedAnswer').click(function() {
			$('.js_poll_feed_answer').append('<li><div class="input-group"><span class="input-group-addon"><i class="icon-question"></i></span><input placeholder="Anserws" type="text" name="val[answer][][answer]" value="" size="30" class="js_feed_poll_answer form-control" /></div></li>');
			return false;
		});
	}
	, isotopeRelayout: function() {
		
		alert('isotopeRelayout() its deprecated');

	 	var $container = $('#mac-isotope');
	  	$container.isotope('reLayout');
	}

	, feedIsotopeRelayout: function() {

		alert('feedIsotopeRelayout() its deprecated');

	 	var $container = $('.mac-feed-isotope');
	 	if($container.length) {
	  		$container.isotope('reLayout');
	  	}
	}

	, feedIsotope: function() {
//		
		alert('feedIsotope() its deprecated');

	 	var $container = $('.mac-feed-isotope');
		if($container.length) {
			// isotope layout
			$container.imagesLoaded(function(){
			  	$container.isotope({
			  		itemSelector: '.mac-feed-box',
			  		// fix issue with z-index: https://github.com/desandro/isotope/issues/97#issuecomment-15488412
				    onLayout: function($elems, instance) {
					    $elems.each(function(e){
					      $(this).css({ zIndex: ($elems.length - e) });
					    });
				  	},
				  	resizable: false, // disable normal resizing
					masonry: { columnWidth: $container.width() / 12 }
			  	});
			  	// show
			  	$container.animate({
	              opacity: 1
	            }, 1000, function() {
	            	/*
		            if($initloading.length > 0) {
		              $initloading.hide({effect: "explode",duration: 1000});
		              $initloading.remove();
		            }
		            */
		            //alert('Complete');
		            //$Core.macCore.initPhotoswipe();
            	});
				// update columnWidth on window resize
				$(window).smartresize(function(){
				  	$container.isotope({
						// update columnWidth to a percentage of container width
						masonry: { columnWidth: $container.width() / 12 }
				  	}); 
				  	// $Core.loadInit();
	  			});				
			}); // end imagesLoaded


			// reload isotope feed
			$('.js_feed_add_comment_button input.button, .comment_mini_textarea_holder textarea, .js_box_close a, .pin_message .item_view_more a, .comment_mini_text .item_view_more a, .item_view_more a').on('click',$Core.macCore.feedIsotopeRelayout);
			$('a.js_like_link_unlike, a.js_like_link_like, .comment_mini_link_like a, a.like_action').on('click',$Core.macCore.feedIsotopeRelayout);    
			$('.comment_mini_textarea_holder textarea').keyup($Core.macCore.feedIsotopeRelayout);
			$('.comment_mini_textarea_holder textarea').keydown($Core.macCore.feedIsotopeRelayout);
			$('.comment_mini_textarea_holder textarea').change($Core.macCore.feedIsotopeRelayout);
		} // end if mac-feed-isotope
	}

	, isotope: function() {

		alert('isotope() its deprecated');

	 	var $container = $('#mac-isotope');
		if($container.length) {
			// isotope layout
			$container.imagesLoaded(function(){
			  	$container.isotope({
			  		itemSelector: '.mac-element',
			  		// fix issue with z-index: https://github.com/desandro/isotope/issues/97#issuecomment-15488412
				    onLayout: function($elems, instance) {
					    $elems.each(function(e){
					      $(this).css({ zIndex: ($elems.length - e) });
					    });
				  	},
				  	resizable: false, // disable normal resizing
					masonry: { columnWidth: $container.width() / 12 }

					, transformsEnabled: false
			  	});
			  	// show
			  	$container.animate({
	              opacity: 1
	            }, 1000, function() {
	            	/*
		            if($initloading.length > 0) {
		              $initloading.hide({effect: "explode",duration: 1000});
		              $initloading.remove();
		            }
		            */
		            //alert('Complete');
		            //$Core.macCore.initPhotoswipe();
            	});
				// update columnWidth on window resize
				$(window).smartresize(function(){
				  	$container.isotope({
						// update columnWidth to a percentage of container width
						masonry: { columnWidth: $container.width() / 12 }
				  	}); 
	  			}); 

	  			if(!getParam('bJsIsMobile'))
	  			{
					// infinite scroll
				    $container.infinitescroll({
					    navSelector  : '.mac_pager_view_more_link',    // selector for the paged navigation 
					    nextSelector : 'a.mac-btn-next',  // selector for the NEXT link (to page 2)
					    itemSelector : '.mac-element',     // selector for all items you'll retrieve
					    loading: {
                            finishedMsg: 'No more item found.',
					        img: $Core.macCore.macOptCore+'theme/frontend/bootstrap3/style/default/image/ajax-loader.gif'
					      }
					    }
					    , function( newElements ) 
					    {
							var $newElems = $( newElements ).css({ opacity: 0 });
							$newElems.imagesLoaded(function() 
							{
								$newElems.animate({ opacity: 1 });
								$container.isotope( 'appended', $( newElements ) );
								$Core.loadInit(); 
							});
				  		}); // end infinitescroll
	  			}
				
			}); // end imagesLoaded
		} // end if mac-isotope
	}

	, loadScriptFile: function(url) {
	    var script = document.createElement('SCRIPT');
	    script.src = url;
	    document.getElementsByTagName('HEAD')[0].appendChild(script);
	}

	, loadScriptFileXHR: function(url) {

		 function callback() {
		  if (req.readyState == 4) { // 4 = Loaded
		    if (req.status == 200) {
		      eval(req.responseText);
		    } else {
		      // Error
		    }
		  }
		};
		var req = new XMLHttpRequest();
		req.onreadystatechange = callback;
		req.open("GET", url, true);
		req.send("");
	 
	}
	, bootstrapping: function() 
	{	
		/* bootstrapping... */
		// tooltipize
		$('.image_online_status, .image_online').each(function(){ 
			var $img = $(this);
			var $link = $img.parent('a');
			$img.removeClass('js_hover_title');
			$link.attr('data-placement', 'right');
			$link.attr('title', $img.attr('alt')).addClass('mac-tooltip');
		});
		/* fix unbind */ 
		$('a[rel=tooltip], .mac-tooltip-html').addClass('dont-unbind');
		$('.mac-tooltip:not(.mac-notify-link)').addClass('dont-unbind');
		// init tooltip 
		$('a[rel=tooltip]').tooltip({container: 'body'});
		$('.mac-tooltip').tooltip({container: 'body'});
		$('.mac-tooltip-html').tooltip({container: 'body',html:true, delay: { show: 100, hide: 1000 }});
		// alertize
		$('.error_message').removeClass('error_message').addClass('alert alert-danger');
		$('div.public_message').removeClass('public_message').addClass('alert alert-info');
		$('div.message').removeClass('message').addClass('alert alert-info');
		$('.row_is_incorrect').addClass('alert alert-danger');
		$('.row_is_correct').addClass('alert alert-success');



		/*
		$('#js_login_form_msg').on('change', function(){
			$('.error_message').removeClass('error_message').addClass('alert alert-danger');	
		});
		*/
		/*
		$(window).on('click', 'body', function()
		{
			$('a[rel=tooltip]').tooltip('hide');
			$('.mac-tooltip').tooltip('hide');
		});
		*/
		// remove phpfox tooltip since we use bootstrap-tooltip
		if($('#js_global_tooltip').length) { $('#js_global_tooltip').remove(); }
		// buttons
		$('.mac-btn-loading').click(function() {
	        var btn = $(this);
	        btn.button('loading');
	        setTimeout(function () {
	          btn.button('reset');
	        }, 800)
	    });
		// user profile pic remove square
		/*
		var $profileImage = $('.page-timeline .profile_image a img');
		if($profileImage.length) {
			var profileImageSrc = $profileImage.attr('src');
			var badWord = '_120_square';
			var goodWord = profileImageSrc.replace(badWord, "");
			$profileImage.attr('src', goodWord);
		}
		*/
	
		// input form styling
		$('.mac-inputize input[type=text],.mac-inputize input[type=password], .mac-inputize select, .mac-inputize textarea, .mac-form-filter-user input[type=text], .custom_textarea, .custom_block_form select, .custom_block_form input[type=text], .custom_block_form textarea').addClass('form-control');
		
		// adv search
		$('#macAdvancedSearch .js_custom_search').addClass('form-control');
		$('#macAdvancedSearch select').addClass('form-control mac-w-200 mac-mrg-btm');
		// fix issue with z-index when navbar fixed
		$('.modal').appendTo($('body'));
		$('#macOpenAdvancedSearch').on('click', function(){
			$('#macAdvancedSearch').show();
		});
		$('.modal-header .close').on('click', function(){
			$('#macAdvancedSearch').hide();
		});

		// when select2 disabled
		$(".js_mp_category_list, .mac-select2, select#month, select#day, select#year, select#gender, select#relation, .mac-user-filter-age select, .mac-user-filter-keyword select, .mac-select2-resolve, .mac-form-filter-user select, select#country_iso").addClass('form-control');


		// select2
		/*
		$(".js_mp_category_list,.mac-select2, select#month, select#day, select#year, select#gender, select#relation").select2({
		
		});
		$(".mac-user-filter-age select, .mac-user-filter-keyword select").select2({
			width: 'resolve'
			//dropdownAutoWidth:true
		});
		//.mac-form-filter-user select, 
		$(".mac-select2-resolve").select2({
			width: 'resolve'
			//dropdownAutoWidth:true
		});
		$Core.macCore.addFlagToSelect();
		*/

		$('#mac-content .mac-form-filter-user select').addClass('form-control');
		$('#mac-left .mac-user-filter-age select').addClass('form-control');
		// form stuff
		//$('.js_comment_feed_textarea').addClass('form-control input-lg');
		$('.poll_feed_answer_add').on('click', function(){
			$('.js_feed_poll_answer').addClass('form-control');
		});
		// BUTTONIZE THE BUTTONS
		$('#js_user_browse_advanced_link_close').addClass('btn btn-default');
		//$('.js_feed_add_comment_button input').removeClass('button').addClass('btn btn-primary');
		$('.page_section_menu_link').addClass('btn btn-primary');
		$('.sub_menu_bar_main a').addClass('btn btn-primary btn-block mac-mrg-btm mac-mrg-tp');
		$('.sub_menu_bar_main').removeClass('sub_menu_bar_main');
		$Core.macCore.buttonize();

		// actions buttons
		$('.item_bar_action').addClass('btn btn-xs btn-default').show();
		//

		$('#js_tag_photo, .quickEdit').on('click', function() {

			$Core.macCore.buttonize();
			$('#NoteNote').addClass('form-control');

			setTimeout(function() {
				$('.comment_mini_text textarea').addClass('form-control mac-txt-100');
			}, 500);
			
		});
		//$('.comment_mini_link_like ul li a').on('hover', function() {
			 //$('.comment_mini_link_like ul li a').addClass('btn btn-default btn-xs');
		//});
		// PANELIZE THE BLOCKS
		// make .block => .panel
		$('.block').not('.panel').addClass('panel panel-default');
		// make .title => .panel-heading
		$('.block .title').not('.panel-heading').addClass('panel-heading');
		// make .content => .panel-body
		$('.block .content').not('.panel-body').addClass('panel-body');

		$('.bottom').not('.panel-footer').addClass('panel-footer');


		// FIX LAYOUT
		$Core.macCore.fixLayoutColumns1();
		// END FIX LAYOUT

		// actions buttons
		//$('#section_menu2 ul li a').addClass('btn btn-default');
		/* iCheckbox */
		$('input[type=checkbox]:not(".js_rating_star, .contact_item, .contact_checkall"), input[type=radio]:not(".js_rating_star"), input.checkbox, .mac-form-filter-user input[type=radio], .mac-icheck, .photo_edit_input input[type=checkbox], .mac-icheck-wrap input[type=radio], .mac-icheck-wrap input[type=checkbox]').iCheck
		({
			checkboxClass: 'icheckbox_flat-mac',
			radioClass: 'iradio_flat-mac'
		});
		$('input.js_event_rsvp').on('ifChecked', function(event)
		{
		  $('#js_event_rsvp_button').show();
		  //$('#btn_rsvp_submit').attr('disabled', false); 
		  $('#btn_rsvp_submit').removeAttr('disabled'); 
		  /*
		  $('.js_event_rsvp').attr('checked', false); 
		  $(this).find('.js_event_rsvp').attr('checked', true);
		  */
		});

		// fix blog categories issue
		$('#js_controller_blog_add #core_js_blog_form .checkbox input[type=checkbox]').on('ifChecked', function(event)
		{   
			$('#js_selected_categories').val($('#js_selected_categories').val() + this.value + ','); 
		});
		$('#js_controller_blog_add #core_js_blog_form .checkbox input[type=checkbox]').on('ifUnchecked', function(event)
		{   
			$('#js_selected_categories').val($('#js_selected_categories').val().replace(this.value + ',', ''));
		});


		// fix polls
		if($('.votes').length){
			$('.votes').removeClass('votes').addClass('well');
		}
		// file upload
		//$('.js_uploader_files_input').addClass('btn-file').fileupload();
		// bootstrap select
		//$('.mac-select-style, select.form-control').bootstrapSelect({
		
			//'field-size': 'input-sm'
		//});
	  	$(document).on('click', '.mac-boot-megamenu .dropdown-menu,.mac-megamenu .dropdown-menu', function(e) {
	    	e.stopPropagation();
	    });
	    // featured, sponsored, pending label
	    $('.row_featured_link').addClass('label label-success');
	    $('.row_sponsored_link').addClass('label label-primary');
	    $('.row_pending_link').addClass('label label-danger');

		$('.ui-pnotify-closer span').on('click', function(){
			$(this).parent('.ui-pnotify').remove();
		});


		// blockable block
		$('#mac-left .panel .panel-heading, #mac-right .panel .panel-heading').on('click', function(){
			$(this).next('.panel-body').toggle();
		});


	}

	, fixLayoutColumns1: function() {

			// fix layout columns version 2 for seo-friendly layout

			var $macRightColumn = $('#mac-right');
			var $macLeftColumn = $('#mac-left');
			var $macMainContent = $('#mac-content');
			var $macIsUserProfile = $('#js_is_user_profile');

			if($macRightColumn.length && $.trim($macRightColumn.html()) == '') 
			{
	//alert('right exist and is empty')
				$macRightColumn.remove();
				if($macLeftColumn.length && $.trim($macLeftColumn.html()) != '') 
				{ 
	//alert('right exist and is empty and left exist and is not empty')
					$macMainContent.removeClass().addClass('col-xs-12 col-sm-8 col-md-9 col-lg-10 col-sm-push-4 col-md-push-3 col-lg-push-2 col-main-'+macBodyPageClassName);
					$macLeftColumn.removeClass().addClass('animated fadeInLeft col-xs-12 col-sm-4 col-md-3 col-lg-2 col-sm-pull-8 col-md-pull-9 col-lg-pull-10 col-1-'+macBodyPageClassName);
				} else {
	//alert('right exist and is empty and left exist and is empty')
					$macLeftColumn.remove();
					$macMainContent.removeClass().addClass('col-xs-12 col-main-'+macBodyPageClassName);
				}
				//if($macIsUserProfile.length){
					//$('#section_menu2').css('right', '0');
				//}
			}
			if($macLeftColumn.length && $.trim($macLeftColumn.html()) == '') 
			{
	//alert('left exist and is empty')
				$macLeftColumn.remove();
				if($macRightColumn.length && $.trim($macRightColumn.html()) != '') 
				{
	//alert('left exist and is empty and right exist and is not empty')

					$macMainContent.removeClass().addClass('col-xs-12 col-sm-8 col-md-9 col-lg-9 col-main-'+macBodyPageClassName);
					$macRightColumn.removeClass().addClass('animated fadeInRight col-xs-12 col-sm-4 col-md-3 col-lg-3 col-1-'+macBodyPageClassName);
				
				} else 
				{
	//alert('left exist and is empty and right exist and is empty')
					$macRightColumn.remove();
					$macMainContent.removeClass().addClass('col-xs-12 col-main-'+macBodyPageClassName);
				}
			}
			// else alert($.trim($macLeftColumn.html()))
			
			// end right+left colum
	}

	, buttonize: function() {

		$('.button.button_off').removeClass().addClass('btn btn-default');
		$('.button').removeClass().addClass('btn btn-primary');

	}
	, initSelect2: function()
	{
		function format(state) {
		    if (!state.id) return state.text; // optgroup
		    return "<img class='flag' src='"+$Core.macCore.macOptCore+"theme/frontend/bootstrap3/style/default/image/flags/" + state.id.toLowerCase() + ".gif'/>" + state.text;
		}

		$(".js_mp_category_list,.mac-select2, select#month, select#day, select#year, select#gender, select#relation").select2({
		
		});
		$(".mac-user-filter-age select, .mac-user-filter-keyword select").select2({
			width: 'resolve'
			//dropdownAutoWidth:true
		});
		//.mac-form-filter-user select, 
		$(".mac-select2-resolve").select2({
			width: 'resolve'
			//dropdownAutoWidth:true
		});
		$("select#country_iso").select2({
		    formatResult: format,
		    formatSelection: format,
		    escapeMarkup: function(m) { return m; }
		});
	}
	/*
	, initPhotoswipe: function() 
	{
		//alert('start photoswipe');
		if($('body').hasClass('mac-photoswiped'))
		{
			//(function(window, PhotoSwipe){
				document.addEventListener('DOMContentLoaded', function(){
					var	instance = PhotoSwipe.attach( window.document.querySelectorAll('a.mac-photoswipe'), {});
				}, false);
			//}(window, window.Code.PhotoSwipe));
			//var myPhotoSwipe = $("#mac-isotope a.mac-photoswipe").photoSwipe({ enableMouseWheel: false , enableKeyboard: false }); 
			alert('end photoswipe');
		} else alert('no start');
	}
	*/

	, fixFriendPage: function()
	{ 
		// fix friend - create new list
		$("#js_controller_friend_index #breadcrumb_holder #section_menu2 .btn").addClass('js_core_menu_friend_add_list');
		$('.js_core_menu_friend_add_list').click(function(){	
			$Core.box('friend.addNewList', 400);
			return false;
		});

		$('.friend_action .dropdown-menu a').click(function(){
			var sRel = $(this).attr('rel');
			var sType = '';
			var aParts = explode('|', sRel);
			if ($(this).parent('li').hasClass('active')) {
				$(this).parent('li').removeClass('active');
				sType = 'remove';
			}
			else {
				$(this).parent('li').addClass('active');
				sType = 'add';
			}
			$.ajaxCall('friend.manageList', 'list_id=' + aParts[0] + '&friend_id=' + aParts[1] + '&type=' + sType, 'GET');
			return false;
		});
		// end fix friend
	}


	, macOptCore: oParams.sJsHome
  	, macMobileSidebar: function() 
  	{
	    $("#mac_main_container").on('click', function(){
	        $('#side-menu').animate({
	            width: '0',
	        }, 300, 'easeOutExpo', function () {}).removeClass('side-active');
	        $('body').removeClass('mac-mobile-sidebar-on');
	    });
	    $(".open-side-menu").on('click', function(){        
	        $('#side-menu').animate({
	            width: '260',
	        }, 300, 'easeInOutExpo', function () {}).addClass('side-active');
	        $(this).addClass('hide');
	        $(".close-side-menu").removeClass('hide');
	        $('body').addClass('mac-mobile-sidebar-on');
	        return false;
	    });
	    $(".close-side-menu").on('click', function(){        
	        $('#side-menu').animate({
	            width: '0',
	        }, 300, 'easeInOutExpo', function () {}).removeClass('side-active');
	        $(this).addClass('hide');
	        $(".open-side-menu").removeClass('hide');
	        $('body').removeClass('mac-mobile-sidebar-on');
	        return false;
	    });
  	}
  	
  	, videoResponsive: function()
	{ 
		// Find all YouTube videos
		//var $allVideos = $("iframe[src^='http://player.vimeo.com'], iframe[src^='http://www.youtube.com']"),
		var $allVideos = $("#js_controller_video_view div.t_center iframe[src^='http://player.vimeo.com'], #js_controller_video_view div.t_center iframe[src^='http://www.youtube.com'], #js_controller_video_view div.t_center object, #js_controller_video_view div.t_center embed, #js_controller_video_view div.t_center video");  //, #js_controller_video_view div.t_center video
		if(!$allVideos.length){
			$allVideos = $("#js_controller_blog_index div.mac-blog-browse iframe, #js_controller_blog_index div.mac-blog-browse object, #js_controller_blog_index div.mac-blog-browse embed, #js_controller_blog_index div.mac-blog-browse video"); //, #js_controller_blog_index div.mac-blog-browse video
			if(!$allVideos.length){
		
				$allVideos = $(".js_box .js_box_content div.t_center embed, .js_box .js_box_content div.t_center iframe, .js_box .js_box_content div.t_center object, .js_box .js_box_content div.t_center video");  //, #js_controller_video_view div.t_center video
				var $fluidEl = $("div.js_box_content");

			} else {
				var $fluidEl = $("div.mac-element");
			}
		} else {
			var $fluidEl = $("#mac-content");
		}

		$allVideos.hide();
    	$('body').addClass('mac-video-responsive');
		// The element that is fluid width
		// Figure out and save aspect ratio for each video
		$allVideos.each(function() {
		  $(this)
		    .data('aspectRatio', this.height / this.width)
		    // and remove the hard coded width/height
		    .removeAttr('height')
		    .removeAttr('width');
		});
		// When the window is resized
		$(window).resize(function() { 
		  var newWidth = $fluidEl.width();
		  // Resize all videos according to their own aspect ratio
		  $allVideos.each(function() { 
		    var $el = $(this); 
		    $el
		      .width(newWidth)
		      .height(newWidth * $el.data('aspectRatio')).show();
		  });
		// Kick off one resize to fix all videos on page load
		}).resize();
	} // video responsive
	
	, initNicescroll: function(param, el)
	{
		// nice scroll
		$(el).niceScroll(param);
	} // end initNicescroll

	, isScrolled: false

	, scrollToCover: function()
	{
		if(!$Core.macCore.isScrolled && $('.cover_photo_link').length > 0){   

			$.scrollTo(300, 1000);
			$Core.macCore.isScrolled = true;
		}

	}

	, onclickInitMediaElement: function(skin){

		$('.mac-play-audio, .play_link').on('click', function(){
			setTimeout(function(){
			$Core.macCore.initMediaElement(skin); 
			}, 500);
		});
	}

	, handleFileUpload: function(evt) {

		var files = evt.target.files;

		var controlUpload = $('#global_attachment_photo_file_input');

		var photoWrap = $('#mac-photo-wrap');

		$(photoWrap).html('');

		for (var i = 0, f; f = files[i]; i++) {

			if (!f.type.match('image.*')) {

				continue;
			}

			var reader = new FileReader();

			reader.onload = (function(file) {

				return function(e) {

					photoWrap.append('<img class="mac-photo-preview" src="'+e.target.result+'" title="'+escape(file.name)+'"/>');
				};

			})(f);
			
			reader.readAsDataURL(f);
		}

		$('#activity_feed_submit').on('click', function(){
			$('#mac-photo-wrap').html('');
		});
	}

	
	, initMediaElement: function(skin)
	{
		if(skin){
			$('video, audio').addClass(skin);	
		}
		
		//setTimeout(function(){
		  $('video,audio').mediaelementplayer({
			// allows testing on HTML5, flash, silverlight
			// auto: attempts to detect what the browser can do
			// auto_plugin: prefer plugins and then attempt native HTML5
			// native: forces HTML5 playback
			// shim: disallows HTML5, will attempt either Flash or Silverlight
			// none: forces fallback view
			mode: 'auto',
			// remove or reorder to change plugin priority and availability
			plugins: ['flash','silverlight','youtube','vimeo'],
			// shows debug errors on screen
			enablePluginDebug: false,
			// use plugin for browsers that have trouble with Basic Authentication on HTTPS sites
			httpsBasicAuthSite: false,
			// overrides the type specified, useful for dynamic instantiation
			type: '',
			// path to Flash and Silverlight plugins
			pluginPath: $Core.macCore.macOptCore+'module/macore/static/jscript/plugins/mediaelement/build/',
			// name of flash file
			flashName: 'flashmediaelement.swf',
			// streamer for RTMP streaming
			flashStreamer: '',
			// turns on the smoothing filter in Flash
			enablePluginSmoothing: false,
			// enabled pseudo-streaming (seek) on .mp4 files
			enablePseudoStreaming: false,
			// start query parameter sent to server for pseudo-streaming
			pseudoStreamingStartQueryParam: 'start',
			// name of silverlight file
			silverlightName: 'silverlightmediaelement.xap',
			// default if the <video width> is not specified
			defaultVideoWidth: 480,
			// default if the <video height> is not specified
			defaultVideoHeight: 270,
			// overrides <video width>
			pluginWidth: -1,
			// overrides <video height>
			pluginHeight: -1,
			// additional plugin variables in 'key=value' form
			pluginVars: [],	
			// rate in milliseconds for Flash and Silverlight to fire the timeupdate event
			// larger number is less accurate, but less strain on plugin->JavaScript bridge
			timerRate: 250,
			// initial volume for player
			startVolume: 0.8,
			success: function () { },
			error: function () { }
		  });
		  
		//},500);

		$('video, audio').show();
	}


	// wrapper function to scroll(focus) to an element
	, scrollTo: function (el, offeset) {
		pos = (el && el.size() > 0) ? el.offset().top : 0;
		jQuery('html,body').animate({
		scrollTop: pos + (offeset ? offeset : 0)
		}, 'slow');
	}

	// function to scroll to the top
	, scrollTop: function () {
		$Core.macCore.scrollTo();
	}


}; // end macCore

$Behavior.macCoreInit = function()
{
	
    $Core.macCore.init();
} // end macCoreInit
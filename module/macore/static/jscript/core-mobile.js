/*
bootstrapped by
 __  __
|  \/  | __ _  ___ __ _  __ _  ___  _ __ __ _  __ _  __ _ 
| |\/| |/ _` |/ __/ _` |/ _` |/ _ \| '__/ _` |/ _` |/ _` |
| |  | | (_| | (_| (_| | (_| | (_) | | | (_| | (_| | (_| |
|_|  |_|\__,_|\___\__,_|\__, |\___/|_|  \__,_|\__, |\__,_|
                        |___/                 |___/  

macMobileCore()
*/
$Core.macMobileCore = 
{
	touchSupport: false
	, eventClick: 'click'
	, eventHover: 'mouseover mouseout'
	, init:function()
	{
		/*
		// on touch start
		if ('ontouchstart' in document.documentElement) {
			$('html').addClass('touch');
			$Core.macMobileCore.touchSupport = true;
			$Core.macMobileCore.eventClick = 'touchon touchend';
			$Core.macMobileCore.eventHover = 'touchstart touchend';
		} else {
			$('html').addClass('no-touch');
		}
		*/
		// run
		$Core.macMobileCore.run();

		// fix issue with css3 animation
		$('#mac-left,#mac-right').removeClass('animated fadeInLeft');

		// fixContainerHeight
		// $Core.macMobileCore.fixContainerHeight(); 
	}
	, fixContainerHeight: function()
	{
		$('#mac_main_container').css('min-height', $('#sidemenu-container').height());
	}
	, run: function()
	{
		/* Touch Gestures, Hover and Animation Triggers */

		/* Hover Effects 
		$('.mac-mobile-nav a, .btn, button, input[type="submit"], input[type="reset"], input[type="button"]').bind($Core.macMobileCore.eventHover, function(event) {
			$(this).toggleClass('hover');
		});
		*/

		$('body,html').removeClass('mac-mobile-menu-is-open');

		$('.mac-notify-box .dropdown-menu').width($('#mac-main-topbar').width());

		/* menu */
		$('.nav-child-container').on('click', function(event) {
			event.preventDefault();
			var $this = $(this);
			var ul = $this.next('ul');
			var ulChildrenHeight = ul.children().length * 46;
			if(!$this.hasClass('active')){
				$this.toggleClass('active');
				ul.toggleClass('active');
				ul.height(ulChildrenHeight + 'px');
			}else{
				$this.toggleClass('active');
				ul.toggleClass('active');
				ul.height(0);
			}
		});

		/* menu func */
		$('#menu-trigger').on('click', function(event) {
			
			event.preventDefault();

			$('body,html').toggleClass('mac-mobile-menu-is-open');

			$('#sidemenu-container').toggle();

			$('#mac_inner_container').toggleClass('active');
			$('#mac_main_container').toggleClass('active');
			$('#mac-main-topbar').toggleClass('active');

			$('#sidemenu').toggleClass('active');

			setTimeout(function() {

				$('#sidemenu-container').toggleClass('active');

				$Core.macMobileCore.fixContainerHeight(); 
			}, 500);
		});
		/*
		$('#menu-trigger').on($Core.macMobileCore.eventClick, function(event) {
			event.preventDefault();
			$('#mac_inner_container').toggleClass('active');
			$('#sidemenu').toggleClass('active');
			setTimeout(function() {
				$('#sidemenu-container').toggleClass('active');
			}, 500);
		});
		*/
			

		$('.mac-mobile-nav a').on('click', function(event) {

			event.preventDefault();
			
			$('body,html').toggleClass('mac-mobile-menu-is-open');

			var path = $(this).attr('href');

			$('#mac_inner_container').toggleClass('active');
			$('#mac_main_container').toggleClass('active');
			$('#mac-main-topbar').toggleClass('active');
			$('#sidemenu').toggleClass('active');

			$('#sidemenu-container').remove();

			setTimeout(function() {
				window.location = path;
			}, 500);
		});

		/* swipe support 
		$('.touch-gesture #mac-main-topbar').hammer().on('swiperight', function(event) {
			$('#mac_inner_container').addClass('active');
			$('#sidemenu').addClass('active');
			setTimeout(function() {
				$('#sidemenu-container').addClass('active');
			}, 500);
		});
		$('.touch-gesture #mac-main-topbar').hammer().on('swipeleft', function(event) {
			$('#mac_inner_container').removeClass('active');
			$('#sidemenu').removeClass('active');
			setTimeout(function() {
				$('#sidemenu-container').removeClass('active');
			}, 500);
		});
		*/

		/**
		* Check if the child menu has an active item.
		* If yes, then it will expand the menu by default.
		**/
		var $navItems = $('.mac-mobile-nav ul li a');
		$navItems.each(function(index){
			if ($(this).hasClass('current')) {
				$parentUl = $(this).parent().parent();
				$parentUl.height($parentUl.children('li').length * 46 + "px");
				$parentUl.prev().addClass('active');
				$parentUl.addClass('active');
				$anchor = $parentUl.prev();
				$anchor.children('.nav-child-container').addClass('active');
			}
		});

		/**
		* flexslider
		var $flexsliderContainer = $('.flexslider');
		if($flexsliderContainer.length > 0){
			$flexsliderContainer.flexslider({
				controlsContainer: ".flexslider-controls",
				prevText: '<span class="icon-left-open-big"></span>',
				nextText: '<span class="icon-right-open-big"></span>',
				slideshowSpeed: 5000,
				animationSpeed: 600,
				slideshow: true,
				smoothHeight: false,
				animationLoop: true,
			});
		}
		**/



		/**
		*
		* Alert boxes
		*
		var $alertBoxes = $('.alert-box .close');
		$alertBoxes.bind(eventClick, function(event) {
			event.preventDefault();
			var $parent = $(this).parent('.alert-box');
			$parent.fadeOut(500);
			setTimeout(function() { $parent.hide(0); }, 500);
		});
		**/

		/**
		* H5 validate - form jquery validation
		**/
		//$('form').h5Validate();
	}
}; // end macMobileCore

$Behavior.macMobileCoreInit = function()
{
    $Core.macMobileCore.init();
} // end macCoreInit
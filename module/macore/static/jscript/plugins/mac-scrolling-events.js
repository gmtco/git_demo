/**
 Scrolling Events module 
**/
var macScrollingEvents = function () {

	var scrollTimeout;
	var minScrollTime = 500;
	var minHeightLimit = 0;

	var $mainNavBar = $('#mac-main-topbar');
	var $searchBarWrap = $('.mac-navbar-search');
	var $filtersContainer = $('.mac-filters-container');

	var $macwindow = $(window);
		
	var init = function() {

		// skip when mobile or missing filters bar
		if(getParam('bJsIsMobile') || !$filtersContainer.length) {
		  return false;
		}

		$macwindow.scroll(function () {

			if (scrollTimeout) {

				// clear the timeout, if one is pending
				clearTimeout(scrollTimeout);
				scrollTimeout = null;

			}

			// console.log('scroll fired');

			scrollTimeout = setTimeout(scrollHandler, minScrollTime);

		});

	};

	var scrollHandler = function () {

		console.log('scrollHandler called');
		if($macwindow.scrollTop() > minHeightLimit+200 && !$searchBarWrap.hasClass('mac-navbar-search-fixed')) {

			$filtersContainer.addClass('container');
			$searchBarWrap.addClass('mac-navbar-search-fixed');
			//$mainNavBar.hide();

			//console.log('fired $searchBarWrap.addClass');

		} else if($macwindow.scrollTop() <= minHeightLimit && $searchBarWrap.hasClass('mac-navbar-search-fixed')) {

			$filtersContainer.removeClass('container');
			$searchBarWrap.removeClass('mac-navbar-search-fixed');
			//$mainNavBar.show();

		//console.log('fired $searchBarWrap.removeClass');

		}

	};

    // RUN
    return {

    	run: function() {

    		init(); 
    	}
    };

}();

/***
Usage
***/
//macIsotopeLayoutTools.run();
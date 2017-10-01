/**
 Isotope Feed Layout Tools module 
**/
var macIsotopeFeedLayoutTools = function () {

    // private functions & variables

	var $make1ColBtn = $('#js-make-1col');

	var $make2ColBtn = $('#js-make-2col');

	var $container = $('.mac-feed-isotope');

	var $items = $('.mac-feed-box');

	var itemsClasses = $items.attr('class');

	var $colSwitcherWrapper = $('.mac-col-switcher-link');

	var isActive = '';

	var $macPagerViewMoreLink = $('.mac_pager_view_more_link');

	var makeColOne = function() {
		// change layout view
		$make1ColBtn.on('click', function() {

			makeColOneActive();
			$colSwitcherWrapper.removeClass('disabled');
			$(this).addClass('disabled');
			return false;
		});
	}

	var makeColOneActive = function() {

		isActive = '1';
		$items = $('.mac-feed-box');
		$items.removeClass().addClass('mac-feed-box col-xs-12');
		reloadLayout();
	}

	var makeColTwo = function() {

		$make2ColBtn.on('click', function() {
			makeColOneActive();
			$colSwitcherWrapper.removeClass('disabled');
			$(this).addClass('disabled');
			return false;
		});

	}

	var makeColTwoActive = function() {

		isActive = '2';
		$items = $('.mac-feed-box');
		$items.removeClass().addClass('mac-feed-box col-xs-12 col-md-6');
		reloadLayout();
	}

	var reloadLayout = function() {

		var $containers = $('.mac-feed-isotope');
		var $container;

		$containers.each(function() {

			$container = $(this);
			$container.isotope('layout');
		});
	}

	var initIsotope = function() { 

		var $containers = $('.mac-feed-isotope');
		var $container;
		$containers.each(function() {
			$container = $(this);
			$container.imagesLoaded( function() {
				$container.isotope({
				  itemSelector: '.mac-feed-box',
				  layoutMode: 'masonry'
				});
			});
		});

	}

    // RUN
    return {

    	run: function() {
			initIsotope();
	        makeColOne();
	        makeColTwo();
    	}
    };

}();


$Behavior.macInitFeedIsotope2 = function() {

	var $container = $('.mac-feed-isotope');
	// skip if not exist main container
	if(!$container.length) return;
	macIsotopeFeedLayoutTools.run();
}

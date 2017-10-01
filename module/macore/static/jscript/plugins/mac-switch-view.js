/**
 Isotope Layout Tools module 
**/
var macIsotopeLayoutTools = function () {

    // private functions & variables

	var $make1ColBtn = $('#js-make-1col');

	var $make2ColBtn = $('#js-make-2col');

	var $make3ColBtn = $('#js-make-3col');

	var $make4ColBtn = $('#js-make-4col');

	var $container = $('#mac-isotope2');

	var $items = $('.mac-element');

	var itemsClasses = $items.attr('class');

	var $colSwitcherWrapper = $('.mac-infsc-controls .dropdown-menu li');

	var isActive = '4';

	var $macPagerViewMoreLink = $('.mac_pager_view_more_link');


	var initColumnSwitcher = function() {

		$('.mac-infsc-controls .dropdown-menu li:first').addClass('active');
		/*
		if($items.hasClass('col-md-6')) { // 2 cols

			$make2ColBtn.parent().addClass('active');

		} else if($items.hasClass('col-md-4')) { // 3 cols

			$make3ColBtn.parent().addClass('active');

		} else if($items.hasClass('col-md-3')) { // 4 cols

			$make4ColBtn.parent().addClass('active');

		} else { // 1 cols

			$make1ColBtn.parent().addClass('active');

		}
		*/
	}

	var makeColOne = function() {
		// change layout view
		$make1ColBtn.on('click', function() {

			isActive = '1';

			$items = $('.mac-element');

			$colSwitcherWrapper.removeClass('active');

			$(this).parent().addClass('active');

			$items.removeClass().addClass('mac-element col-xs-12');

			reloadLayout();

			return false;
		});
	}

	var makeColOneActive = function() {

		isActive = '1';

		$items = $('.mac-element');

		$items.removeClass().addClass('mac-element col-xs-12');

		reloadLayout();
	}

	var makeColTwo = function() {

		$make2ColBtn.on('click', function() {

			isActive = '2';

			$items = $('.mac-element');

			$colSwitcherWrapper.removeClass('active');

			$(this).parent().addClass('active');

			$items.removeClass().addClass('mac-element col-xs-12 col-md-6');

			reloadLayout();

			return false;
		});

	}

	var makeColTwoActive = function() {

		isActive = '2';

		$items = $('.mac-element');

		$items.removeClass().addClass('mac-element col-xs-12 col-md-6');

		reloadLayout();
	}

	var makeColThree = function() {

		$make3ColBtn.on('click', function() {

			isActive = '3';

			$items = $('.mac-element');

			$colSwitcherWrapper.removeClass('active');
			
			$(this).parent().addClass('active');
			
			$items.removeClass().addClass('mac-element col-xs-12 col-md-4');

			reloadLayout();
			
			return false;
		});
		
	}

	var makeColThreeActive = function() {

		isActive = '3';

		$items = $('.mac-element');

		$items.removeClass().addClass('mac-element col-xs-12 col-md-4');

		reloadLayout();
	}

	var makeColFour = function() {

		$make4ColBtn.on('click', function() {

			isActive = '4';

			$items = $('.mac-element');

			$colSwitcherWrapper.removeClass('active');
			
			$(this).parent().addClass('active');
			
			$items.removeClass().addClass(itemsClasses);

			reloadLayout();
			
			return false;
		});
		
	}

	var makeColFourActive = function() {

		isActive = '4';

		$items = $('.mac-element');

		$items.removeClass().addClass(itemsClasses);

		reloadLayout();
	}

	var checkCols = function() { 
    	if(isActive == '1') {
    		makeColOneActive();
    	}
    	if(isActive == '2') {
    		makeColTwoActive();
    	}
    	if(isActive == '3') {
    		makeColThreeActive();
    	}
    	if(isActive == '4') {
    		makeColFourActive();
    	}
    }

	var reloadLayout = function() {
		$container.isotope('layout');
	}

	var initInfinitescroll = function() {

		// infinite scroll
		$container.infinitescroll({
		        loading: {
		            finishedMsg: "<em>Congratulations, you've reached the end of the internet.</em>",
					// $Core.macCore.macOptCore+'theme/frontend/bootstrap3/style/default/image/ajax-loader.gif'
					img: $Core.macCore.macOptCore+'theme/frontend/bootstrap3/style/default/image/ajax-loader.gif',
		            msgText: oTranslations['core.loading'],
		            speed: 'fast'
		        },
		        debug: true,
		        nextSelector : ".mac_pager_view_more_link a.mac-btn-next",
		        navSelector: ".mac_pager_view_more_link",
		        itemSelector: ".mac-element",
		        animate: true,
		        bufferPx: 500,
		        pixelsFromNavToBottom: 1000,
		        extraScrollPx: 0,
		        //path: undefined, // Either parts of a URL as an array (e.g. ["/page/", "/"] or a function that takes in the page number and returns a URL
				//prefill: false, // When the document is smaller than the window, load data until the document is larger or links are exhausted
		        //maxPage: undefined // to manually control maximum page (when maxPage is undefined, maximum page limitation is not work)
			},

			// call Isotope as a callback
			function(newElements) {

				var $newElems = $(newElements).hide(); // hide to begin with

				// ensure that images load before adding to masonry layout
				$newElems.imagesLoaded( function() {

					// Fix issue, thanks desandro - https://github.com/desandro/imagesloaded/issues/14
		    		$newElems.fadeIn(); // 
		    		// 

					$container.isotope( 'appended', $($newElems)); 

					$Core.loadInit(); // reload pufox

					checkCols();

				});

		});
	}

	var toggleInfiniteScrolling = function() {

		$('.mac-infsc-controls').show('fast');

		$('.mac-infsc-pause').on('click', function(){

			$container.infinitescroll('pause');
			$macPagerViewMoreLink.show();
		});

		$('.mac-infsc-resume').on('click', function(){

			$container.infinitescroll('resume');
			$macPagerViewMoreLink.hide();
		});

		$('.mac-btn-next').on('click', function(){

			window.location.href = $(this).attr('href');
		});
	}

	var initIsotope = function() {
		// init
		$container.imagesLoaded( function() {
			$container.isotope({
			  // options
			  itemSelector: '.mac-element',
			  layoutMode: 'masonry'
			});
		});
	}

    // RUN
    return {

    	run: function() {

	        initColumnSwitcher();

	        makeColOne();
	        makeColTwo();
	        makeColThree();
	        makeColFour();

			initIsotope();
			initInfinitescroll();
			toggleInfiniteScrolling();
    	}
    	/*,
        makeColOne: makeColOne,
        makeColTwo: makeColTwo,
        makeColThree: makeColThree,
        makeColFour: makeColFour,
        checkCols: checkCols, 
        reload: reloadLayout,
        initInfinitescroll: initInfinitescroll,
        toggleInfiniteScrolling: toggleInfiniteScrolling,
        initIsotope: initIsotope
        */
    };

}();

/***
Usage
***/
//macIsotopeLayoutTools.run();
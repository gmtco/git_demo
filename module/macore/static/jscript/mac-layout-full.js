;$Behavior.macLayoutMakeFullwidth = function() {


    // skip when timeline 
    if($('body').hasClass('page-timeline') || getParam('bJsIsMobile')){
      return false;
    }

    var scrollTimer, lastScrollFireTime = 0;

    //var $categoryBlock = $('div.block[id*="_category"]'); // only categories
    var $categoryBlockLeft = $('#mac-left'); // l // removed div.blocks - 9.1.2014
    var $categoryBlockRight = $('#mac-right'); // r // removed div.blocks - 9.1.2014
    var $macContent = $('#mac-content');
    var $macLeft = $('#mac-left'); var macLeftHeight = $macLeft.height();
    var $macRight = $('#mac-right'); var macRightHeight = $macRight.height();
    var $container1 = $('#mac-isotope');
    var $container2 = $('#mac-bootpin');
    var $container3 = $('.mac-feed-isotope');

    var macHeightLimit = 0;
    // var macContentClass = 'col-xs-12 col-sm-8 col-md-9 col-lg-10 col-sm-push-4 col-md-push-3 col-lg-push-2 col-main-';
    var macContentClass = '';

    var macContentClassNow = $macContent.attr('class');

    if(macLeftHeight >= macRightHeight) {
      macHeightLimit = macLeftHeight;
    } else {
      macHeightLimit = macRightHeight;
    }

    if($categoryBlockLeft.length || $categoryBlockRight.length) {

      $(window).scroll(function() {

        var minScrollTime = 500;
        var now = new Date().getTime();

        function macProcessScroll() {

          if($(this).scrollTop() > macHeightLimit+200 && !$macContent.hasClass('mac-col-fullwidth')) {

            if($macLeft.length) {
              $macLeft.hide();
            }
            if($macRight.length) {
              $macRight.hide();
            }

            macContentClass = $macContent.attr('class');
            $macContent.removeClass().addClass('col-xs-12 animated bounceInRight mac-col-fullwidth');

          } else if($(this).scrollTop() <= macHeightLimit && $macContent.hasClass('mac-col-fullwidth')) {

            if($macLeft.length) {
              $macLeft.show();
            }
            if($macRight.length) {
              $macRight.show();
              // macContentClass = 'col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-push-2 col-lg-push-2 col-main-';
            }

            if(macContentClass) { // fix issue when empty string class, happen when ajax event occured
              // alert('macContentClass: ' + macContentClass);
              $macContent.removeClass().addClass(macContentClass);
            } else {
              // alert('macContentClassNow: ' + macContentClassNow);
              $macContent.removeClass().addClass(macContentClassNow);
            }

          }

          if($container1.length) {
            $container1.isotope({
              // update columnWidth to a percentage of container width
              masonry: { columnWidth: $container1.width() / 12 }
            });
          }

          if($container2.length) {
            $container2.isotope({
              // update columnWidth to a percentage of container width
              masonry: { columnWidth: $container2.width() / 12 }
            });
          }

          if($container3.length) {
            $container3.isotope({
              // update columnWidth to a percentage of container width
              masonry: { columnWidth: $container3.width() / 12 }
            });
            // $Core.loadInit(); // dangerous put this here !!
          }

        } // end macProcessScroll

        if (!scrollTimer) {

            if (now - lastScrollFireTime > (3 * minScrollTime)) {
                macProcessScroll();   // fire immediately on first scroll
                lastScrollFireTime = now;
            }
            scrollTimer = setTimeout(function() {
                scrollTimer = null;
                lastScrollFireTime = new Date().getTime();
                macProcessScroll();
            }, minScrollTime);

        }

      });

    } 

    
}
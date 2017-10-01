$Behavior.macInitIsotope2 = function() {

var $container = $('#mac-isotope2');

// skip if not exist main container
if(!$container.length) return;

macIsotopeLayoutTools.run();

macScrollingEvents.run();

}
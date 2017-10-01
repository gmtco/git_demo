;$Behavior.macMegaMenuTabs = function() {


  $('.mac-tab-ajax a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var type = $(e.target).data("macajax-type"); 
    var filter = $(e.target).data("macajax-filter");
    if(type !== ''){
    	$.ajaxCall('macore.megaMenuBlock', 'type='+type+'&filter='+filter, 'GET');	
    }
    
  }); // end onclick .mac-tab-ajax a[data-toggle="tab"]



/*
  $('.mac-tab-loadmore').on('click', function (e) {
    var type = $(e.target).data("macajax-type"); 
    var filter = $(e.target).data("macajax-filter");
    if(type !== '' && filter !== ''){
    	$.ajaxCall('macore.megaMenuBlockLoadMore', 'type='+type+'&filter='+filter, 'GET');	
    }
  }); // end onclick .mac-tab-loadmore
*/


}; // end macMegaMenuTabs
;$Core.macagoragaLayoutStuff = {
    // main
    initPin:function(){   
      var $container = $('#mac-bootpin'); 
      // temp
      $('.pin_comments .comment_mini_link_like .mac-btn-group').removeClass('mac-btn-group').addClass('btn-group btn-group-justified');
      
      $('#mac-bootpin .comment_mini_link_like .btn:not(.btn-link)').removeClass('btn-primary btn-danger btn-default btn-warning btn-success').addClass('btn-link');
      $('#mac-bootpin .comment_mini_action .btn:not(.btn-link)').removeClass('btn-primary btn-danger btn-link btn-warning btn-success btn-default').addClass('btn-link');

      //$('.page-core-index-member .comment_mini_link_like a, .comment_mini_action a').removeClass('btn-danger btn-primary btn-default').addClass('btn-link');
      /*
      $('.js_feed_add_comment_button input.button, .comment_mini_textarea_holder textarea, .js_box_close a, .pin_message .item_view_more a, .comment_mini_text .item_view_more a, .item_view_more a').on('click',$Core.macagoragaLayoutStuff.isotopeRelayout);
      $('a.js_like_link_unlike, a.js_like_link_like, .comment_mini_link_like a, a.like_action').on('click',$Core.macagoragaLayoutStuff.isotopeRelayout);    
      $('.comment_mini_textarea_holder textarea').keyup($Core.macagoragaLayoutStuff.isotopeRelayout);
      $('.comment_mini_textarea_holder textarea').keydown($Core.macagoragaLayoutStuff.isotopeRelayout);
      $('.comment_mini_textarea_holder textarea').change($Core.macagoragaLayoutStuff.isotopeRelayout);
      */

      

      $('.js_comment_feed_textarea').keyup($Core.macagoragaLayoutStuff.isotopeRelayout);
      $('.js_comment_feed_textarea').keydown($Core.macagoragaLayoutStuff.isotopeRelayout);
      $('.js_comment_feed_textarea').change($Core.macagoragaLayoutStuff.isotopeRelayout);

      $('.js_feed_entry_add_comment').bind('click', function() {

        $Core.macagoragaLayoutStuff.isotopeRelayout();

      });

    },
    isotopeRelayout: function() {
      var $container = $('#mac-bootpin');
      $container.isotope('reLayout');
      //macBootpinGrid.grid('reload');
    },
    reLayoutPin:function(){
        setTimeout(function(){
          $Core.macagoragaLayoutStuff.isotopeRelayout();
        }, 500);
    },
    reLoadPin2:function(){
      setTimeout(function(){
        $Core.macagoragaLayoutStuff.isotopeRelayout();
      }, 1000);
    },
    reLoadPin:function(){
      $Core.macagoragaLayoutStuff.isotopeRelayout();
    },
    reloadPinAfterDelete:function() {
      $Core.macagoragaLayoutStuff.isotopeRelayout();
    },
    removePinBlock: function(feedId) {
    
      $('#mac_pin_element_'+feedId).hide({effect: 'explode',duration: 800});
      setTimeout(function(){
        $('#mac-bootpin').isotope( 'remove', $('#mac_pin_element_'+feedId)); 
        $Core.macagoragaLayoutStuff.isotopeRelayout();
      }, 1000); 
    }
}
$Behavior.macagoragaPinLayout = function(){
  $Core.macagoragaLayoutStuff.initPin(); 
}
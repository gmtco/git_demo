;var $aMailOldHistory = {};
var $aNotificationOldHistory = {};
var $bNoCloseNotify = false;
var bCloseShareHolder = true;
var bCloseChangeCover = true;
var bCloseViewMoreFeed = true;
$Behavior.globalThemeInit = function () {
    $(".feed_share_on_item a").click(function () {
        bCloseShareHolder = false
    });
    $("#js_change_cover_photo").click(function () {
        bCloseChangeCover = false
    });
    $(getParam("bJsIsMobile") ? "#mac-content" : "body").click(function () {
        $(".action_drop_holder").hide();
        $(".header_bar_drop").removeClass("is_clicked");

        $('.item_bar_action').parent().find('ul:first').hide();
        $('.item_bar_action').removeClass('item_bar_action_clicked');

        $(".mac-notify-box").removeClass("open");
        if (bCloseShareHolder) {
            $(".feed_share_on_holder").hide()
        }
        bCloseChangeCover = true;
        bCloseViewMoreFeed = true
    });
    $(".feed_sort_order ul li a").click(function () {
        $.ajaxCall("user.updateFeedSort", "order=" + $(this).attr("rel"));
        return false
    });
    $(".activity_feed_share_this_one_link").click(function () {
        var e = $(this).attr("rel");
        if ($(this).hasClass("is_active")) {
            $("." + e).hide();
            $(this).removeClass("is_active");
        } else {
            $(".timeline_date_holder").hide();
            $(".activity_feed_share_this_one_link").removeClass("is_active");
            $("." + e).show();
            $(this).addClass("is_active");
        } if (e == "timeline_date_holder_share") {
            $.ajaxCall("feed.loadDropDates", "", "GET");
        }
        return false
    });
    $("#mac-main-topbar #mac-right-menu a.no_ajax_link").on("click", function () {
        $(".mac-notify-box").removeClass("open")
    });
    $(".mac-notify-menu ul li.mac-notify-box a.mac-notify-link").click(function () {
        $("#mac-main-topbar #mac-main-menu .dropdown, #mac-user-setting-top-menu").removeClass("open");
        var e = $(this).parent(".mac-notify-box");
        var t = e.find(".holder_notify_drop");
        if (e.hasClass("open")) {
            e.removeClass("open");
            t.hide()
        } else {
            $(".mac-notify-menu ul li.mac-notify-box").removeClass("open");
            $(".mac-notify-menu ul li.mac-notify-box").find(".holder_notify_drop").hide();
            e.addClass("open");
            t.show();
            if (t.find(".holder_notify_drop_data").find(".holder_notify_drop_loader").length > 0) {
                $Core.ajax($(this).attr("rel"), {
                    params: {
                        no_page_update: true
                    },
                    success: function (e) {
                        t.find(".holder_notify_drop_data").html(e)
                    }
                })
            } else {
                if ($(this).attr("rel") == "mail.getLatest") {
                    if (isset($aMailOldHistory)) {
                        for ($iKey in $aMailOldHistory) {
                            $("#js_mail_read_" + $iKey).find("a:first").removeClass("is_new")
                        }
                    }
                } else if ($(this).attr("rel") == "notification.getAll") {
                    if (isset($aNotificationOldHistory)) {
                        for ($iKey in $aNotificationOldHistory) {
                            $("#js_notification_read_" + $iKey).find("a:first").removeClass("is_new")
                        }
                    }
                }
            }
        }
        return false
    });
    $("#section_menu_more").click(function () {
        $("#section_menu_drop").toggle();
        return false
    });
    $("#js_comment_form_holder #text").keydown(function () {
        $Core.resizeTextarea($(this))
    });
    $("#js_compose_new_message #message").keydown(function () {
        $Core.resizeTextarea($(this))
    });
    $(".profile_image").mouseover(function () {
        $(this).find(".p_4:first").show()
    });
    $(".profile_image").mouseout(function () {
        $(this).find(".p_4:first").hide()
    });
    $('.item_bar_action').click(function(){
        $(this).parent().find('ul:first').toggle();
        $(this).blur();
        if ($(this).hasClass('item_bar_action_clicked')){
            $(this).removeClass('item_bar_action_clicked');
        } else {
            $(this).addClass('item_bar_action_clicked');
        }       
        
        return false;
    });





    $('#mac-welcome div a').click(function(e)
    {

        if ($(this).hasClass('is_active'))
        {
            $('.welcome_info_holder').hide();
            $(this).removeClass('is_active');           
            return false;
        }

        if (oCore['core.site_wide_ajax_browsing'] == false)
        {
            if (this.href.indexOf('#') < 0)
            {
                window.location = this.href;
                return false;
            }
            else
            {               
            }
        }
        else
        {
            if (this.href.indexOf('#') > (-1))
            {
            }
            else
            {
                return false;
            }
        }
        var aParts = explode('#', this.href);
        var sTempCacheId = aParts[1].replace('.', '_');
        
        $('.welcome_info_holder').hide();
        $('#mac-welcome div a').removeClass('is_active');
                
        $(this).addClass('is_active');
        /*
        if ($(this).hasClass('is_cached'))
        {
            $(this).parent().find('.welcome_info_holder:first').show();
            
            return false;
        }
        */
        $(this).addClass('is_cached');
        
        var sRel = $(this).attr('rel');
        sCustomClass= '';
        if (!empty(sRel)){
            sCustomClass = ' welcome_info_holder_custom';
        }
        
        $('#mac-welcome').append('<div class="welcome_info_holder' + sCustomClass + '"><div class="welcome_info" id="' + sTempCacheId + '"></div></div>');
        
        $.ajaxCall(aParts[1], 'temp_id=' + sTempCacheId, 'GET');

        $('body').click(function()
        {
            $('.welcome_info_holder').hide();
        });
        
        return false;
    });

        

    /**
    * ###############################
    * Global site search
    * ###############################
    */      
    $('#header_sub_menu_search_input').before('<div id="header_sub_menu_search_input_value" style="display:none;">' + $('#header_sub_menu_search_input').val() + '</div>');

    $('#header_sub_menu_search_input').focus(function(){   
         
        if (getParam('bJsIsMobile')){
            $(this).parent().find('#header_sub_menu_search_input').addClass('focus');
            $(this).val('');
            return;
        }
        
        $(this).parent().find('#header_sub_menu_search_input').addClass('focus');
        if ($(this).val() == $('#header_sub_menu_search_input_value').html()){
            $(this).val('');
            if ((isset(oModules['friend']) ))
            {
                $Core.searchFriendsInput.init({
                'id': 'header_sub_menu_search',
                'max_search': (getParam('bJsIsMobile') ? 5 : 10),
                'no_build': true,
                'global_search': true,
                'allow_custom': true
                });
                $Core.searchFriendsInput.buildFriends(this);            
            }           
        }
    }); 
    
    $('#header_sub_menu_search_input').blur(function(){
        $(this).parent().find('#header_sub_menu_search_input').removeClass('focus');
    });     
    if ((isset(oModules['friend']) ))
    {
        $('#header_sub_menu_search_input').keyup(function(){
            $Core.searchFriendsInput.getFriends(this);
        });
    }   
    /**
    * ###############################
    * Global section search tool
    * ###############################
    */  
    $('.header_bar_search .txt_input').focus(function()
    {
        $(this).parent().find('.header_bar_search_input').addClass('focus');
        $(this).addClass('input_focus');
        
        if ($('.header_bar_search_default').html() == $(this).val())
        {
            $(this).val('');            
        }
    }).blur(function()
    {
        $(this).parent().find('.header_bar_search_input').removeClass('focus');
        
        if (empty($(this).val()))
        {
            $(this).val($('.header_bar_search_default').html());
            $(this).removeClass('input_focus');
        }
    }); 

}
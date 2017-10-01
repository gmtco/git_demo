;$Behavior.macCustomScriptInit = function()
{
	
    // ################################ 
    // Add here your custom code
    // ################################ 

    // 1. Remove Tooltip from action link of feed
    // Uncomment for enable (remove // from start of line)
	//$('.comment_mini_link_like a.btn').tooltip('destroy');

	// 2. Transform all input into bootstrap style
	//$('input[type=text]').addClass('form-control');
	// this is for select
	//$('select').addClass('form-control');
	// ATTENTION: Some select should be width:auto, this will make width:100%
	// You can add some css selector for limit to only some select
	// Example: $('#wrap select').addClass('form-control');
	
	// 3. Other custom 





	// fix timeline submenu
	$('#section_menu2').prependTo($('#content_holder'))
	.css('position', 'relative')
	.css('float', 'right')
	.css('margin-bottom', '20px');

	$('.profile_timeline_header_holder').css('margin-top', '-60px');

	if($('.page-pages-view').length) {

		if($('#pages_like_join').is(':visible'))
			$('#mac-left').css('margin-top', '-25px');
		/*else
			$('#mac-left').css('margin-top', '-15px');*/

	} else if($('.page-is-user-profile').length) {
		
	}

	$('#pages_like_join').bind('click', function() {

		$('#mac-left').css('margin-top', '0');

	});


	$('.js_comment_feed_textarea').removeClass('js_comment_feed_textarea').addClass('mac-js_comment_feed_textarea');







	/*	
	emojify.setConfig({
		img_dir: oParams['sJsHome'] + 'module/macore/static/image/emoji'
	});				
	emojify.run();
	*/
		






}; // end macCustomScriptInit




/*
This it's used for submit comment on press enter
If press shift + enter then go on new line
You can comment this for disable
*/
$Behavior.macSubmitCommentForm = function()
{
	if(getParam('bJsIsMobile')){
		return true;
	}

	$('.mac-js_comment_feed_textarea').on('focus', function() {

		if($(this).val() == 'Write a comment...') {

			$(this).attr('placeholder', 'Press Enter for add comment or Enter + Shift for newline.');
			$(this).val('');
		}

	});

	$('.mac-js_comment_feed_textarea').on('blur', function() {

		if($(this).val() == 'Write a comment...') {

			$(this).attr('placeholder', 'Write a comment...');
			$(this).val('');
		}

	});

	$('.mac-js_comment_feed_textarea').bind("keypress", function (e){
		
		if (e.keyCode == 13 && !e.shiftKey)  {

			if (function_exists('' + Editor.sEditor + '_wysiwyg_feed_comment_form')) 
			{
				eval('' + Editor.sEditor + '_wysiwyg_feed_comment_form(this);');
			}		

			$(this).parent().parent().parent().find('form').ajaxCall('comment.add'); 
			$(this).parent().find('.error_message').remove();

			return false;
		}

	});

	/*
	$('.js_feed_add_comment_button input').bind("click", function (e) {
		alert('e')
		if (function_exists('' + Editor.sEditor + '_wysiwyg_feed_comment_form')) 
		{
			eval('' + Editor.sEditor + '_wysiwyg_feed_comment_form(this);');
		}	

		$(this).parent().parent().parent().parent().find('form').ajaxCall('comment.add'); 
		$(this).parent().parent().parent().find('.error_message').remove();
		return false;
		
	});
	*/

};

/* 
Scroll to top button 
This it's used for show/hide scroll-to-top button
You can comment this for disable
*/
$Behavior.macScrollTopButtonInit = function() {
    var buttonGoTop = $(".mac-go-top-2");
    var scrollTimer, lastScrollFireTime = 0;
    if(buttonGoTop.length) {
      $(window).scroll(function() {
        var minScrollTime = 1000;
        var now = new Date().getTime();
        function macScrollTopButtonProcess() {
	        if($(this).scrollTop() > 60 && buttonGoTop.hasClass('hide')) {
	          buttonGoTop.removeClass('hide');
	        }
	        else if($(this).scrollTop() <= 60 && !buttonGoTop.hasClass('hide')){ 
	          buttonGoTop.addClass('hide');
	        }
    	}
 		if (!scrollTimer) {
            if (now - lastScrollFireTime > (3 * minScrollTime)) {
                macScrollTopButtonProcess();   // fire immediately on first scroll
                lastScrollFireTime = now;
            }
            scrollTimer = setTimeout(function() {
                scrollTimer = null;
                lastScrollFireTime = new Date().getTime();
                macScrollTopButtonProcess();
            }, minScrollTime);
        }

      });
    } 
};



/**
 * Click on adding a new comment link.
 */
/*
$Behavior.macAddCommentOnclick = function() {

	$('.js_feed_entry_add_comment').click(function()
	{			
		$('.js_comment_feed_textarea').each(function()
		{
			if ($(this).val() == $('.js_comment_feed_value').html())
			{
				$(this).removeClass('js_comment_feed_textarea_focus');
				$(this).val($('.js_comment_feed_value').html());
			}			
			$(this).parents('.comment_mini').find('.feed_comment_buttons_wrap').hide();
		});			

		
		$(this).parents('.pin_comments:first').find('.comment_mini_content_holder').show();
		$(this).parents('.pin_comments:first').find('.feed_comment_buttons_wrap').show();
			
		if ($(this).parents('.pin_comments:first').find('.js_comment_feed_textarea').val() == $('.js_comment_feed_value').html())
		{
			$(this).parents('.pin_comments:first').find('.js_comment_feed_textarea').val('');
		}		
		$(this).parents('.pin_comments:first').find('.js_comment_feed_textarea').focus().addClass('js_comment_feed_textarea_focus');
		$(this).parents('.pin_comments:first').find('.comment_mini_textarea_holder').addClass('comment_mini_content');
		$(this).parents('.pin_comments:first').find('.js_feed_comment_form').find('.comment_mini_image').show();
			
		var iTotalComments = 0;
		$(this).parents('.pin_comments:first').find('.js_mini_feed_comment').each(function()
		{
			iTotalComments++;
		});
			
		if (iTotalComments > 2)
		{
			$.scrollTo($(this).parents('.pin_comments:first').find('.js_comment_feed_textarea_browse:first'), 340);
		}
			
		return false;
	});	

};
*/
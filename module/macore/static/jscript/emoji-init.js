// A very simple jQuery wrapper for js-emoji
/*$.fn.emoji = function(){
	return this.each(function(){
		$(this).html(function (i, oldHtml){
			return emoji.replace_colons(oldHtml);
		});
	});
};
*/


$Behavior.macEmojiInit2 = function() {

  emoji.img_path = oParams['sJsHome'] + 'module/macore/static/image/emoji';
};



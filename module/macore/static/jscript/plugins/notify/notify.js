;$(document).ready(function(){	
$('.close').click(function(){
		var box = $(this).parent();
		box.addClass('inactive');
		window.setTimeout(function(){
			box.remove()
		}, 700)
	})
});

var fireNotification = function(config){
	$('body').append('<aside class="notification-' + config.type + ' ' + config.position + ' animation-' + config.animation + '"><img alt="" src="' + config.img + '"/><h1>' + config.heading + '</h1><p>' +  config.text + '</p><button class="close">Close</button></aside>');
	
	$('.close').click(function(){
		var box = $(this).parent();
		box.addClass('inactive');
		window.setTimeout(function(){
			box.remove()
		}, 700)
	})
}
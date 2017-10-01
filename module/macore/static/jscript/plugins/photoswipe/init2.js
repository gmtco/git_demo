;var photoswipeContainer = '#mac-isotope a.mac-photoswipe';

setTimeout(function() {

if($(photoswipeContainer).length > 0){
	(function(window, $, PhotoSwipe){

		$(document).ready(function(){
			
			var options = {
			
				/* Customizing toolbar */

				getToolbar: function(){
					return '<div class="ps-toolbar-previous"><i class="icon-chevron-left"></i></div>'
					+ '<div class="ps-toolbar-play"><i class="icon-play"></i></div>'
					+ '<div class="ps-toolbar-next"><i class="icon-chevron-right"></i></div>';
				},
						
				getImageCaption: function(el){
					var captionText, captionEl, captionBack;
					
					/* Get the caption from the alt tag */

					if (el.nodeName === "IMG"){
						captionText = el.getAttribute('alt'); 
					}

					var i, j, childEl;
					for (i=0, j=el.childNodes.length; i<j; i++){
						childEl = el.childNodes[i];
						if (el.childNodes[i].nodeName === 'IMG'){
							captionText = childEl.getAttribute('alt'); 
						}
					}
					
					/* Return a DOM element with custom styling */

					captionBack = document.createElement('a');
					captionBack.setAttribute('id', 'ps-custom-back');
					captionBack.setAttribute('class', 'icon-remove');
					
					captionEl = document.createElement('div');
					captionEl.appendChild(captionBack);
					
					captionBack = document.createElement('span');
					captionBack.innerHTML=captionText;
					captionEl.appendChild(captionBack);
					return captionEl;
				},
				
				enableMouseWheel: false,
				captionAndToolbarOpacity: 1,
			}




			/* Creating Photoswipe instance */

			var instance = PhotoSwipe.attach(window.document.querySelectorAll(photoswipeContainer), options );




			/* Adding listener to custom back button */

			instance.addEventHandler(PhotoSwipe.EventTypes.onShow, function(e){
				$('.ps-caption').addClass('active');
				$('.ps-toolbar').addClass('active');
				$('.ps-document-overlay').addClass('active');
				$('.ps-carousel').addClass('active');

				if($('html').hasClass('no-csstransforms')){
					$(document).on('click', '#ps-custom-back', function() {
						e.target.hide();
					});
				}else{
					$(document).on($Core.macMobileCore.eventClick, '#ps-custom-back' , function(){
						$('.ps-caption').removeClass('active');
						$('.ps-toolbar').removeClass('active');
						setTimeout(function(){
							$('.ps-document-overlay').removeClass('active');
							$('.ps-document-overlay').addClass('unload');
							$('.ps-carousel').removeClass('active');
							setTimeout(function(){
								e.target.hide();
							}, 400);
						}, 400);
					});
				}

			});




			/* Play/Pause Icon Change */

			/* Slideshow Start */

			instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStart, function(e){
				$('.ps-toolbar-play').html();
				$('.ps-toolbar-play').html('<i class="icon-pause"></i>');
				$('.ps-toolbar-play').addClass('hover');
			});

			/* Slideshow End */

			instance.addEventHandler(PhotoSwipe.EventTypes.onSlideshowStop, function(e){
				$('.ps-toolbar-play').html();
				$('.ps-toolbar-play').html('<i class="icon-play"></i>');
				$('.ps-toolbar-play').removeClass('hover');
			});
					
		}, false);	

	}(window, window.jQuery, window.Code.PhotoSwipe));




	/* Hover Effects - Photoswipe */

	$(document).on($Core.macMobileCore.eventHover, '#ps-custom-back, .ps-toolbar-previous, .ps-toolbar-play, .ps-toolbar-next', function() {
		$(this).toggleClass('hover');
	});
}

}, 1000);
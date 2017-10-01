;(function( $ ) {

    $.fn.bootstrapSelect = function(settings) {	
        
		function select_value(bootstrapSelect, selectedOption) {
			bootstrapSelect.find('.dropdown-menu li').removeClass('active');
			selectedOption.closest('li').addClass('active');
			bootstrapSelect.find('input[type="text"]').val(selectedOption.html());
			bootstrapSelect.find('input[type="hidden"]').val(selectedOption.attr('href'));					
		}
    
        this.each(function(){
			
			var defaults = $.extend({
				'button-style': 'btn-default',
				'field-size': '',
				'container-class': ''
			}, settings);
            
			
            /* validation - begin */
            
			var allowed_button_styles = new Array('primary', 'info', 'success', 'warning', 'danger', 'default');
            var allowed_field_sizes = new Array('lg', 'sm');
           

			if ($.inArray(defaults['button-style'].replace('btn-', ''), allowed_button_styles) < 0) {
				 defaults['button-style'] = '';
			}
			
			if ($.inArray(defaults['field-size'].replace('input-', ''), allowed_field_sizes) < 0) {
				 defaults['field-size'] = '';
			}
			
			defaults['container-size'] = '';
			if (defaults['field-size'] > '') {
				defaults['container-size'] = defaults['field-size'].replace('input-', '');
			}
			
            /* validation - end */
			
			var options = $(this).find('option');
			var name = $(this).attr('name');
			
			var placeholder = '';
 
            if (typeof $(this).attr('placeholder') !== 'undefined' ){
				placeholder = $(this).attr('placeholder');
			}
            
            
            /* build html structure - begin */
			var container_size = '';
			if (defaults['container-size'] > '') {
				container_size = 'bootstrap-'+defaults['container-size'];
			}
            var bootstrapSelect = $('<div class="bootstrap-select input-group '+defaults['container-class']+' '+container_size+'"></div>');
            bootstrapSelect.append('<input type="text" name="'+name+'_label" placeholder="'+placeholder+'" class="form-control '+ defaults['field-size']+'"/>');
            bootstrapSelect.append('<input type="hidden" name="'+name+'" />');
			bootstrapSelect.append('<div class="input-group-btn "></div>');
			bootstrapSelect.find('.input-group-btn').append('<button class="btn '+defaults['button-style']+' dropdown-toggle"><span class="caret"></span></button>');
			bootstrapSelect.find('.input-group-btn').append('<ul class="pull-right dropdown-menu ' + defaults['button-style'].replace('btn-', '') + '"></ul>');
			options.each(function(){
				bootstrapSelect.find('ul').append('<li><a href="'+$(this).val()+'">'+$(this).html()+'</a></li>');
				if ( $(this).is(':selected') ) {
					select_value(bootstrapSelect, bootstrapSelect.find('li:last').find('a'));
				}
			});
            
            $(this).replaceWith(bootstrapSelect);                
			
            /* build html structure - end */
            
            
            /* bind events - start */
            
            bootstrapSelect.find('.dropdown-menu li a').each(function(){
				$(this).click(function(){
					select_value(bootstrapSelect, $(this));
					bootstrapSelect.find('.input-group-btn').removeClass('open');
					bootstrapSelect.find('.input-group-btn button').removeClass('active');
					return false;
				});
				
			});
    
            
            bootstrapSelect.find('input[type="text"]').bind('focus', function(){
				
				/* if focus of this field is achieved with right click, then
				we need to close all other bootstrap selects manually */
				$('.bootstrap-select').each(function(){
					$(this).find('.input-group-btn').removeClass('open');
					$(this).find('.input-group-btn button').removeClass('active');
				});
				
				bootstrapSelect.find('.input-group-btn').addClass('open');
				bootstrapSelect.find('.input-group-btn button').addClass('active');
				
			});
			bootstrapSelect.find('button').bind('click', function(){
				bootstrapSelect.find('.input-group-btn').toggleClass('open');
				bootstrapSelect.find('.input-group-btn button').toggleClass('active');
			});
			
			bootstrapSelect.find('.dropdown-menu li:last').find('a').blur(function(){
				bootstrapSelect.find('.input-group-btn').removeClass('open');
				bootstrapSelect.find('.input-group-btn button').removeClass('active');
			});
			
			$('html').bind('click', function(e){
				var inputField = bootstrapSelect.find('input[type="text"]');
				var liOption = bootstrapSelect.find('.dropdown-menu li a');
				var button = bootstrapSelect.find('button');
				
				if ( (!$(e.target).is(inputField)) && (!$(e.target).is(liOption)) && (!$(e.target).is(button)) ) {
					bootstrapSelect.find('.input-group-btn').removeClass('open');
					bootstrapSelect.find('.input-group-btn button').removeClass('active');
				}			
	
			});
			
            /* bind events - end */
        });

    };
      
})( jQuery );
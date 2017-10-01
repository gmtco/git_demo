$Behavior.macLoadPrettyPhoto = function() {

	$("a[rel^=\'prettyPhoto\']").prettyPhoto({

		  theme:"mac"
		, deeplinking: false
		, social_tools: ""
		, custom_markup: '<div id="pe_lightbox_custom_content"></div>'
		});
	
};
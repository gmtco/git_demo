function macLoadDisqus() 
{
	DISQUS.reset({
	  reload: true,
	  config: function () {  
	    this.page.identifier = disqus_identifier;  
	    this.page.url = disqus_url;
	  }
	});
};

$Behavior.macInitDisqus = function()
{
	$('a.thickbox.photo_holder_image').on('click', function(){
		disqus_url = $(this).attr('href');
		disqus_identifier = $(this).attr('rel');
		macLoadDisqus();
	});
};
;$Behavior.macVideoResponsiveInit = function()
{
    // $Core.macCore.videoResponsive(); // done by fitvids
	$('.play_link').on('click', function(){ 
		setTimeout(function(){
		$Core.macCore.videoResponsive();
		}, 500);
	});
} 
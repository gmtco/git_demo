;$Behavior.macNicescrollInit = function()
{

	var el = 'html';

    $Core.macCore.initNicescroll({
    	alwaysVisible: true,
        cursorborderradius: '0px', // Scroll cursor radius
        background: '#E5E9E7',     // The scrollbar rail color
        cursorwidth: '10px',       // Scroll cursor width
        cursorcolor: '#999999'     // Scroll cursor color
      }, el);

};
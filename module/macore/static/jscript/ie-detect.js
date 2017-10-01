	    var IE = (function () {
		    "use strict";
		    var ret, isTheBrowser,
		        actualVersion,
		        jscriptMap, jscriptVersion;
		    isTheBrowser = false;
		    jscriptMap = {
		        "5.5": "5.5",
		        "5.6": "6",
		        "5.7": "7",
		        "5.8": "8",
		        "9": "9",
		        "10": "10"
		    };
		    jscriptVersion = new Function("/*@cc_on return @_jscript_version; @*/")();
		    if (jscriptVersion !== undefined) {
		        isTheBrowser = true;
		        actualVersion = jscriptMap[jscriptVersion];
		    }
		    ret = {
		        isTheBrowser: isTheBrowser,
		        actualVersion: actualVersion
		    };
		    return ret;
		}());

		if(IE.isTheBrowser && IE.actualVersion == "10") {
			
		} else {
			
			$('body').addClass('mac-browser-ie-10');

			var $myprofileimage = $('#mac-left .profile_image');
			if($myprofileimage.length) {
				$myprofileimage.prependTo($('.cover_photo_link .mac-cover-pic-padding'));
				$('.profile_image .p_4').hide();
				$myprofileimage.show();
			}
		}
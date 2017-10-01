;(function (window, undefined) {
    "use strict";
    // jQuery
    // History & ScrollTo (Wait for jQuery)
    var interval = setInterval(function () {
        if (window.jQuery) {
            clearInterval(interval);
            // History.js
            window.History || document.write('<script src="'+$Core.macCore.macOptCore+'module/macore/static/jscript/plugins/pfajaxify/jquery.history.js"><\/script>');

            interval = setInterval(function () {
                if (window.History && window.History.initHtml4) {
                    clearInterval(interval);

                    // Ajaxify-html5.js
                    document.write('<script src="'+$Core.macCore.macOptCore+'module/macore/static/jscript/plugins/pfajaxify/ajaxify-html5.js"><\/script>');

                    interval = setInterval(function () {
                        if (jQuery.fn.ajaxify) {
                            clearInterval(interval);
                            alert('History.js It! Is ready for action!');
                        }
                    }, 500);
                } else if (console && console.log) {
                    console.log("Loading history.js and scrollto.js");
                }
            }, 500);
        } else if (console && console.log) {
            console.log("Loading jQuery");
        }
    }, 500);
}(window));
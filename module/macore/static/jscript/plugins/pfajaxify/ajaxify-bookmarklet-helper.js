(function (window, undefined) {
    "use strict";

    // History.js
    window.History || document.write('<script src="'+getParam('sJsHome')+'theme/frontend/bootstrap3/style/default/jscript/plugins/pfajaxify/jquery.history.js"><\/script>');

    setTimeout(function () {
        if (window.History && window.History.initHtml4) {
            // Ajaxify-html5.js
            document.write('<script src="'+getParam('sJsHome')+'theme/frontend/bootstrap3/style/default/jscript/plugins/pfajaxify/ajaxify-html5.js"><\/script>');
            interval = setInterval(function () {
                if (jQuery.fn.ajaxify) {
                    clearInterval(interval);
                    alert('History.js It! Is ready for action!');
                }
            }, 500);
        } else {
            alert('Ajaxify HTML5 said: Loading history.js and scrollto.js.');
        }
    }, 500);
 

}(window));
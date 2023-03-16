(function ($) {
    "use strict";

    /*---------------------------
       Commons Variables
    ------------------------------ */
    var $window = $(window),
        $body = $("body");

    /*window.addEventListener("resize", function() {
		"use strict"; window.location.reload(); 
    });*/

    /*-----  enable Tooltip start -----*/
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    /*-----  enable Tooltip end -----*/

}(jQuery));
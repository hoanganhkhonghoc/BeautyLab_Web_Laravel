(function ($) {
    "use strict";
    var main_wind = $(window);
    var wWidth = $(window).width();

    jQuery(document).ready(function ($) {
        //----------moving to welcome section on clicking mouse icon---------
        $("#goDown").on("click", function () {
            $("html, body").animate({
                scrollTop: $("#demo_section").offset().top - 0 + 'px'
            }, 1200);
        });

        // Date(year, month, day, hours, minutes, seconds, milliseconds);
        var expire_date = new Date(2020, 10, 28, 0, 0, 0, 0);
        if (expire_date <= Date.now()) {
            $('.single_demo').removeClass('new-item');
        }


    });

    main_wind.on('load', function () {
        $('#preloader').delay(500).fadeOut('slow');
    });

    


}(jQuery));

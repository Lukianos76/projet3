jQuery(function(){
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200 ) {
                $('#scrollUp').css('right','25px');

            } else {
                $('#scrollUp').removeAttr( 'style' );
            }
        });
    });
});
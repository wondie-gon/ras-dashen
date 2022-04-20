jQuery(document).ready(function () {
    var offset = 200;
    var duration = 500;
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.btn-scroll-up').fadeIn(duration);
        } else {
            jQuery('.btn-scroll-up').fadeOut(duration);
        }
    });

    jQuery('.btn-scroll-up').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, duration);
        return false;
    });
});
$(document).ready(function() {
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >= 200) {
            $("#top").addClass("scrolled");
        } else {
            $("#top").removeClass("scrolled");
        }
    });
});
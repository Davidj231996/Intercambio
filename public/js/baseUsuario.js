$(document).ready(function(){
    $('span.nav-link').click(function () {
        $('div.active').fadeOut().removeClass('active');
        $("#" + this.getAttribute('content')).fadeIn('slow').addClass('active');
    });
});
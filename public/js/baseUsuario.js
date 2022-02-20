$(document).ready(function(){
    $('#menuUsuario a.nav-link').click(function () {
        $('#menuUsuario li.active').removeClass('active');
        $('div.active').fadeOut().removeClass('active');
        $("#" + this.getAttribute('content')).fadeIn('slow').addClass('active');
    });

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function() {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        }
    });
});
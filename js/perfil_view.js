$(document).ready(function() {

    $('.ventana1').click(function() {
        $('.logOut').hide();
        $('.verCompras').hide();
        $('.modUser').fadeIn();
    });

    $('.ventana2').click(function() {
        $('.modUser').hide();
        $('.logOut').hide();
        $('.verCompras').fadeIn();
    });

    $('.ventana3').click(function() {
        $('.modUser').hide();
        $('.verCompras').hide();
        $('.logOut').fadeIn();
    });


});
$(document).ready(function () {

    //Eventos
    $("#completeShoppingCart").click(function () {
        pagar();
    });


    function pagar() {
        $.ajax({
            type: "POST",
            url: "../ajax/EventDetail_Ajax/completeShoppingCart",

            success: function (datos) {
                alert("Carrito listo");
            },
            error: function (error) {
                alert("Error");
            }
        });
    }
});
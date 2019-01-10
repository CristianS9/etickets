$(document).ready(function () {
    $(".cantidad").focusout(function () {
        var cantidad = $(this).val();
        var cantidadInicial = $(this).attr("originalValue");
        var id = $(this).attr('id');
        if (cantidad != cantidadInicial) {
            changeQuantity(cantidad,id);
        }
    });

    function changeQuantity(pcantidad,pid) {
        $.ajax({
            type: "POST",
            url: "../index.php/ajax/EventDetail_Ajax/updateItemInCart",
            data: {
                cantidad: pcantidad,
                idEntrada: pid
            },
            success: function (datos) {
                alert("Cantidad cambiada en la base de datos");
            },
            error: function (error) {
                alert("Cantidd no cambiada en la base de datos");
            }
        });
    }
});
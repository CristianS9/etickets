var etickets = angular.module("etickets", []);

etickets.controller('eticketsController', function ($scope) {
    $scope.precio = 'ferrefer';

    $scope.SacarMensaje = function () {
        $scope.mensaje = "Hola " + $scope.nombre + "" + $scope.apellido;
    }
});

$(document).ready(function () {
    $(".cantidad").focusout(function () {
        var cantidad = $(this).val();
        var cantidadInicial = $(this).attr("originalValue");
        var id = $(this).attr('id');
        if (cantidad != cantidadInicial) {
            changeQuantity(cantidad, id);
            recalcularPrecioPorCantidades(); //Terminar esto, tiene que recalcular los datos de ese artículo
        }
    });

    $(".deleteButton").click(function () {
        var id = $(this).attr('id');
        deleteFromCart(id);
    });

    function changeQuantity(pcantidad, pid) {
        $.ajax({
            type: "POST",
            url: "ajax/EventDetail_Ajax/updateItemInCart",
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

    function deleteFromCart(pentradaId) {
        alert(pentradaId);
        $.ajax({
            type: "POST",
            url: "ajax/EventDetail_Ajax/deleteFromCart",
            data: {
                entradaId: pentradaId
            },
            success: function (datos) {
                alert("Borrado");
            },
            error: function (error) {
                alert("No borrado");
            }
        });
    }

    function recalcularPrecioPorCantidades(){

    }
});
$(document).ready(function () {

    // Funciones al cargar
    var 
    changeCartTotal();

    // Eventos

    $(".deleteButton").click(function () {
        var id = $(this).attr('id');
        deleteFromCart(id);
    });

    $(".cantidad").focusout(function () {
        var cantidad = $(this).val();
        var id = $(this).attr('id');
        if(cantidad!=0){
        // Ajax changeQuantity
        changeQuantity(cantidad, id);
        //Cambia el precio total de un elemento
        changeItemTotalSum(id, cantidad);
        //Total del carrito
        changeCartTotal();
        }else{
            var eliminar = confirm("¿Seguro que quieres borrar este elemento?");
            if(eliminar){
                deleteFromCart(id);
            }
        }
    });

    // Funciones

    function changeItemTotalSum(pid, pcantidad) {
        var precio = $(".precio" + pid).text();
        var precioNuevo = pcantidad * precio;
        $(".precioTotal" + pid).text(precioNuevo.toFixed(2));
    }


    function changeCartTotal() {
        var sum = 0;
        $('.precioTotal').each(function () {
            sum += parseFloat($(this).text()); // Or this.innerHTML, this.innerText
        });
        $("#total").text(sum.toFixed(2));
    }

    // Ajax

    function changeQuantity(pcantidad, pid) {
        $.ajax({
            type: "POST",
            url: "ajax/EventDetail_Ajax/updateItemInCart",
            data: {
                cantidad: pcantidad,
                idEntrada: pid
            },
            success: function (datos) {
                /* alert("Cantidad cambiada en la base de datos"); */
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
});
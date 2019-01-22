$(document).ready(function () {

    // Funciones al cargar

    changeCartTotal();

    // Eventos

    $(".deleteButton").click(function () {
        var id = $(this).attr('id');
        deleteFromCart(id);
    });

    $(".cantidad").focusout(function () {
        var cantidad = $(this).val();
        var id = $(this).attr('id');
        if (cantidad != 0) {
            // Ajax changeQuantity
            changeQuantity(cantidad, id);
            //Cambia el precio total de un elemento
            changeItemTotalSum(id, cantidad);
            //Total del carrito
            changeCartTotal();
        } else {
            var eliminar = confirm("¿Seguro que quieres borrar este elemento?");
            if (eliminar) {
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

    function showNotificacion(tipo, texto, titulo) {
        $.notify({
            title: titulo,
            message: texto,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        }, {
            allow_dismiss: "false",
            type: tipo,
            placement: {
                align: "center"
            }
        });
    }
    function deleteCartSection(pid){
        $("." + "seccionseccion" + pid).addClass('animated flipOutX');
        setTimeout(
            function () {
                $("." + "seccionseccion" + pid).remove();
            }, 1000);
        
    }

    function deleteFromCart(pentradaId) {
        if (confirm("¿Eliminar este artículo?")) {


            $.ajax({
                type: "POST",
                url: "ajax/EventDetail_Ajax/deleteFromCart",
                data: {
                    entradaId: pentradaId
                },
                success: function (datos) {
                    var tipo = 'success';
                    var texto = 'El artículo se ha eliminado.';
                    var titulo = '<strong>Correcto:</strong> <br>';
                    showNotificacion(tipo, texto, titulo);
                    deleteCartSection(pentradaId);

                },
                error: function (error) {
                    var tipo = 'danger';
                    var texto = 'Ha habido un error al borrar el artículo. Contacta con el administrador.';
                    var titulo = '<strong>Error:</strong> <br>';
                    showNotificacion(tipo, texto, titulo);
                }
            });


        } else {
            var tipo = 'warning';
            var texto = 'El artículo no se ha eliminado.';
            var titulo = '<strong>Atención:</strong> <br>';
            showNotificacion(tipo, texto, titulo);
        }
    }
    /*     $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        }) */
});
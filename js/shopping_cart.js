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
        var entradaEventoId = $(this).attr('entradaEventoId');
        if (cantidad != 0) {
            // Ajax changeQuantity
            changeQuantity(cantidad, id, entradaEventoId);

            //Cambia el precio total de un elemento
            changeItemTotalSum(id, cantidad);

            //Total del carrito
            changeCartTotal();
        } else {
            deleteFromCart(id);
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
        if (sum.toFixed(2) == 0) {
            $(".buyButton").remove();
            $("#resumen").html("Carrito vacío.");
            $("#descResumen").html("No hay ningún artículo en tu carrito.");
        }
    }

    // Ajax

    function changeQuantity(pcantidad, pid, pEntradaEventoId) {
        var returnDatos;
        $.ajax({
            type: "POST",
            url: "ajax/EventDetail_Ajax/updateItemInCart",
            data: {
                cantidad: pcantidad,
                idEntrada: pid,
                idEntradaEvento: pEntradaEventoId
            },
            success: function (datos) {
                datos = datos.trim();
                if (datos != "") {
                    $.notify({
                        title: "<b>Error: </b><br>",
                        message: "La cantidad que has escogido supera el máximo de entradas disponibles. El máximo que puedes comprar es " + datos + ".",
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        }
                    }, {
                        allow_dismiss: "true",
                        type: "danger",
                        placement: {
                            align: "right"
                        }
                    });
                    $(".input" + pid).val("1");
                    changeItemTotalSum(pid, 1);
                    changeCartTotal();
                } else {
                    $.notify({
                        title: "<b>Hecho: </b><br>",
                        message: "Cantidad actualizada.",
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        }
                    }, {
                        allow_dismiss: "true",
                        type: "info",
                        placement: {
                            align: "right"
                        }
                    });
                }
            },
            error: function (error) {
                var tipo = 'danger';
                var texto = 'Ha habido un error desconocido.';
                var titulo = '<strong>Error:</strong> <br>';
                showNotificacion(tipo, texto, titulo);
            }
        });
        return returnDatos;
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

    function deleteCartSection(pid) {
        $("." + "seccionseccion" + pid).addClass('animated flipOutX');
        setTimeout(
            function () {
                $("." + "seccionseccion" + pid).remove();
                changeCartTotal();
            }, 1000);
    }
    $(".buyButton").click(function () {
        pagar();
    });

    function pagar() {
        $(".buyButton").hide();
                        var procesando = $.notify({
                             title: "<b>Procesando... <i class='fas fa-spinner-third fa-spin'></i></b><br>",
                             message: "Realizando compra...",
                             animate: {
                                 enter: 'animated zoomIn',
                                 exit: 'animated zoomOut'
                             }
                         }, {
                             allow_dismiss: "true",
                             type: "info",
                             placement: {
                                 align: "center"
                             }
                         });
        $.ajax({
            type: "POST",
            url: "ajax/EventDetail_Ajax/completeShoppingCart",
            success: function (datos) {
                procesando.close();
                var tipo = 'success';
                var texto = 'Se han comprado los artículos seleccionados.';
                var titulo = '<strong>Correcto:</strong> <br>';
                showNotificacion(tipo, texto, titulo);

                $(".seccionCompras").each(function (index) {
                    $(this).remove();
                });
                $(".buyButton").remove();
                $("#resumen").html("¡Hecho!");
                $("#descResumen").html("Tu pedido se ha completado correctamente.");
            },
            error: function (error) {
                $(".buyButton").hide();
                var tipo = 'danger';
                var texto = 'Ha habido un error al generar la venta. Contacta con el administrador.';
                var titulo = '<strong>Error:</strong> <br>';
                showNotificacion(tipo, texto, titulo);
            }
        });
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
            $("." + "input" + pentradaId).val("1");
            changeItemTotalSum(pentradaId, "1");
            changeCartTotal();
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
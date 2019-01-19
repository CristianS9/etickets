$(document).ready(function () {
  $("#sendButton").click(function () {
    var textAreaLength = $("#pComent").val().length;
    textAreaLength = $.trim(textAreaLength);

    if (textAreaLength >= 10) {
      sendComment();
    } else {
      alert("El comentario tiene que tener como mínimo 10 caracteres");
    }
  });

  $(".addToCartButton").click(function () {
    //Comparar la cantidad
    var cantidadRestante = $(".contadorCantidad").attr('cantidadRestante');
    var id = $(this).attr('id');
    var cantidad = $("#" + id + "cantidad").val();
    if (cantidad == null || cantidad == undefined || cantidad == "0" || cantidad == "") {



      var tipo = 'warning';
      var texto = 'No has introducido ninguna cantidad.';
      var titulo = '<strong>Atención:</strong> <br>';
      showNotificacion(tipo, texto, titulo);



    } else {
      if (cantidad > cantidadRestante) {
        var tipo = 'warning';
        var texto = 'La cantidad de entradas introducida es mayor a la cantidad disponible.';
        var titulo = '<strong>Error:</strong> <br>';
        showNotificacion(tipo, texto, titulo);
      } else {
        addToCart(id, cantidad);
        cambiarContadorCantidad(id,cantidad);
      }
    }
  });

  function cambiarContadorCantidad(id,cantidad) {
    var cantidadRestante = $("." + id + "contador").attr('cantidadRestante');
    var cantidadTotal = $("." + id + "contador").attr('cantidadTotal');
    $("." + id + "contador").attr('cantidadRestante', cantidadRestante - cantidad);


    $("." + id + "contador").html((cantidadRestante-cantidad) + " / " + cantidadTotal);
    
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

  function sendComment() {
    var commentValue = $("#pComent").val();
    var eventId = $("#eventId").val();

    $.ajax({
      type: "POST",
      url: "../ajax/EventDetail_Ajax/sendComment",
      data: {
        eventId: eventId,
        comentario: commentValue
      },
      success: function (datos) {
        alert("Datos enviados correctamente");
      },
      error: function (error) {
        alert("Error al enviar los datos");
      }
    });
  }

  function addToCart(pentradaId, pcantidad) {
    $.ajax({
      type: "POST",
      url: "../ajax/EventDetail_Ajax/addItemToCart",
      data: {
        entradaId: pentradaId,
        cantidad: pcantidad
      },
      success: function (datos) {

        var tipo = 'success';
        var texto = 'El producto ha sido añadido a la cesta de la compra.';
        var titulo = '<strong>¡Hecho!</strong> <br>';
        showNotificacion(tipo, texto, titulo);
      },
      error: function (error) {
        var tipo = 'danger';
        var texto = 'Ha habido un problema al añadir el producto a la cesta de la compra.';
        var titulo = '<strong>Error:</strong> <br>';
        showNotificacion(tipo, texto, titulo);
      }
    });
  }


});
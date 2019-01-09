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
    var id = $(this).attr('id');
    var cantidad = $("#"+id + "cantidad").val();
    addToCart(id,cantidad);
  });

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



  function addToCart(pentradaId,pcantidad) {
    $.ajax({
      type: "POST",
      url: "../ajax/EventDetail_Ajax/addItemToCart",
      data: {
        entradaId: pentradaId,
        cantidad: pcantidad
      },
      success: function (datos) {
        alert("Añadido a la cesta");
      },
      error: function (error) {
        alert("No añadido a la cesta");
      }
    });
  }

});
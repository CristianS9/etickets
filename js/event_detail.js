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
    addToCart(id);
  });

  function sendComment() {
    var commentValue = $("#pComent").val();
    var eventId = $("#eventId").val();

    $.ajax({
      type: "POST",
      url: "../Ajax_SendComment/sendComment",
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



  function addToCart(pentradaId) {
    $.ajax({
      type: "POST",
      url: "../Ajax_AddToCart/addItemToCart",
      data: {
        entradaId: pentradaId
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
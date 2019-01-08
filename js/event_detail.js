$(document).ready(function() {
  $("#sendButton").click(function() {
    var textAreaLength = $("#pComent").val().length;
    textAreaLength = $.trim(textAreaLength);

    if (textAreaLength >= 10) {
      sendComment();
    } else {
      alert("El comentario tiene que tener como mínimo 10 caracteres");
    }
  });

  function sendComment() {
    var commentValue = $("#pComent").val();
    var eventId = $("#eventId").val();

    $.ajax({
      type: "POST",
      url: "../Ajax_SendComment/sendComment",
      data: {
        userId: 1,
        eventId: eventId,
        comentario: commentValue
      },
      success: function(datos) {
        alert("Datos enviados correctamente");
      },
      error: function(error) {
        alert("Error al enviar los datos");
      }
    });
  }



  function addToCart() {
    
    $.ajax({
      type: "POST",
      url: "../Ajax_AddToCart/addItemToCart",
      data: {
        userId: 1,
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

  });
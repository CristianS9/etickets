
$(document).ready(function () {

alert("Todo cargado");
$("#sendButton").click(function () {
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
    
    $.ajax({
        type: "GET",
        url: "../Ajax_SendComment/sendComment",
        data: {
            "userId": 1,
            "eventId":3,
            "comentario": commentValue
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
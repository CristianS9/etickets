
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

function sendComment() {
    var commentValue = $("#pComent").val();
    $.ajax({
        url: "ajax/sendCommentAjax.php",
        data: {
            "id": id
        },
        type: "POST",
        dataType: "json",
        success: function (datos) {
           
            
        },
        error: function (error) {
      
            
        }
    });
}

});
$(document).ready(function(){
   
    $(".barrita").each(function(){
        var id = $(this).attr("id");
        $("#" + id).JsBarcode(id,
        	{
                displayValue: false,
                width:2,
                height:65,
                margin:0
        	})
        	.render();;
    });
    window.print();
});
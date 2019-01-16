$(document).ready(function() {

    $('.ventana').click(function() {
        var elemento = $(this).attr('elemento');
        $('.jumbotron').hide();
        $('#'+elemento).fadeIn();
    });

    $('.modificar').on('click','.editar',function() {
        editar(this);
    });

    function editar(padre) {
        var padre = $(padre).parent().parent();
        var elemento = $(padre).find('div.info').attr('elemento').trim();
        var dato = $(padre).find('div.data').html().trim();
        var input = "<input value=\""+dato+"\" name=\""+elemento+"\">";
        var enviar = "<span class=\"glyphicon glyphicon-ok boton enviar\"></span>";
        var cancelar = "<span class=\"glyphicon glyphicon-remove boton enviar\"></span>";
        $(padre).find('div.data').remove();
        $(padre).find('div.botones').html('');
        $(padre).find('div.info').after(input);
        $(padre).find('input').after(enviar);
        $(padre).find('span').after(cancelar);
        
    }
    function enviar() {
        
    }
});
$(document).ready(function() {
    var g = {};
    g.modificando = false;
    $('.ventana').click(function() {
        var elemento = $(this).attr('elemento');
        $('.jumbotron').hide();
        $('#'+elemento).fadeIn();
    });

    $('.modificar').on('click','.editar',function() {
        editar(this);
    });
    $('.modificar').on('click','.enviar',function() {
        enviar(this);
    });
    $('.modificar').on('click','.cancelar',function() {
        cancelar(this);
    });

    function editar(padre) {
        if(!g.modificando){
            g.modificando = true;
            var padre = $(padre).parent().parent();
            g.seleccionado = $(padre).html();
            
            var elemento = $(padre).find('div.info').attr('elemento').trim();
            var dato = $(padre).find('div.data').html().trim();
            var input = "<input class=\"data\" value=\""+dato+"\" name=\""+elemento+"\">";
            var enviar = "<span class=\"glyphicon glyphicon-ok boton enviar\"></span>";
            var cancelar = "<span class=\"glyphicon glyphicon-remove boton cancelar\"></span>";
            $(padre).find('div.data').remove();
            $(padre).find('div.botones').html('');
            $(padre).find('div.info').after(input);
            $(padre).find('input').after(enviar);
            $(padre).find('span.enviar').after(cancelar);
        }
    }
    
    function enviar(padre) {
        var padre = $(padre).parent().parent();
        var dato = $(padre).find('input.data').val().trim();
        var columna = $(padre).find('div.info').attr('elemento').trim();
        // alert(dato);
        $.ajax({
            type: "POST",
            url: "ajax/Perfil_Ajax/modPerfil",
            data: {
                dato: dato,
                columna: columna
            },
            success: function (datos) {
                $.notify({
                    title: '<strong>Modificado correctamente!</strong>',
                    message: 'No se ha producido ningun error.',
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    }
                }, {
                    type: 'success'
                });
            },
            error: function (error) {
                $.notify({
                    title: '<strong>Ha habido un problema</strong>',
                    message: 'Si el problema persiste ponte en contacto.',
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    }
                }, {
                    type: 'danger'
                });
            }
        });
    }

    function cancelar(padre) {
        $(padre).parent().html(g.seleccionado);
        g.modificando = false;
    }
});
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
        validar();
    });
    $('.modificar').on('click','.cancelar',function() {
        cancelar(this);
    });

    function validar(){
        checkUsername();
    }

    function checkUsername() {
        var username = $('.linea').find('input.data').val().trim();
        console.log("Username: "+username);
        if (username == "") {
            return false;
        }else if(username.length < 4){
            console.log("menor");
            return false;
        }else if(username.length > 20){
            console.log("mayor que 20");
            return false;
        } 
    }
    function checkPass() {
        var pass = $('.linea').find('input.data').val().trim();

    }
    function checkNombre() {
        var nombre = $('.linea').find('input.data').val().trim();

    }
    function checkApellido() {
        var apellido = $('.linea').find('input.data').val().trim();

    }
    function checkCorreo() {
        var correo = $('.linea').find('input.data').val().trim();

    }
    function checkTelefono() {
        var telefono = $('.linea').find('input.data').val().trim();

    }
    function editar(padre) {
        if(!g.modificando){
            g.modificando = true;
            var padre = $(padre).parent().parent();
            g.seleccionado = $(padre).html();
            
            var elemento = $(padre).find('div.info').attr('elemento').trim();
            var dato = $(padre).find('div.data').html().trim();
            var input = "<input class=\"data\" value=\""+dato+"\" name=\""+elemento+"\">";
            var inputPass = "<input class=\"data\" type=\"password\" value=\""+dato+"\" name=\""+elemento+"\">";
            var enviar = "<span class=\"glyphicon glyphicon-ok boton enviar\"></span>";
            var cancelar = "<span class=\"glyphicon glyphicon-remove boton cancelar\"></span>";
            $(padre).find('div.data').remove();
            $(padre).find('div.botones').html('');

            if (elemento == "contrasena") {
                $(padre).find('div.info').after(inputPass);
                
            } else {
                $(padre).find('div.info').after(input);
                
            }
            $(padre).find('input').after(enviar);
            $(padre).find('span.enviar').after(cancelar);
        }
    }
    
    function enviar(padre) {
        var linea = $(padre).parent();
        var dato = $(linea).find('input.data').val().trim();
        var columna = $(linea).find('div.info').attr('elemento').trim();
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
                    var antes = $(padre).parent().html(g.seleccionado);
                    var nuevo = "<div class=\"data\">"+dato+"</div>";
                    var pass = "<div class=\"data\">*******</div>";
                    var boton = "<span class=\"glyphicon glyphicon-pencil boton editar\"></span>";
                    
                    
                    
                    $(antes).find("div.data").remove();
                    $(padre).find('div.botones').html('');
                    
                    if (columna == "contrasena") {
                        $(antes).find('div.info').after(pass);
                        $(antes).find('div.botones').html(boton);
                        
                    } else {
                        $(antes).find('div.info').after(nuevo);
                        $(antes).find('div.botones').html(boton);
                        
                    }
                    
                    
                    g.modificando = false;
                    
                },
                error: function (error) {
                notifError("Error al modificar.");
            }
        });
    }

    function cancelar(padre) {
        $(padre).parent().html(g.seleccionado);
        g.modificando = false;
    }

    function notifError(texto) {
        $.notify({
            title: '<strong>Ha habido un problema!</strong>',
            message: texto,
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        }, {
            type: 'warning'
        });
    }
});
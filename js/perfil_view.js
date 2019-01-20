$(document).ready(function () {
    var g = {};
    g.modificando = false;
    $('.ventana').click(function () {
        var elemento = $(this).attr('elemento');
        $('.jumbotron').hide();
        $('#' + elemento).fadeIn();
    });

    $('.compra').click(function () {
        var elemento = $(this).closest('tr').next('tr');
        $(elemento).fadeToggle();
    });

    $('.modificar').on('click', '.editar', function () {
        editar(this);
    });
    $('.modificar').on('click', '.enviar', function () {
        validar(this);
    });
    $('.modificar').on('click', '.cancelar', function () {
        cancelar(this);
    });



    function validar(padre) {
        var linea = $(padre).parent();
        var elemento = $(linea).find("div.info").attr("elemento").trim();
        var correcto;
        if ("usuario" == elemento) {
            correcto = checkUsername();
        } else if ("contrasena" == elemento) {
            correcto = checkPass();
        } else if ("nombre" == elemento) {
            correcto = checkNombre();

        } else if ("apellidos" == elemento) {
            correcto = checkApellido();
        } else if ("email" == elemento) {
            correcto = checkCorreo();
        } else if ("telefono" == elemento) {
            correcto = checkTelefono();
        }
        if(correcto){
            enviar(padre);
        }else{
            notifError("El campo no cumple los requisitos.");
        }
    }

    function checkUsername() {
        var username = $('.linea').find('input.data').val().trim();

        if ("" == username || username.length < 4 || username.length > 20) {
            return false;
        } else {
            return true;
        }
    }

    function checkPass() {
        var pass = $('.linea').find('input.data').val().trim();
        var regPass = new RegExp('^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$');

        if ("" == pass || pass.length < 4 || pass.length > 20) {
            return false;
        } else if (pass.match(regPass)) {//TODO
            console.log("entra");
        } else{
            return true;
        }
    }
    
    function checkNombre() {
        var nombre = $('.linea').find('input.data').val().trim();
        
        if ("" == nombre || nombre.length < 4 || nombre.length > 20) {
            return false;
            
        } else{
            return true;
        }
    }

    function checkApellido() {
        var apellido = $('.linea').find('input.data').val().trim();
        if ("" == apellido || apellido.length < 4 || apellido.length > 30) {
            return false;
        } else {
            return true;
        }
    }

    function checkCorreo() {
        var correo = $('.linea').find('input.data').val().trim();
        if ("" == correo || correo.length < 4 || correo.length > 25) {
            return false;
        } else {
            return true;
        }
    }

    function checkTelefono() {
        var telefono = $('.linea').find('input.data').val().trim();
        if ("" == telefono || telefono.length < 4 || telefono.length > 25) {
            return false;
        } else {
            return true;
        }
    }

    function editar(padre) {
        if (!g.modificando) {
            g.modificando = true;
            var padre = $(padre).parent().parent();
            g.seleccionado = $(padre).html();

            var elemento = $(padre).find('div.info').attr('elemento').trim();
            var dato = $(padre).find('div.data').html().trim();
            var input = "<input class=\"data\" value=\"" + dato + "\" name=\"" + elemento + "\">";
            var inputPass = "<input class=\"data\" type=\"password\" value=\"" + dato + "\" name=\"" + elemento + "\">";
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
                var nuevo = "<div class=\"data\">" + dato + "</div>";
                var pass = "<div class=\"data\">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</div>";
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
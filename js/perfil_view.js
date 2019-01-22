var g = {};
g.modificando = false;
var cambiar = {};

$(document).ready(function () {
    cambioPestañas_activo();
    verCompras_activo();
    botonesEdicion_activos();


    
});

function cambioPestañas_activo(){
    $('.ventana').click(function () {
        var elemento = $(this).attr('elemento');
        $('.jumbotron').hide();
        $('#' + elemento).fadeIn();
    });
}
function verCompras_activo(){
    $('.compra').click(function () {
        var elemento = $(this).closest('tr').next('tr');
        $(elemento).fadeToggle();
    });
}
function botonesEdicion_activos(){
    $('.modificar').on('click', '.editar', function () {
        editar(this);
    });
    $('.modificar').on('click', '.enviar', function () {
        enviar(this);
    });
    $('.modificar').on('click', '.cancelar', function () {
        cancelar();
    });
}

function editar(boton){
    if(!g.modificando){
        g.modificando = true;
        divEdicion(boton);
  
    }
}
function divEdicion(boton){
    // Obtiene los datos
    var padre = $(boton).parent().parent();
    g.seleccionado = $(padre).html();
    g.padre = padre;

    var elemento = $(padre).find('div.info').attr('elemento').trim();
    var dato = $(padre).find('div.data').html().trim();


    // Establece el tipo de input
    var type = "text";
    if (elemento == "contrasena") {
        type = "password";
    } else if (elemento == "telefono") {
        type = "number"
    }


    // prepara los elementos
    var input = '<input class="data" type="' + type + '" value="' + dato + '" name="' + elemento + '">';
    var enviar = "<span class=\"glyphicon glyphicon-ok boton enviar\"></span>";
    var cancelar = "<span class=\"glyphicon glyphicon-remove boton cancelar\"></span>";
 

    // Borra elementos
    $(padre).find('div.data').remove();
    $(padre).find('div.botones').html('');


    // Modifica el DOOOM
    $(padre).find('div.info').after(input);
    $(padre).find('div.botones').append(enviar);
    $(padre).find('div.botones').append(cancelar); 
}

function cancelar() {
    $(g.padre).html(g.seleccionado);
    g.modificando = false;
}
function enviar(boton){
    var padre = $(boton).parent().parent();
    g.elemento = $(padre).find("div.info").attr("elemento").trim();
    g.dato = $(padre).find('input.data').val().trim();    
    cambiar[g.elemento](g.dato);

}

cambiar["usuario"] = function(usuario) {
    $.ajax({
        type: "post",
        url: "ajax/perfil/usuarioExiste",
        data: {
            "usuario": usuario
        },
        success: function (datos) {
            var existe = JSON.parse(datos);
           
            if (existe) {
                notificacion("Este usuario ya existe"); 
            } else if ("" == usuario || usuario.length < 5 || usuario.length > 20) {
                notificacion("El nombre de usuario debde contener entre 5 y 20 caracteres");
            }  else {
                modificarDato();
            } 
        }
    }); 
}

cambiar["contrasena"] = function(dato) {
    var regPass = /^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$/;

    if ("" == dato || dato.length < 4 || dato.length > 20 || !dato.match(regPass)) {
       return false;
    } else {
        return true;
    } 
 
}
cambiar["nombre"] = function(dato) {
    console.log(dato);
}
cambiar["appelidos"] = function(dato) {
    console.log(dato);
}
cambiar["email"] = function(dato) {
    console.log(dato);
}
cambiar["telefono"] = function(dato) {
    console.log(dato);
}

function modificarDato(){
     $.ajax({
         type: "post",
         url: "ajax/perfil/modificarDato",
         data: {
             "elemento": g.elemento,
             "dato": g.dato
         },
         success: function (respuesta) {
            cancelar();                
            actualizarDato();
        }
     });
}
function actualizarDato(){
    $(g.padre).find("div."+g.elemento).html(g.dato);
}


/*

function validar(padre) {
    var linea = $(padre).parent();
    var elemento = $(linea).find("div.info").attr("elemento").trim();
    var correcto = true;

    if ("usuario" == elemento) {
        ajaxUsername(elemento, padre);

    } else if ("contrasena" == elemento) {
        correcto = checkPass();
    } else if ("nombre" == elemento) {
        correcto = checkNombre();

    } else if ("apellidos" == elemento) {
        correcto = checkApellido();
    } else if ("email" == elemento) {
        ajaxCorreo();
    } else if ("telefono" == elemento) {
        correcto = checkTelefono();
    }
    if (true == correcto) {
        if ("email" != elemento || "usuario" != elemento) {
            enviar(padre);
        }
    } else {
        notifError("El campo no cumple los requisitos.");
    }
}

function checkUsername(existe, padre) {
    var username = $('.linea').find('input.data').val().trim();
    console.log("username Pillado: " + username);

    if ("" == username || username.length < 4 || username.length > 20 || "false" == existe) {
        enviar(padre);
    } else {
        console.log("Usuario no cumple los requisitos");
    }
}

function checkPass() {
    var pass = $('.linea').find('input.data').val().trim();
    var regPass = new RegExp('^\S*(?=\S{4,})(?=\S*[a-z])(?=\S*[\W])(?=\S*[A-Z])(?=\S*[\d])\S*$');

    if ("" == pass || pass.length < 4 || pass.length > 20) {
        return false;
    } else if (pass.match(regPass)) {//TODO
        console.log("entra");
    } else {
        return true;
    }
}

function checkNombre() {
    var nombre = $('.linea').find('input.data').val().trim();

    if ("" == nombre || nombre.length < 4 || nombre.length > 20) {

        return false;
    } else {
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

function ajaxUsername(username, padre) {

    $.ajax({
        type: "POST",
        url: "ajax/Perfil_Ajax/checkUser",
        data: {
            username: username
        },
        success: function (datos) {
            checkUsername(datos, padre);
        },
        error: function (error) {

        }
    });

}
function ajaxCorreo(correo) {

}
function enviar(padre) {
    var linea = $(padre).parent();
    var dato = $(linea).find('input.data').val().trim();
    var columna = $(linea).find('div.info').attr('elemento').trim();
    // console.log("Dato: "+dato);
    // console.log("Columna: "+columna);
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

*/

function notificacion(texto) {
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

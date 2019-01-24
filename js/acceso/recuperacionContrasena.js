var g = {};
g.usuario = false;
g.telefono = false;
g.email = false;

var main = angular.module('main', []);
main.controller('content', function ($scope, $http) {
    var app = $scope;
    app.todoCorrecto = false;
    app.contador= 5;

	app.cambio = function (elemento) {
        var dato = app["rec_" + elemento];
        if ((elemento== "email" || elemento == "usuario") && dato.length >= 5 && dato.length <=30 ) {
            app.existe(elemento,dato);
        }else if(elemento=="telefono" && dato>99999999 && dato<1000000000){{
            app.existe(elemento,dato);
        }}
    }  
    app.vaciar = function(elemento){
        app["rec_"+elemento] = "";
        g[elemento] = false;
        app.actualizar();
    }
    app.existe = function(elemento,dato){
        $http({
            url: 'ajax/acceso/recuperacionExiste',
            method: "POST",
            data: "elemento=" + elemento + "&dato=" + dato,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function (res) {
            res.data = res.data.trim();
   
            if(res.data == "1"){
                g[elemento]= true;
            } else{
                g[elemento] = false;
            }

            app.actualizar();
        },function (error) {
           
        });
    }

    app.actualizar = function(){
     
        if(g.email & (g.usuario || g.telefono)){
            app.todoCorrecto = true;
        } else{
            app.todoCorrecto = false;
        }
    };
    app.mostrarNotificacion = function(){
        $(".wrap-login100").css("display","none");
        $(".links").html("display","none");

        $(".notificacion").css("display", "grid");
        rellenarBarra();
    }
    
});
var numero = 5;
var repeticion;
function rellenarBarra(){
   repeticion = setInterval(aumentoBarra, 10);
}
function aumentoBarra(){
    if (numero >= 100){
        clearInterval(repeticion);
        $("form").submit();
    } 
        
    numero += 5/50;
    $(".barra").css("width",numero+"%");
   
}

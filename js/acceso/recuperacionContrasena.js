var main = angular.module('main', []);
main.controller('content', function ($scope, $http) {
	var app = $scope;
    app.todoCorrecto = false;
	/* $http.get('json/datoscombo1.json')
		.then(function (res) {
			app.categorias = res.data;
		});
*/
	app.cambio = function (elemento) {
        var dato = app["rec_" + elemento];
        if ((elemento== "email" || elemento == "usuario") && dato.length >= 5 && dato.length <=20 ) {
            app.existe(elemento,dato);
        }else if(elemento=="telefono" && dato>99999999 && dato<1000000000){{
            app.existe(elemento,dato);
        }}
    }  
    app.vaciar = function(elemento){
        app["rec_"+elemento] = "";
        
    }
    app.existe = function(elemento,dato){
        $http.get('ajax/acceso/recuperacionExiste/' + elemento + "/" + dato)
        .then(function (res) {
            console.log(res.data);
        }, function (error) {
            console.log(error);
        });
    }

    
    
});

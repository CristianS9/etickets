<!DOCTYPE html>
<html ng-app="main">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <?php echo link_tag("css/acceso/recuperacionContrasena.css"); ?>

    <script src="<?php echo base_url();?>lib/angular.js"></script>

    <script src="<?php echo base_url();?>js/acceso/recuperacionContrasena.js"></script>
</head>
<body ng-controller="content">
    <h2>Para otorgarte acceso a tu cuenta necesitamos que nos proporciones los siguientes datos:</h2>
    <?php echo form_open("recupearcionContrasena"); ?> 
        <label>
            <span>Correo electronico</span>
            <input type="text" name="rec_email" ng-model="rec_email" ng-change="cambio('email')">
        </label>
        <div>
            <label>
                <span>Nombre de usuario</span>
                <input type="text" name="rec_usuario" ng-model="rec_usuario" ng-change="cambio('usuario')" ng-click="vaciar('telefono')"/>    
            </label>
            <span>---  O ----</span>
            
            <label> 
                <span>Numero de telefono</span>
                <input type="number" name="rec_telefono" ng-model="rec_telefono" ng-change="cambio('telefono')" ng-click="vaciar('usuario')"/>
            </label>
        </div>
        <input type="submit" value="Mandar Correo" ng-show="todoCorrecto"
    </form>
</body>
</html>
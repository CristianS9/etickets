<!DOCTYPE html>
<html ng-app="main">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Estilos -->
    <?php echo link_tag("css/acceso/recuperacionContrasena.css"); ?>
    
    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
    <script src="<?php echo base_url();?>js/acceso/recuperacionContrasena.js"></script>
</head>
<body>
    <h2>Para otorgarte acceso a tu cuenta necesitamos que nos proporciones los siguientes datos:</h2>
    <?php echo form_open("recupearcionContrasena"); ?> 
        <label>
            <span>Correo electronico</span>
            <input type="number" name="rec_email">
        </label>
        <label>
            <span>Nombre de usuario</span>
            <input type="text" name="rec_usuario"/>    
        </label>
        <span>---  O ----
        <label> 
            <span>Numero de telefono</span>
            <input type="number" name="rec_telefono"/>
        </label>
    </form>
</body>
</html>
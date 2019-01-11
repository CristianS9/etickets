<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag("css/login.css"); ?>
    <script src="<?php echo base_url();?>js/login.js"></script>
</head>
<body>
    <form action="acceso" method="post">
        <label>
            <h5>Usuario</h5>
            <input type="text" name="log_usuario">
        </label>
        <label>
            <h5>Contraseña</h5>
            <input type="password" name="log_contrasena">
        </label><br>
        <input type="submit" value="Login">
    </form>
    <a href="<?php echo base_url();?>index.php/acceso/registro">Registro</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag("css/registro.css"); ?>
    <script src="<?php echo base_url()?>js/registro.js"></script>
</head>
<body>
    <form action="registro" method="post">
        <label>
            <h5>Usuario</h5>
            <input type="text" name="reg_usuario">
        </label>
        <label>
            <h5>Contraseña</h5>
            <input type="password" name="reg_contrasena">
        </label>
        <label>
            <h5>Repita Contraseña</h5>
            <input type="password" name="reg_r_contrasena">
        </label>
        <label>
            <h5>Nombre</h5>
            <input type="text" name="reg_nombre">
        </label>
        <label>
            <h5>Apellidos</h5>
            <input type="text" name="reg_apellidos">
        </label>
        <label>
            <h5>Email</h5>
            <input type="text" name="reg_email">
        </label>
        <label>
            <h5>Telefono</h5>
            <input type="number" name="reg_telefono">
        </label><br>
        <input type="submit" value="registrar">
    </form>
</body>
</html>
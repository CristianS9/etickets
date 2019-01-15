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

    <?php echo form_open('acceso/login'); ?>
        <?php echo form_error('credenciales', '<div class="notificacion">', '</div>'); ?>
        <label>
            <h5>Usuario</h5>
            <input type="text" name="log_usuario" value="<?php if(isset($usuario)){echo $usuario;};?>">
        </label>
        <label>
            <h5>Contraseña</h5>
            <input type="password" name="log_contrasena">
        </label><br>
        <input type="submit" value="Login">
    </form>
    <?php echo anchor("acceso/registro","Registrarme");?>

</body>
</html>
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
  
    <?php echo form_open('acceso/registrar'); ?>
        <label>
            <h5>Usuario</h5>
            <?php echo form_error('reg_usuario', '<div class="notificacion">', '</div>'); ?>
            <input type="text" name="reg_usuario" value="<?php if(isset($usuario)){echo $usuario;};?>">
        </label>
        <label>
            <h5>Contraseña</h5>
            <?php echo form_error('reg_contrasena', '<div class="notificacion">', '</div>'); ?>
            <input type="password" name="reg_contrasena">
        </label>
        <label>
            <h5>Repita Contraseña</h5>
            <?php echo form_error('reg_r_contrasena', '<div class="notificacion">', '</div>'); ?>
            <input type="password" name="reg_r_contrasena">
        </label>
        <label>
            <h5>Nombre</h5>
            <?php echo form_error('reg_nombre', '<div class="notificacion">', '</div>'); ?>
            <input type="text" name="reg_nombre" value="<?php if(isset($nombre)){echo $nombre;};?>">
        </label>
        <label>
            <h5>Apellidos</h5>
            <?php echo form_error('reg_apellidos', '<div class="notificacion">', '</div>'); ?>
            <input type="text" name="reg_apellidos" value="<?php if(isset($apellidos)){echo $apellidos;};?>">
        </label>
        <label>
            <h5>Email</h5>
            <?php echo form_error('reg_email', '<div class="notificacion">', '</div>'); ?>
            <input type="text" name="reg_email" value="<?php if(isset($email)){echo $email;};?>">
        </label>
        <label>
            <h5>Telefono</h5>
            <?php echo form_error('reg_telefono', '<div class="notificacion">', '</div>'); ?>
            <input type="number" name="reg_telefono" value="<?php if(isset($telefono)){echo $telefono;};?>">
        </label><br>
        <input type="submit" value="registrar">
        <?php echo anchor("login","Ya tengo cuenta");?>
    </form>
</body>
</html>
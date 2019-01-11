<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>

<?php 
    if (isset($error)) {
        echo $error;
    }

    echo form_open_multipart("Evento_Controller/add_evento_view");
?>
    
    <label for="ev_nombre">Nombre: </label>
    <?php echo form_error('ev_nombre','<div class="notificacion">','</div>');?>
    <input name="ev_nombre" type="text"><br>

    <label for="ev_descripcion">Descripcion: </label>
    <?php echo form_error('ev_descripcion', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_descripcion" type="text"><br>

    <label for="ev_precio">Precio: </label>
    <?php echo form_error('ev_precio', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_precio" type="number"><br>

    <label for="ev_cantidad">Cantidad: </label>
    <?php echo form_error('ev_cantidad', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_cantidad" type="number"><br>

    <label for="ev_fecha_inicio"> Fecha inicio: </label>
    <?php echo form_error('ev_fecha_inicio', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_fecha_inicio" type="date"><br>
    
    <label for="ev_fecha_fin">Fecha fin: </label>
    <?php echo form_error('ev_fecha_fin', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_fecha_fin" type="date"><br>
    
    <label for="ev_provincia">Provincia</label>
    <?php echo form_error('ev_provincia', '<div class="notificacion">', '</div>'); ?>
    <select name="ev_provincia">
    <?php
        foreach ($provincias as $aux) {
            echo "<option value=\" $aux->id \"> ". $aux->nombre ." </option>";
        }
    ?>
    </select><br>

    <label for="ev_sitio">Sitio: </label>
    <?php echo form_error('ev_sitio', '<div class="notificacion">', '</div>'); ?>
    <input name="ev_sitio" type="text"><br>
    
    <label for="ev_imagen">Imagen: </label>
    <?php echo form_error('ev_imagen', '<div class="notificacion">', '</div>');?>
    <input name="ev_imagen" type="file">
    <br>
    <input type="submit">
</form>
</body>
</html>

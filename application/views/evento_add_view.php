<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<form action="<?php echo base_url(); ?>index.php/Evento_Controller/add_evento" method="post">
    
    <label for="nombre">Nombre: </label>
    <input name="nombre" type="text"><br>

    <label for="descripcion">Descripcion: </label>
    <input name="descripcion" type="text"><br>

    <label for="precio">Precio: </label>
    <input name="precio" type="text"><br>

    <label for="cantidad">Cantidad: </label>
    <input name="cantidad" type="text"><br>

    <label for="fecha_inicio"> Fecha inicio: </label>
    <input name="fecha_inicio" type="date"><br>
    
    <label for="fecha_fin">Fecha fin: </label>
    <input name="fecha_fin" type="date"><br>
    
    <label for="provincia">Provincia</label>
    <select name="provincia">
    <?php
        foreach ($provincias as $aux) {
            echo "<option value=\" $aux->id \"> ". $aux->nombre ." </option>";
        }
    ?>
    </select><br>

    <label for="sitio">Sitio: </label>
    <input name="sitio" type="text"><br>

    <br>

    <input type="submit">
</form>
</body>
</html>

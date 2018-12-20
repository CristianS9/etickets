<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

</head>
<body>

    <?php
    foreach ($eventos as $aux) {
    ?>
    <form action="<?php echo base_url(); ?>index.php/Evento_Controller/mod_evento" method="post">
        <input name="id" type="hidden" value="<?php echo $aux->id?>">

        <label for="nombre">Nombre: </label>
        <input name="nombre" type="text" value="<?php echo $aux->nombre?>"><br>

        <label for="descripcion">Descripcion: </label>
        <input name="descripcion" type="text" value="<?php echo $aux->descripcion?>"><br>

        <label for="fecha_inicio"> Fecha inicio: </label>
        <input name="fecha_inicio" type="date" value="<?php echo $aux->fecha_inicio?>"><br>
        
        <label for="fecha_fin">Fecha fin: </label>
        <input name="fecha_fin" type="date" value="<?php echo $aux->fecha_fin?>"><br>
        
        <label for="provincia">Provincia</label>
        <select name="provincia">
        <?php
            foreach ($provincias as $linea) {
                $seleccionado ="";
                if($aux->idProvincia==$linea->id){
                    $seleccionado = "selected";
                }
                echo "<option value=\"$linea->id\" $seleccionado> ". $linea->nombre ." </option>";
            }
        ?>
        </select><br>

        <label>
            Sitio:
            <input name="sitio" type="text" value="<?php echo $aux->sitio?>"><br>
         </label>

        <br>

        <input type="submit">
    </form>       
    <?php
    }
    ?>
</body>
</html>
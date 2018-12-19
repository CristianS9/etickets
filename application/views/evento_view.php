<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <a href = "<?php echo base_url(); ?>index.php/Evento_Controller/add_evento_view">Add</a><br><br>
    <a href="<?php echo base_url(); ?>index.php/Evento_Controller/del_evento_view"></a>

    <table border="1"> 
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>fecha_inicio</td>
            <td>fecha_fin</td>
            <td>idProvincia</td>
            <td>sitio</td>
            
        </tr>
    <?php
    foreach ($todo as $aux) {
        echo "<tr>";
        echo "<td>". $aux->id ."</td>";
        echo "<td>". $aux->nombre ."</td>";
        echo "<td>". $aux->descripcion ."</td>";
        echo "<td>". $aux->fecha_inicio ."</td>";
        echo "<td>". $aux->fecha_fin ."</td>";
        echo "<td>". $aux->idProvincia ."</td>";
        echo "<td>". $aux->sitio ."</td>";
        echo "<td><a href=\"Evento_Controller/del_evento/".$aux->id."/\">Eliminar</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>
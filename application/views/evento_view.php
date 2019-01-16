<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <a href = "<?php echo base_url(); ?>index.php/Evento_Controller/add_evento_view">Add</a><br><br>

    <table border="1">
        <tr>
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>fecha_inicio</td>
            <td>fecha_fin</td>
            <td>idProvincia</td>
            <td>sitio</td>
            <td>Imagen</td>
            <td>Modificar</td>
            <td>Eliminar</td>
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

        $url1 = "fotos/".$aux->id.".jpg";
        $url2 = "fotos/".$aux->id.".png";
        $url3 = "fotos/".$aux->id.".jpeg";

        if (file_exists($url1)) {
            echo "<td><img src=\"". base_url() . "fotos/" .$aux->id.".jpg\"></td>";
        } elseif (file_exists($url2)) {
            echo "<td><img src=\"" . base_url() . "fotos/" . $aux->id . ".png\"></td>";
        } elseif (file_exists($url3)) {
            echo "<td><img src=\"" . base_url() . "fotos/" . $aux->id . ".jpeg\"></td>";
        } else {
            echo "<td><img src=\"". base_url() . "fotos/0.jpg\"></td>";
        }

        echo "<td><a href=\"Evento_Controller/mod_evento_view/".$aux->id."/\">Editar</a></td>";
        echo "<td><a href=\"". base_url() ."index.php/Evento_Controller/del_evento/".$aux->id."/\">Eliminar</a></td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>
<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
<!--</head>

<body>
     -->


<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php echo link_tag("css/evento_view.css");?>
    <title>Eventos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">etickets</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table table-bordered rowMargen">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Fecha_inicio</td>
                    <td>Fecha_fin</td>
                    <td>idProvincia</td>
                    <td>sitio</td>
                    <td>Imagen</td>
                    <td><a href="<?php echo base_url(); ?>index.php/eventos/nuevo">Add</a></td>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($todo as $aux) {
                    echo "<tr>";
                    echo "<td class=\"align-middle\">". $aux->id ."</td>";
                    echo "<td class=\"align-middle\">". $aux->nombre ."</td>";
                    echo "<td class=\"align-middle\">". $aux->descripcion ."</td>";
                    echo "<td class=\"align-middle\">". $aux->fecha_inicio ."</td>";
                    echo "<td class=\"align-middle\">". $aux->fecha_fin ."</td>";
                    echo "<td class=\"align-middle\">". $aux->idProvincia ."</td>";
                    echo "<td class=\"align-middle\">". $aux->sitio ."</td>";

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

                    echo "<td class=\"align-middle\"><a href=\"". base_url() ."index.php/eventos/modificar/".$aux->id."/\">Editar</a></td>";
                    echo "<td class=\"align-middle\"><a href=\"". base_url() ."index.php/Evento_Controller/del_evento/".$aux->id."/\">Eliminar</a></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>


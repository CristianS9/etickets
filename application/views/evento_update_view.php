<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <?php echo link_tag("css/evento_view.css");?>
    <title>Modifar evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">etickets</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container py-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <?php 
                foreach ($eventos as $aux) {
                echo form_open("Evento_Controller/mod_evento", 'id="formEventoMod"'); ?>

                <h1 class="text-center">Modificar Evento</h1>

                <div class="form-group row">
                    <label class="col-sm-6" for="nombre">Nombre:</label>
                    <input type="text" class="col-sm-5" class="form-control" value="<?php echo $aux->nombre?>" name="nombre">
                </div>

                <div class="form-group row">
                    <label class="col-sm-6" for="descripcion">Descripcion:</label>
                    <input type="text" class="col-sm-5" class="form-control" value="<?php echo $aux->descripcion?>" name="descripcion">
                </div>

                <div class="form-group row">
                    <label class="col-sm-6" for="fecha_inicio">Fecha inicio:</label>
                    <input type="date" class="col-sm-5" class="form-control" name="fecha_inicio" value="<?php echo $aux->fecha_inicio?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-6" for="fecha_fin">Fecha fin:</label>
                    <input type="date" class="col-sm-5" class="form-control" name="fecha_fin" value="<?php echo $aux->fecha_fin?>">
                </div>

                <div class="form-group row">
                    <label class="col-sm-5" for="provincia">Provincia:</label>
                    <select class="mx-auto col-sm-5" name="provincia" form="formEventoMod">
                        <?php
                        foreach ($provincias as $linea) {
                            $seleccionado ="";
                            if($aux->idProvincia==$linea->id){
                                $seleccionado = "selected";
                            }
                            echo "<option value=\"$linea->id\" $seleccionado> ". $linea->nombre ." </option>";
                        }
                    ?>
                    </select>
                </div>

                <div class="form-group row">
                    <label class="col-sm-6" for="sitio">Sitio:</label>
                    <input type="text" class="col-sm-5" class="form-control" name="sitio" value="<?php echo $aux->sitio?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $aux->id?>">


                <div class="form-group row">
                    <input class="mx-auto col-sm-4" type="submit" value="Modificar">
                </div>
                </form>
                <?php
                }?>
            </div>
        </div>
    </div>

</body>

</html>
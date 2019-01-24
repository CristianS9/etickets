<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <?php echo link_tag("css/evento_view.css");?>
    <?php echo link_tag("css/fixedTop.css");?>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>

    <title>Añadir evento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <script src="main.js"></script> -->
</head>

<body>
    <?php $this->load->view('elementos/header'); ?>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
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
    </nav> -->

    <div class="container py-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <?php 
                if (isset($error)) {
                    echo $error;
                }
                echo form_open_multipart("Evento_Controller/add_evento_view", 'id="formEventoAdd"');
                ?>
                    <h1 class="text-center">Crear Evento</h1>
                    
                    <?php echo form_error('ev_nombre','<div class="notificacion">','</div>');?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_nombre">Nombre:</label>
                        <input type="text" class="col-sm-5" class="form-control" name="ev_nombre" required>
                    </div>

                    <?php echo form_error('ev_descripcion','<div class="notificacion">','</div>');?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_descripcion">Descripcion:</label>
                        <input type="text" class="col-sm-5" class="form-control" name="ev_descripcion" required>
                    </div>
                    
                    <?php echo form_error('ev_precio', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_precio">Precio de entrada:</label>
                        <input type="number" class="col-sm-5" class="form-control" name="ev_precio" required>
                    </div>
                    
                    <?php echo form_error('ev_cantidad', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_cantidad">Cantidad de entradas:</label>
                        <input type="number" class="col-sm-5" class="form-control" name="ev_cantidad" required>
                    </div>
                    
                    <?php echo form_error('ev_fecha_inicio', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_fecha_inicio">Fecha inicio:</label>
                        <input type="date" class="col-sm-5" class="form-control" name="ev_fecha_inicio" required>
                    </div>
                    
                    <?php echo form_error('ev_fecha_fin', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_fecha_inicio">Fecha fin:</label>
                        <input type="date" class="col-sm-5" class="form-control" name="ev_fecha_fin" required>
                    </div>

                    <?php echo form_error('ev_provincia', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-5" for="ev_provincia">Provincia:</label>
                        <select class="mx-auto col-sm-5" name="ev_provincia" form="formEventoAdd">
                            <?php 
                            foreach ($provincias as $aux) {
                                echo "<option value=\" $aux->id \"> ". $aux->nombre ." </option>";
                            }
                        ?>
                        </select>
                    </div>
                    
                    <?php echo form_error('ev_sitio', '<div class="notificacion">', '</div>'); ?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_sitio">Sitio:</label>
                        <input type="text" class="col-sm-5" class="form-control" name="ev_sitio" required>
                    </div>
                    
                    <?php echo form_error('ev_imagen', '<div class="notificacion">', '</div>');?>
                    <div class="form-group row">
                        <label class="col-sm-6" for="ev_imagen">Imagen:</label>
                        <input type="file" class="col-sm-5" class="form-control" name="ev_imagen" required>
                    </div>
                    
                    <div class="form-group row">
                        <input class="mx-auto col-sm-4" type="submit" value="Crear">
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
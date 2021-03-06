<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="<?php echo base_url();?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>lib/bootstrap-notify.min.js"></script>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/perfil_view.js"></script>
    <?php echo link_tag("css/perfil_view.css");?>

</head>

<body>
    <!-- <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <div>

        <?php $this->load->view('elementos/header'); ?>
    </div>
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo $this->session->usuario; ?>
                        </div>
                        <div class="profile-usertitle-job">
                            <?php 
                                $rango = $this->session->rango;
                                if ($rango == 1) {
                                    echo "Administrador";
                                } else {
                                    echo "Usuario";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="profile-usermenu">
                        <!-- <ul class="nav">
                            <li class="ventana" elemento="modUser">
                                <a href="#">
                                    
                                    <p>Modificar Datos</p>
                                </a>
                            </li>
                            <li class="ventana" elemento="verCompras">
                                <a href="#">
                                    
                                    <p>Compras</p>
                                </a>
                            </li>
                            <li class="ventana" elemento="logOut">
                                <a href="#">
                                    <i class="glyphicon glyphicon-off"></i>
                                    <p>Salir</p>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="list-group">
                            <li class="list-group-item ventana" elemento="modUser">Modificar datos <i class="fas fa-user-cog"></i></li>
                            <li class="list-group-item ventana" elemento="verCompras">Mis compras <i class="fas fa-shopping-cart"></i></li>
                            <li class="list-group-item ventana" elemento="logOut">Salir <i class="fas fa-sign-out-alt"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <div class="jumbotron modUser" id="modUser">
                        <div class="container modificar">
                                <h2>Modifica tus datos</h2>
                            <?php
                            foreach ($usuario as $aux) { 
                            ?>
                            <div class="linea">
                                <div class="info" elemento="usuario">
                                    Nombre de usuario:
                                </div>
                                <div class="data">
                                    <?php echo $aux->usuario;?>
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <div class="linea">
                                <div class="info" elemento="contrasena">
                                    Contraseña:
                                </div>
                                <div class="data">
                                    &bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <div class="linea">
                                <div class="info" elemento="nombre">
                                    Nombre:
                                </div>
                                <div class="data">
                                    <?php echo $aux->nombre;?>
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <div class="linea">
                                <div class="info" elemento="apellidos">
                                    Apellidos:
                                </div>
                                <div class="data">
                                    <?php echo $aux->apellidos;?>
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <div class="linea">
                                <div class="info" elemento="email">
                                    Correo:
                                </div>
                                <div class="data">
                                    <?php echo $aux->email;?>
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <div class="linea">
                                <div class="info" elemento="telefono">
                                    Teléfono:
                                </div>
                                <div class="data">
                                    <?php echo $aux->telefono;?>
                                </div>
                                <div class="botones">
                                    <span class="fas fa-edit boton editar"></span>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="jumbotron verCompras" id="verCompras">
                        <div class="container-fluis">
                            <h2>Últimas Compras</h2>
                            <div class="compra">
                                <div class="datosCompra">
                                    <div class="tituloCompra">
                                        <span><b>Nº</b></span>
                                        <span><b>Precio total</b></span>
                                        <span><b>Fecha</b></span>
                                    </div>
                                    
                                    <?php 
                                    $cont = 1;
                                    foreach ($ventas as $aux) {
                                        
                                        $timestamp = strtotime($aux->fecha);
                                        echo "<div class=\"venta\">";
                                        echo "<span>".$aux->id."</span>";
                                        echo "<span>".$aux->precio_total."</span>";
                                        echo "<span>".date("d-m-Y", $timestamp)."</span>";
                                        echo "</div>";
                                        $cont++;
                                    }
                                    ?>
                                </div>
                                <div class="datosTickets">
                                    <div class="titulo">
                                        <!-- <span>Id</span> -->
                                        <span><b>Nombre</b></span>
                                        <span><b>Fecha</b></span>
                                        <span><b>Precio</b></span>
                                        <span><b>Categoría</b></span>
                                        <span><b>Código</b></span>
                                        <span><b>Provincia</b></span>
                                        <span><b>Sitio</b></span>
                                    </div>
                                    <?php
                                    foreach ($tickets as $aux) {
                                        echo "<div class=\"ticket\" id=\"venta".$aux->idVenta."\">";
                                        echo "<span>".$aux->nombre."</span>";
                                        echo "<span>".$aux->fecha."</span>";
                                        echo "<span>".$aux->precio."</span>";
                                        echo "<span>".$aux->categoria."</span>";
                                        echo "<span>".$aux->codigo."</span>";
                                        echo "<span>".$aux->provincia."</span>";
                                        echo "<span>".$aux->sitio."</span>";
                                        echo "</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jumbotron logOut" id="logOut">
                        <div class="container">
                            <h2>Seguro que quieres cerrar sesión?</h2>
                            <?php   echo form_open_multipart("Perfil_Controller/logOut");?>
                            <input type="submit" value="Cerrar sesión">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
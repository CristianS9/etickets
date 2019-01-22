<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?php echo $eventTickets[0]->nombre; ?>
    </title>

    <!-- Links de CSS -->
    <?php echo link_tag("lib/bootstrap.min.css"); ?>
    <?php echo link_tag("lib/animate/animate.css"); ?>
    <?php echo link_tag("lib/flex/koyta-flex.css"); ?>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>
    <?php echo link_tag("css/heroic-features.css"); ?>
    <?php echo link_tag("css/home.css"); ?>
    <?php echo link_tag("fonts/nunito.css"); ?>
    <?php echo link_tag("css/event_detail.css"); ?>
    <script>var base_url = '<?php echo base_url() ?>';</script>
    <script>var ev_id = '<?php echo $eventTickets[0]->idEvento ?>';</script>
    <script>var user_name = '<?php echo $userName ?>';</script>

    <!-- Links de JavaScript -->
    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>js/event_detail.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap-notify/bootstrap-notify.min.js"></script>

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Start Bootstrap</a>
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
    <!-- JUMBOTRON -->
    <div class="contenido">
        <h1 class="upcomming">Evento</h1>
        <div class="jumbo">
            <div class="jumbotron">
                <h1 class="display-4">
                    <?php echo $eventTickets[0]->nombre; ?>
                </h1>
                <p class="lead">
                    <?php echo $eventTickets[0]->descripcion; ?>
                </p>
                <hr class="my-4">
                <p>Evento de
                    <?php echo $eventTickets[0]->categoria; ?> en
                    <?php echo $eventTickets[0]->provincia; ?>. Del
                    <?php echo $eventTickets[0]->fechaIni; ?> al
                    <?php echo $eventTickets[0]->fechaFin; ?>. </p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Comprar sections</a>
                </p>
            </div>
        </div>

        <div class="tarjetitas">
            <?php
                    $meses = array("01" => "Enero",
                        "02" => "Febrero",
                        "03" => "Marzo",
                        "04" => "Abril",
                        "05" => "Mayo",
                        "06" => "Junio",
                        "07" => "Julio",
                        "08" => "Agosto",
                        "09" => "Septiembre",
                        "10" => "Octubre",
                        "11" => "Noviebre",
                        "12" => "Diciembre",
                    );
                    foreach ($eventTickets as $ticket) {
                        // Coge la fecha como string chulísimo
                        $textoFecha;
                        if ($ticket->fecha != "" || $ticket->fecha != null) {
                            $fecha = DateTime::createFromFormat("Y-m-d", $ticket->fecha);
                            $nombreMes = $meses[$fecha->format("m")];
                            $textoFecha = $fecha->format("d") . " de " . $nombreMes . " de " . $fecha->format("Y");
                        } else {
                            $textoFecha = "Abono completo";
                        }

                        // Le pone una id diferente a cada uno de los botones de las entradas para saber a cuál le hemos dado click
                        $idCantidad = $ticket->id . "cantidad";
                        $idContador = $ticket->id . "contador";

                        // Declara la variable cantidadDisponible para saber cuántas entradas puede comprar el usuario.
                        $cantidadRestante = $ticket->disponibles;

                        // Comprueba si este ticket está en la cesta de la compra para restar a la cantidad total.
                        if(isset($userCart)){
                            foreach ($userCart as $lineaCarrito) {
                                if ($lineaCarrito->entradasEventoId == $ticket->id) {
                                    $cantidadRestante = $cantidadRestante - $lineaCarrito->cantidad;
                                }
                            }
                        }
                        ?>
            <div class="box">

                <div class="prueba">
                    <section>
                        <widget type="ticket" class="--flex-column">
                            <div class="top --flex-column">
                                <div class="bandname -bold">
                                    <?php echo $ticket->nombre; ?>
                                </div>
                                <div class="tourname">
                                    <?php echo $ticket->categoria; ?>
                                </div>
                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/concert.png" alt="" />
                                <div class="deetz --flex-row-j!sb">
                                    <div class="event --flex-column">
                                        <div class="date">
                                            <?php echo ($textoFecha); ?>
                                        </div>
                                        <div class="location -bold">
                                            <?php echo $ticket->sitio . ", " . $ticket->provincia ?>
                                        </div>
                                    </div>
                                    <div class="price --flex-column">
                                        <div class="label">Precio</div>
                                        <div class="cost -bold">
                                            <?php echo $ticket->precio . "€" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rip"></div>
                            <div class="bottom --flex-row-j!sb">
                            <?php
                            if(isset($this->session->id)){
                              ?>

                                <input type="number" placeholder=" Cant." class="inputCantidad" id="<?php echo $idCantidad ?>">
                                <div class="contadorCantidad <?php echo $idContador ?> " cantidadRestante="<?php echo $cantidadRestante ?>"
                                    cantidadTotal="<?php echo $ticket->cantidadTotal ?>">
                                    <?php echo $cantidadRestante . " / " . $ticket->cantidadTotal ?>
                                </div>
                                <a class="buy addToCartButton" id='<?php echo $ticket->id ?>'>CESTA</a>
                            <?php
                            }else{
                                $url = base_url();
                                echo (" <a href='$url/index.php/login' class='buy addToCartButton' '>INICIAR SESIÓN</a>");
                            }
                            ?>

                            </div>
                        </widget>
                    </section>
                </div>
            </div>
            <?php
                }
                ?>

        </div>
        <div class="commentSection">
        <?php
        if(isset($this->session->usuario)){
            ?>
            <div class="sendCommentSection">
                <h1 class="upcomming">Comentarios</h1>
                <textarea name="pComent" class="textAreaComment" id="pComent" cols="100" rows="10"></textarea><br>
                <button class="sendButton" id="sendButton">Enviar</button>
            </div>
         <?php
        }else{
               ?>
         <div class="sendCommentSection">
                <h1 class="upcomming mb-0 pb-0">Comentarios</h1>

            </div><?php

        }
        ?>

            <?php
                foreach ($eventComments as $comentario){
                    $dateMonth = DateTime::createFromFormat("Y-m-d", $comentario->fecha);
                    $nombreMes = $meses[$fecha->format("m")];
                    $textoFecha = "Comentado el " . $fecha->format("d") . " de " . $nombreMes . " de " . $fecha->format("Y") . ":";
            ?>

            <div class="comentario">
                <div class="usuarioComentario">
                    <h4 id="h4user">
                        <?php echo $comentario->usuario ?>
                    </h4>
                    <?php echo  $textoFecha?>
                </div>
                <div class="comentarioContenido usuarioComentario">
                    <?php echo $comentario->comentario ?>

                </div>


            </div>

            <?php
}
?>

        </div>
    </div>





    <!-- /.container -->

    <!-- Footer -->

</body>

</html>
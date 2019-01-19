<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <?php echo link_tag("lib/bootstrap.min.css"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css">
    <?php echo link_tag("css/heroic-features.css"); ?>


    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://i.koya.io/flex/1.1.0.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:300,400,700'>
    <?php echo link_tag("css/event_detail.css"); ?>
    <?php echo script_tag("lib/jquery-3.3.1.min.js"); ?>
    <?php echo script_tag("js/event_detail.js"); ?>
    <!-- Ajax Live Search -->
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
    <?php echo link_tag("css/home.css"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>

    <!-- Custom styles for this template -->

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
           <!--  <div class="limite"> -->
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
                        $cantidadRestante = $ticket->cantidadTotal;

                        // Comprueba si este ticket está en la cesta de la compra para restar a la cantidad total.
                        foreach ($userCart as $lineaCarrito) {
                            if ($lineaCarrito->entradasEventoId == $ticket->id) {
                                $cantidadRestante = $cantidadRestante - $lineaCarrito->cantidad;
                            }
                        }

                        ?>
                <div class="box">

                    <div class="prueba">
                        <section>
                            <widget type="ticket" class="--flex-column">
                                <div class="top --flex-column">
                                    <div class="bandname -bold"><?php echo $ticket->nombre; ?></div>
                                    <div class="tourname"><?php echo $ticket->categoria; ?></div>
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/concert.png" alt="" />
                                    <div class="deetz --flex-row-j!sb">
                                        <div class="event --flex-column">
                                            <div class="date"><?php echo ($textoFecha); ?></div>
                                            <div class="location -bold"><?php echo $ticket->sitio . ", " . $ticket->provincia ?></div>
                                        </div>
                                        <div class="price --flex-column">
                                            <div class="label">Precio</div>
                                            <div class="cost -bold"><?php echo $ticket->precio . "€" ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="rip"></div>
                                <div class="bottom --flex-row-j!sb">
                                    <!-- <div class="barcode"></div> -->
                                    <input type="number" placeholder=" Cant." class="inputCantidad" id="<?php echo $idCantidad ?>">
                                    <!-- <p>12/33</p> -->
                                    <div class="contadorCantidad <?php echo $idContador ?> " cantidadRestante="<?php echo $cantidadRestante ?>" cantidadTotal="<?php echo $ticket->cantidadTotal ?>"><?php echo $cantidadRestante . " / " . $ticket->cantidadTotal ?></div>
                                    <a class="buy addToCartButton" id='<?php echo $ticket->id ?>'>CESTA</a>
                                </div>
                            </widget>
                        </section>
                    </div>
                </div>
                <?php
}
?>

          <!--   </div>     -->

        </div>












    </div>





    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
<?php
print_r($userCart);
?>
</body>

</html>
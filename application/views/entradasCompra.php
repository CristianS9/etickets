<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Entradas Compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Links de CSS -->
    <?php echo link_tag("lib/bootstrap.min.css"); ?>
    <?php echo link_tag("lib/animate/animate.css"); ?>
    <?php echo link_tag("lib/flex/koyta-flex.css"); ?>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>
    <?php echo link_tag("css/heroic-features.css"); ?>

    <?php echo link_tag("fonts/nunito.css"); ?>
    <?php echo link_tag("css/entradasCompra.css"); ?>
    <?php echo link_tag("css/home_entradasCompra.css"); ?>

    <!-- Links de JavaScript -->
    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>lib/jsBarcode.all.min.js"></script>
    <script src="<?php echo base_url() ?>js/entradasCompra.js"></script>

    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap-notify/bootstrap-notify.min.js"></script>
</head>
<body>
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
                    foreach ($entradas as $ticket) {
                        // Coge la fecha como string chulísimo
                        $textoFecha;
                        if ($ticket->fecha != "" || $ticket->fecha != null) {
                            $fecha = DateTime::createFromFormat("Y-m-d", $ticket->fecha);
                            $nombreMes = $meses[$fecha->format("m")];
                            $textoFecha = $fecha->format("d") . " de " . $nombreMes . " de " . $fecha->format("Y");
                        } else {
                            $textoFecha = "Abono completo";
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
                                <div class="bottom --flex-row-j!sb bajito">
                                    <svg class="barrita" id="<?php echo $ticket->codigo?>"></svg>
                                </div>
                            </widget>
                        </section>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

    </div>

</body>

</html>
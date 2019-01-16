<html>
<head>
    <meta charset="UTF-8">
    <title>CSS Konser Bileti</title>
    <link rel='stylesheet prefetch' href='https://i.koya.io/flex/1.1.0.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:300,400,700'>
    <?php echo link_tag("css/event_detail.css"); ?>
    <?php echo script_tag("lib/jquery-3.3.1.min.js"); ?>

</head>

<entrada>

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

$contadorDia = 1;
foreach ($eventTickets as $ticket) {

    // Coge la fecha como string chulísimo
    $fecha = DateTime::createFromFormat("Y-m-d", $ticket->fecha);
    $nombreMes = $meses[$fecha->format("m")];
    $textoFecha = $fecha->format("d") . " de ". $nombreMes . " de ". $fecha->format("Y");
?>

    <widget type="ticket" class="--flex-column">
        <div class="top --flex-column">
            <div class="bandname -bold"><?php echo $ticket->nombre; ?></div>
            <div class="tourname"><?php echo $ticket->categoria; ?></div>
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/concert.png" alt="" />
            <div class="deetz --flex-row-j!sb">
                <div class="event --flex-column">
                    <div class="date">3rd March 2017</div>
                    <div class="location -bold">Bloomington, Indiana</div>
                </div>
                <div class="price --flex-column">
                    <div class="label">Price</div>
                    <div class="cost -bold">$30</div>
                </div>
            </div>
        </div>
        <div class="rip"></div>
        <div class="bottom --flex-row-j!sb">
            <div class="barcode"></div>
            <a class="buy" href="#">BUY TICKET</a>
        </div>
    </widget>


<?php
    $contadorDia++;
}

?>

</entrada>

</html>
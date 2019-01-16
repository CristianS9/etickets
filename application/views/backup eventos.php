



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


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://i.koya.io/flex/1.1.0.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Nunito:300,400,700'>
    <?php echo link_tag("css/event_detail.css"); ?>
    <?php echo script_tag("lib/jquery-3.3.1.min.js"); ?>
    <!-- Ajax Live Search -->
    <?php echo link_tag("css/home.css"); ?>

<?php echo link_tag("css/home.css"); ?>
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>

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

    <!-- Page Content -->



<!-- JUMBOTRON -->
<div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>


  <div class="item">
    <div class="item-right">
      <h2 class="num">23</h2>
      <p class="day">Feb</p>
      <span class="up-border"></span>
      <span class="down-border"></span>
    </div> <!-- end item-right -->
    
    <div class="item-left">
      <p class="event">Music Event</p>
      <h2 class="title">Live In Sydney</h2>
      
      <div class="sce">
        <div class="icon">
          <i class="fa fa-table"></i>
        </div>
        <p>Monday 15th 2016 <br/> 15:20Pm & 11:00Am</p>
      </div>
      <div class="fix"></div>
      <div class="loc">
        <div class="icon">
          <i class="fa fa-map-marker"></i>
        </div>
        <p>North,Soth, United State , Amre <br/> Party Number 16,20</p>
      </div>
      <div class="fix"></div>
      <button class="tickets">Tickets</button>
    </div> <!-- end item-right -->
  </div> <!-- end item -->

    




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
    $textoFecha = "Hola sinceramente";
    if ($ticket->fecha != "" || $ticket->fecha != null) {
        $fecha = DateTime::createFromFormat("Y-m-d", $ticket->fecha);
        $nombreMes = $meses[$fecha->format("m")];
        $textoFecha = $fecha->format("d") . " de " . $nombreMes . " de " . $fecha->format("Y");

    } else {
        $textoFecha = "Abono completo";
    }

    ?>

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
            <a class="buy" href="#">COMPRAR</a>
        </div>
    </widget>


<?php
$contadorDia++;
}

?>

</entrada>
    
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>

</body>

</html>
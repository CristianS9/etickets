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
    <?php echo link_tag("css/heroic-features.css"); ?>
    <?php echo link_tag("css/home.css"); ?>
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
    <!-- Prueba -->

    <div class="contenido">
        <h1 class="upcomming">Próximos eventos</h1>

        <?php
$meses = array("01" => "Ene",
    "02" => "Feb",
    "03" => "Mar",
    "04" => "Abr",
    "05" => "May",
    "06" => "Jun",
    "07" => "Jul",
    "08" => "Ago",
    "09" => "Sep",
    "10" => "Oct",
    "11" => "Nov",
    "12" => "Dic",
);

foreach ($datos as $linea) {
    // Coger el primer día del evento
    $fechaini = $linea->fechaini;
    $date = DateTime::createFromFormat("Y-m-d", $fechaini);

    // Coger el mes del evento
    $dateMonth = DateTime::createFromFormat("Y-m-d", $linea->fechaini);
    $nombreMes = $meses[$dateMonth->format("m")];

    ?>



        <div class="item">
            <div class="item-right">

                <h2 class="num"><?php echo $date->format("d"); ?></h2>
                <p class="day"><?php echo $nombreMes; ?></p>
                <span class="up-border"></span>
                <span class="down-border"></span>
            </div> <!-- end item-right -->

            <div class="item-left">
                <p class="event"><?php echo ($linea->categoria) ?></p>
                <h2 class="title"><?php echo ($linea->nombre) ?></h2>

                <div class="sce">
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <p><?php
                        if ($linea->fechaini == $linea->fechafin) {
                                echo ("Fecha: ".$linea->fechaini . "<br>"  . "<br>");
                            } else {
                                echo ("Desde: " . $linea->fechaini)?> <br><?php echo ("Hasta: " .$linea->fechafin);
                            }

                        ?></p>
                </div>
                <div class="fix"></div>
                <div class="loc">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <p><?php echo ($linea->sitio)?>, <br/> <?php echo ($linea->provincia)?></p>
                </div>
                <div class="fix"></div>
                <?php
                // Botón de comprar
                echo("<a href='detail/".$linea->id."'><button class='tickets'>Comprar</button></a>");
                ?>
                
            </div> <!-- end item-right -->
        </div> <!-- end item -->
<?php
}
?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>



</body>

</html>
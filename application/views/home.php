<?php
use AjaxLiveSearch\core\Config;

use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

$handler = new Handler();
$handler->getJavascriptAntiBot();

?>
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
    <?php echo link_tag("css/home.css"); ?>

    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <?php echo script_tag("js/home.js"); ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Ajax Live Search -->
        
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
        <?php echo link_tag("lib/css-ajax/ajaxlivesearch.min.css"); ?>
    <script src="<?php echo base_url() ?>lib/css-ajax/ajaxlivesearch.min.js"></script>
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
    


    <div class="contenido">
        <h1 class="upcomming animated fadeIn">Próximos eventos <i id="lupa" class="pl-4 fas fa-search"> </i> <i><input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ..." data-additionalData="hello world!"></i> </h1>

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

 
<script>
      jQuery(".mySearch").ajaxlivesearch({
    loaded_at: <?php echo time(); ?>,
    token: <?php echo "'" . $handler->getToken() . "'"; ?>,
    max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
    /* url:   <?php echo ('"'.base_url() . 'application/third_party/jQueryLiveSearch/core/AjaxProcessor.php'.'"') ?>, */
    url:  "../application/third_party/jQueryLiveSearch/core/AjaxProcessor.php" ,
    onResultClick: function(e, data) {
        // get the index 1 (second column) value
        var selectedOne = jQuery(data.selected).find('td').eq('1').text();
        // set the input value
        jQuery('#ls_query').val(selectedOne);
        // hide the result
        jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
    },
    onResultEnter: function(e, data) {
        // do whatever you want
        // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
    },
    onAjaxComplete: function(e, data) {
    }
});
      </script>


</body>

</html>
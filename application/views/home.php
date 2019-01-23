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
    <title>Home</title>

    <!-- Links CSS -->
    <?php echo link_tag("lib/bootstrap.min.css"); ?>
    <?php echo link_tag("lib/animate/animate.css"); ?>
    <?php echo link_tag("css/heroic-features.css"); ?>
    <?php echo link_tag("css/home.css"); ?>
    <?php echo link_tag("lib/fontAwesome/css/all.css"); ?>
    <?php echo link_tag("lib/css-ajax/ajaxlivesearch.css"); ?>

    <!-- Links JS -->

    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>js/home.js"></script>
    <script src="<?php echo base_url() ?>lib/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>lib/css-ajax/ajaxlivesearch.min.js"></script>

</head>

<body>

<?php $this->load->view('elementos/header'); ?>


    <div class="contenido">
        <h1 class="upcomming animated fadeIn">Próximos eventos <i id="lupa" class="pl-4 fas fa-search"> </i> <i><input
                    type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ..."
                    data-additionalData="hello world!"></i> </h1>

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

                <h2 class="num">
                    <?php echo $date->format("d"); ?>
                </h2>
                <p class="day">
                    <?php echo $nombreMes; ?>
                </p>
                <span class="up-border"></span>
                <span class="down-border"></span>
            </div> <!-- end item-right -->

            <div class="item-left">
                <p class="event">
                    <?php echo ($linea->categoria) ?>
                </p>
                <h2 class="title">
                    <?php echo ($linea->nombre) ?>
                </h2>

                <div class="sce">
                    <div class="icon">
                        <i class="fa fa-table"></i>
                    </div>
                    <p>
                        <?php
                        if ($linea->fechaini == $linea->fechafin) {
                                echo ("Fecha: ".$linea->fechaini . "<br>"  . "<br>");
                            } else {
                                echo ("Desde: " . $linea->fechaini)?>
                        <br>
                        <?php echo ("Hasta: " .$linea->fechafin);
                            }

                        ?>
                    </p>
                </div>
                <div class="fix"></div>
                <div class="loc">
                    <div class="icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <p>
                        <?php echo ($linea->sitio)?>, <br />
                        <?php echo ($linea->provincia)?>
                    </p>
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
<?php $this->load->view('elementos/footer'); ?>

    <script>
        jQuery(".mySearch").ajaxlivesearch({
            loaded_at: <?php echo time(); ?>,
            token: <?php echo "'" . $handler->getToken() . "'"; ?>,
            max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
            /* url:   <?php echo ('"'.base_url() . 'application/third_party/jQueryLiveSearch/core/AjaxProcessor.php'.'"') ?>, */
            url: "../application/third_party/jQueryLiveSearch/core/AjaxProcessor.php",
            onResultClick: function (e, data) {
                // get the index 1 (second column) value
                var selectedOne = jQuery(data.selected).find('td').eq('1').text();
                // set the input value
                jQuery('#ls_query').val(selectedOne);
                // hide the result
                jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
            },
            onResultEnter: function (e, data) {
                var selectedOne = jQuery(data.selected).find('td').eq('1').text();
                window.location.href = "detail/" + selectedOne;
            },
            onResultClick: function (e, data) {
                var selectedOne = jQuery(data.selected).find('td').eq('1').text();
                window.location.href = "detail/" + selectedOne;
            },
            onAjaxComplete: function (e, data) {}
        });
    </script>


</body>

</html>
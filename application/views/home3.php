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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>js/home.js   "></script>
        <?php echo link_tag("lib/css-ajax/ajaxlivesearch.min.css"); ?>
    <script src="<?php echo base_url() ?>lib/css-ajax/ajaxlivesearch.min.js"></script>
</head>
<body>
<h1>Buscar:</h1><br>
<input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ..." data-additionalData="hello world!">
<br><br>
          <table border = "1">
            <tr>
                <td>Id</td>
                <td>Nombre Evento</td>
                <td>Disponibles / Totales</td>
            </tr>
         <?php
foreach ($datos as $linea) {
    echo "<tr>";
    echo "<td>" . $linea->id . "</td>";
    echo "<td>" . $linea->nombre . "</td>";
    echo "<td>" . $linea->entradasDisponibles . " / " . $linea->totalEntradas . "</td>";
    echo "<td> <a href='detail/" . $linea->id . "'>Ver detalle</a></td>";
    echo "<tr>";
}
?>
      </table>
      <script>
      jQuery(".mySearch").ajaxlivesearch({
    loaded_at: <?php echo time(); ?>,
    token: <?php echo "'" . $handler->getToken() . "'"; ?>,
    max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
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
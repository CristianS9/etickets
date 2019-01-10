<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
            <?php echo script_tag("lib/jquery-3.3.1.min.js"); ?>
            <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
            
        <?php echo script_tag("js/shopping_cart.js"); ?>
</head>
<body>
    <h1>Shopping cart</h1>
    <br>
    <br>
    <?php
    foreach ($carrito as $elemento){
        echo("Entrada para evento: <br>");
        echo ($elemento->nombre);
        echo("<br>");
        echo ("Fecha: ".$elemento->fecha);
        echo("<br>");
        echo ("Precio individual: ".$elemento->precioIndividual);
        echo("<br>");
        echo ("Cantidad: ");
        echo("<input class='cantidad' id='$elemento->id' originalValue='$elemento->cantidad' type='number' name='' value='$elemento->cantidad'>");
        echo("<br>");
        echo ("Precio total: ".$elemento->precioTotal);
        echo("<br>");
        echo ("Eliminar: <button class='deleteButton' id='$elemento->id'>Eliminar</button>");
        echo("<br>");
        echo("<br>");
    }
    ?>
</body>
<h1>Total: </h1>

</html>
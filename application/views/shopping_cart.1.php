<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
            <script src="<?php echo base_url() ?>lib/jquery-3.3.1.min.js"></script>
            <script src="<?php echo base_url() ?>lib/angular.min.js"></script>
            <script src="<?php echo base_url() ?>js/shopping_cart.js"></script>
</head>
<body ng-controller="eticketsController">
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
        $precio = "precio".$elemento->id;
        echo ("Precio individual: <precio class='$precio'>$elemento->precioIndividual</precio>");
        echo("<br>");
        echo ("Cantidad: ");
        echo("<input class='cantidad' id='$elemento->id' originalValue='$elemento->cantidad' type='number' name='' value='$elemento->cantidad'>");
        echo("<br>");
        $precioTotal = "precioTotal" . $elemento->id;

        echo ("Precio total: <precio class='$precioTotal precioTotal'>$elemento->precioTotal</precio>");
        echo("<br>");
        echo ("Eliminar: <button class='deleteButton' id='$elemento->id'>Eliminar</button>");
        echo("<br>");
        echo("<br>");
    }
    ?>
</body>

<h1 id="total">Total: </h1>
<br>
<button><a href="cart/end">Tramitar pedido</a></button>

</html>
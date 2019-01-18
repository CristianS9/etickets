

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <?php echo script_tag("lib/jquery-3.3.1.min.js"); ?>
        <?php echo script_tag("js/event_detail.js"); ?>
</head>
<body>
    <h1>Nombre del evento: </h1>
    
    <input type="hidden" value="<?php echo($_SESSION['eventId']) ?>" id="eventId">
    <?php echo ($datos[0]->nombre) ?>
    <br>
    <br>
    <h3>Descripción del evento:</h3>
    <p><?php echo ($datos[0]->descripcion) ?></p>

    <br>
    <br>
    <p>Cantidad de entradas totales: </p>    <?php echo ($datos[0]->cantidadTotal) ?>
    <br>
    <br>
    <p>Entradas disponibles: <?php echo ($datos[0]->disponibles) ?> </p>
    <br>
    
    <br>
    <h2>Días del evento:</h2>
    <br>
        <?php
$contadorDia = 1;
foreach ($eventTickets as $ticket) {

    echo ("Abono: " . $contadorDia . " : " . $ticket->fecha);
    
    echo("<br>");
    $idCantidad = $ticket->id. "cantidad";
    //$ticket->idcantidad
    echo("Cantidad: <input type='number' id='$idCantidad' name='tentacles' min='1' max='10'>");
    echo ("<br>");

    echo(" Comprar-> <button class='addToCartButton' id='$ticket->id' >Añadir al carro</button>");
    if ($ticket->fecha == "") {
        echo ("Abono de todos los días");
    }

    echo ("<br>");
    $contadorDia++;
}
?>
        <br>
        <br>
        <h2>Comentarios:</h2>
        <br>
     
            <textarea name="pComent" id="pComent" cols="100" rows="10"></textarea>
            <br>
            <button id="sendButton">Enviar</button>        
        <br>
        <h3>Comentarios de los usuarios:</h3>
        <br>

        <?php
            $contadorComentarios = 0;
            foreach ($eventComments as $comentario) {
                echo ("<h4>Comentario de " . $comentario->usuario . ": </h4> ");
                echo ($comentario->comentario);
                echo ("<br>");
                echo ("-----------------------------");
                echo ("<br>");
            }
        ?>
</body>
</html>
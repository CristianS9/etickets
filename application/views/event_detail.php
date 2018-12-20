<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Nombre del evento: </h1>
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
            $contadorDia = 0;
            foreach ($eventTickets as $ticket) {

                echo ("Día " . $contadorDia . " : " . $ticket->fecha);
                if ($ticket->fecha == "") {
                    echo ("Abono de todos los días");
                }

                echo ("<br>");
                $contadorDia++;
            }
        ?>
</body>
</html>
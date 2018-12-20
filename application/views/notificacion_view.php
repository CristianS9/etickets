<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php  echo $tipo; ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo link_tag("css/notificacion.css"); ?>
    <?php echo script_tag("js/notificacion.js"); ?>
</head>
<body>
    <?php
         echo $mensaje;

    ?>
</body>
</html>
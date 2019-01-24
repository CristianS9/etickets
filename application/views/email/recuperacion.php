<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h4>El siguiente link te mandara a tu perfil de usuario en el que podras modificar tus datos</h4>
    <p>Este link tiene validez de 1 uso o un tiempo limite de 24 horas.</p>
    <a href="<?php echo base_url();?>index.php/temporal/<?php echo $codigo;?>">Perfil de usuario</a>
</body>
</html>
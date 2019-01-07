<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Buscar:</h1><br>   
<input type="text" class='mySearch' id="ls_query" placeholder="Type to start searching ...">
<br><br>
          <table border = "1"> 
            <tr>
                <td>Id</td>
                <td>Nombre Evento</td>
                <td>Disponibles / Totales</td>
            </tr>
         <?php 
            foreach($datos as $linea) { 
               echo "<tr>"; 
               echo "<td>".$linea->id."</td>"; 
               echo "<td>".$linea->nombre."</td>"; 
               echo "<td>".$linea->entradasDisponibles." / ". $linea->totalEntradas ."</td>";
               echo "<td> <a href='detail/".$linea->id."'>Ver detalle</a></td>";
               echo "<tr>";
            } 
         ?>
      </table> 
      
</body>
</html>
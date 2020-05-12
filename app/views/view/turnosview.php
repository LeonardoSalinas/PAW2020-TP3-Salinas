<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listados de Turnos</title>
</head>

<body>
<header>

	<?php require "navview.php" ?>

</header>	
<table border="1">
        <tbody>
          <tr>
          <th scope="col">Fecha del Turno</th>
            <th scope="col">Hora del turno</th>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Link a la ficha del turno</th>
           
          </tr>
           

            <?php
            //creo un bucle para llenar la tabla
            
            foreach ($lista as $t) {
              foreach($t as $arr){
                $turno = $arr->getTurnos();
               echo  "<tr>";
              // echo print_r($arr);
              
                    $id = $arr->id;
                  
                    echo "  <th>" .$f=$arr->fechaturno."</th>";
                    echo "  <th>" .$arr->horaturno."</th>";
                    echo "  <th>" .$arr->nombre."</th>";
                    echo "  <th>" .$arr->tel."</th>";
                    echo "  <th>" .$arr->email."</th>";
                  
                    echo "  <th> <a href=\"/ficha?i=$id\">Ficha de ".$arr->nombre."</a></th>";
              echo  "</tr>";
              
              }

            }
            ?>
        </tbody>

</table>
</body>

</html>
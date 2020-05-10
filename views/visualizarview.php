<?php
echo "<p>Resumen del Turno: </p>";
        echo "<p>";
          echo "<br>Nombre: ";
          echo $nombre;
          echo "<br>E-mail: ";
          echo $email;
          echo "<br>Teléfono: ";
          echo $tel;
          echo "<br>Edad: ";
          echo $edad;
          echo "<br>Talla de calzado: ";
          echo $calza;
          echo "<br>Altura: ";
          echo $altura;
          echo "<br>Fecha de nacimiento: ";
          echo $nacim;
          echo "<br>Color de pelo: ";
          echo $cpelo;
          echo "<br>Fecha del turno: ";
          echo $fechaturno;
          echo "<br>Horario del turno: ";
          echo $horaturno;
          echo "<br>";
          echo "</p>";
      

          if ($imgSubida["error"] != 4){
            $imgRelName = $validations->saveImg($imgSubida);
            echo "<br>";
            echo "<p>";
            echo "<img src=\"". $imgRelName ."\" alt=\"Imagen subida por el usuario.\">";
            echo "</p>";
          }

         
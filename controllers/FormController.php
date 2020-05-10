<?php

namespace App\controllers;
use App\core\Controller;
use App\core\Validations;
use App\model\ListTurnos;
use App\model\Turno;
use App\core\Persistencia;




class FormController extends Controller
{
    public function save()
    {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
        $edad = $_POST["edad"];
        $calza = $_POST["calza"];
        $altura = $_POST["altura"];
        $nacim = $_POST["nacim"];
        $cpelo = $_POST["cpelo"];
        $fechaturno = $_POST["fechaturno"];
        $horaturno = $_POST["horaturno"];
        $imgSubida = $_FILES["imgSubida"];
      
        $validations = new Validations;
       
               //Si las validaciones funcionan correctamente
      if ($validations->ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgSubida)){
        
        $turno = new Turno($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgRelName);
        $per = new Persistencia();
        $per->guardar($turno);
     
        include "views/visualizarview.php"; 

      } else { //Sino, al menos una de las validaciones fallo
        echo "<h2>Los datos ingresados fueron incorrectos.<h2>";
      }

}    

}

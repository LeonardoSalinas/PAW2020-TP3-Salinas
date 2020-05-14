<?php

namespace App\Controllers;

use App\Core\Controller;
use App\core\Validations;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function __construct()
    {
        $this->model = new Turno();
    }

  
    /**
     * Show all task
     */
    public function index()
    {
        $turnos = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    public function create()
    {
        return view('turno.create');
    }

    public function save()
    {
        $image = $_FILES['imgSubida']['tmp_name'];
        $imgContenido = base64_encode(file_get_contents($image));
        $turno = [
            
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'telefono' => $_POST['tel'],
            'edad' => $_POST['edad'],
            'talla' => $_POST['calza'],
            'altura' => $_POST['altura'],
            'fecha_nacimiento' => $_POST['nacim'],
            'color_pelo' => $_POST['cpelo'],
            'fecha_turno' => $_POST['fechaturno'],
            'hora_turno' => $_POST['horaturno'],
            'imagen' => $imgContenido,
        ];
        $validations = new Validations;
        if ($validations->ValidAll($turno["nombre"], $turno["email"], $turno["telefono"], $turno["edad"], $turno["talla"], $turno["altura"], $turno["fecha_nacimiento"], $turno["color_pelo"], $turno["fecha_turno"], $turno["hora_turno"], $_FILES['imgSubida'])){
        
            //$turno = new Turno($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgRelName);
           
            $this->model->insert($turno);
         
           return redirect('turno');
         
            
    
          } else { //Sino, al menos una de las validaciones fallo
            echo "<h2>Los datos ingresados fueron incorrectos.<h2>";
          }
      

    }

    public function ficha(){
       
        $turno = $this->model->getItem($_GET ["i"]);
       
        return view('ficha', compact('turno'));
    }

}

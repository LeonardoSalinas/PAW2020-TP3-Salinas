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

  /*  public function index()
    {
        include "app/views/view/mainview.php";
    }


    public function turno()
    {
       $p = new Persistencia;
       $lista = $p->leer();
        
        include "views/turnosview.php";
    }



    public function ficha()
    {
        //recupero la variable de la url
        $id = $_GET ["i"];
       $p = new Persistencia;
       $turno = $p->buscar($id);
       // echo print_r( $turno);
        include "views/fichaview.php";
    }

*/
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
            'imagen' => "imagen",
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


}

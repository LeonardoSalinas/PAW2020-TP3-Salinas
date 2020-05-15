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
      //tomo la imagen subida y la convierto en string y base64
        $image = $_FILES['imgSubida']['tmp_name'];
        $imgContenido = base64_encode(file_get_contents($image));
        
        //creo un array para validar el turno
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
            $dato=[
                'nombre' =>  'Los datos ingresados fueron incorrectos.',
                'imagen' => ''

            ];
            //consulto si el error fue por el tamaño de la imagen
            if(!$validations->imgSize($_FILES['imgSubida'])){
                $dato['imagen'] = 'El tamaño de la imagen debe ser menor a 10MB';
            }
            //retorno la vista e crear con las advertencias correspondientes
            return view('turno.create', compact('dato'));
        }
      

    }

    public function ficha(){
       
        $turno = $this->model->getItem($_GET ["i"]);
       
        return view('ficha', compact('turno'));
    }

    public function delete(){
        $turno = $this->model->delete($_GET ["i"]);
        $datos = [
            'dato'=>'El turno fue eliminado.'
        ];
     return $this->index();
       // return view('turnos', compact('datos'));
        //return redirect('turno');
    }

}

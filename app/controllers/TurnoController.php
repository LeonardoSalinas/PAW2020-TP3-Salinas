<?php

namespace App\Controllers;

use App\Core\Controller;
use App\core\Validations;
use App\Models\Turno;

class TurnoController extends Controller
{
    public $datos;
    public function __construct()
    {
        $this->model = new Turno();
        $datos = [
            'titulo'=>'',
            'dato'=>'',
           
            'imagen' => ''

        ];
    }

  
    /**
     * Show all task
     */
    public function index()
    { $datos = $this->datos;
        $turnos = $this->model->get();

        return view('turnos', compact('turnos','datos'));
    }

    public function create()
    {$this->datos['titulo']="Crear turno";
        $datos = $this->datos;
        return view('turno.form',compact('datos'));
    }

    public function save()
    {
        $this->model->load();
        $turno = $this->model->getTurno();
        
        //valida todos los datos
        $validations = new Validations;
        if ($validations->ValidAll($turno["nombre"], $turno["email"], $turno["telefono"], $turno["edad"], $turno["talla"], $turno["altura"], $turno["fecha_nacimiento"], $turno["color_pelo"], $turno["fecha_turno"], $turno["hora_turno"], $_FILES['imgSubida'])){
        
           //comparo el id para ver si es un insert o un update
            if($turno["id"]==""){
            
             $turno =$this->model->insert();
          
            $logger = \App\Core\App::get('logger');
            $logger->info('INSERT:TURNOS:'.$turno['id']);
           
            return view('ficha',compact('turno'));
           }else {
               
             $this->model->update("id");
             $logger = \App\Core\App::get('logger');
             $logger->info('UPDATE:TURNOS: '.$turno['id'].' '.$turno['nombre'].' '.$turno['email'].' '.$turno['telefono'].' '.$turno['edad'].' '.$turno['talla'].' '.$turno['altura'].' '.$turno['fecha_nacimiento'].' '.$turno['color_pelo'].' '.$turno['fecha_turno'].' '.$turno['hora_turno']);
       
           }
           
         
           return redirect('turno');
         
            
    
        } else { //Sino, al menos una de las validaciones fallo
            $this->datos=[
                'dato' =>  'Los datos ingresados fueron incorrectos.',
                'imagen' => ''

            ];
            //consulto si el error fue por el tamaño de la imagen
            if(!$validations->imgSize($_FILES['imgSubida'])){
                $this->datos['imagen'] = 'El tamaño de la imagen debe ser menor a 10MB';
            }

            //retorno la vista e crear con las advertencias correspondientes
            $datos = $this->datos;
            return view('turno.form', compact('turno','datos'));
        }
      

    }

    public function ficha(){
       
        $turno = $this->model->getItem($_GET ["i"]);
       
        return view('ficha', compact('turno'));
    }
  //Elimina el turno y actualiza la lista enviando un mensaje
    public function delete(){
       $turno= $this->model->getItem($_GET ["i"]);
     
        $this->model->delete($turno['id']);

        $this->datos['dato'] = 'El turno fue eliminado.';
        $logger = \App\Core\App::get('logger');
        $logger->info('DELETE:TURNOS: '.$turno['id'].' '.$turno['nombre'].' '.$turno['email'].' '.$turno['telefono'].' '.$turno['edad'].' '.$turno['talla'].' '.$turno['altura'].' '.$turno['fecha_nacimiento'].' '.$turno['color_pelo'].' '.$turno['fecha_turno'].' '.$turno['hora_turno']);
        return $this->index();
     }
//Modifica el turno y actualiza la lista enviando un mensaje
     public function update(){
        
        $turno = $this->model->getItem($_GET ["i"]);
         $this->datos['titulo']="Modificar turno";
        $datos = $this->datos;
        return view('turno.form', compact('turno','datos'));
     }
}

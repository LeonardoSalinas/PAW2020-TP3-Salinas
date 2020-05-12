<?php

namespace App\Controllers;

use App\Core\Controller;
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
        $task = [
            'description' => $_POST['description'],
            'completed' => (isset($_POST['completed'])) ? 1 : 0
        ];
        $this->model->insert($task);
        return redirect('tasks');
    }


}

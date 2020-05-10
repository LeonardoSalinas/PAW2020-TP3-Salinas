<?php

namespace App\controllers;

use App\core\Controller;
use App\model\ListTurnos;
use App\model\Turno;
use App\core\Persistencia;

class TurnoController extends Controller  
{
    public function index()
    {
        include "views/mainview.php";
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
}

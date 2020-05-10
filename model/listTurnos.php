<?php
namespace App\model;
use App\model\Turno;

class ListTurnos{
    
    public $arrayturnos= [];


    public function addTurnos($turno){
        $this->arrayturnos[] = $turno;
    }
    public function create_turno($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgRelName){
        $turno = new Turno($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgRelName);
        $this->addTurnos($turno);
        return $turno;
    }
    
}
?>
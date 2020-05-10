<?php
namespace App\model;


class Turno{

    public $id="";
   public $nombre ="";
   public $email ="";
   public $tel ="";
   public $edad ="";
   public $calza ="";
   public $altura ="";
   public $nacim ="";
   public $cpelo ="";
   public $fechaturno ="";
   public $horaturno ="";
   public $imgSubida ="";


    public function __construct($nom, $email, $tel, $edad, $calza, $alt, $nac, $cpelo, $fechat, $horat, $imgSubida){

        $this->id =strtotime( $fechat.$horat);
        $this->nombre=$nom;
        $this->email=$email;
        $this->tel=$tel;
        $this->edad=$edad;
        $this->calza=$calza;
        $this->altura=$alt;
        $this->nacim=$nac;
        $this->cpelo=$cpelo;
        $this->fechaturno=$fechat;
        $this->horaturno=$horat;
        $this->imgSubida=$imgSubida;
        
    }
    public function getTurnos(){
        $turno = array(
            $this->nombre ,
            $this->email ,
            $this->tel ,
            $this->edad ,
            $this->calza ,
            $this->altura ,
            $this->nacim ,
            $this->cpelo ,
            $this->fechaturno ,
            $this->horaturno ,
            $this->imgSubida ,
        );

        return $turno;
    }
    public function getNombre(){

        return  $this->nombre;
    }
}


?>  
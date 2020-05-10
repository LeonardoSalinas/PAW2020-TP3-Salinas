<?php
namespace App\core;
use App\model\Turno;

use App\model\ListTurnos;
//require "../model/turnoModel.php";
//require "../model/listTurnos.php";

class Persistencia{
    public function __construct(){
        
    }
    
    public function guardar($turno){   
    //OBTENGO LA LISTA DE TURNOS ALMACENADA EN EL ARCHIVO
   
    $l = new ListTurnos;
    
    if (!file_exists('persistencia')) { 
            
            $l->addTurnos($turno);
        
            $s = serialize($l);
            // almacenar $s en algún lado 
            $fp = fopen("persistencia", "a+");
            fwrite($fp, $s);
            
            fclose($fp);

        }else{
            //agrego el turno nuevo recuperando los anteriores en el archivo
           
            $s = implode("", @file("persistencia"));
            $a = unserialize($s);
            foreach ($a as $t) {
                foreach($t as $arr){
                    
                    $l->addTurnos($arr);
                   
                }
            }
            $l->addTurnos($turno);
            $sl = serialize($l);
            $fp = fopen("persistencia", "w");
            fwrite($fp,$sl);

            fclose($fp);


         
        }

        
    }    
       
    public function leer(){
        $l = new ListTurnos;
        $s = implode("", @file("persistencia"));
        $a = unserialize($s);
        foreach ($a as $t) {
            foreach($t as $arr){

                $l->addTurnos($arr);
            }
        }
        // ahora utilizar la función show_one() del objeto $a.  
        return $l;

       
    }


    public function buscar($id){
        $li =$this->leer();
        foreach ($li as $t) {
            foreach($t as $arr){
                if($arr->id == $id){
                    return $arr;
            }
            }
        }
    }


   
}




?>
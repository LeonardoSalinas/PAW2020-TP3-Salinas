<?php

namespace App\Models;

use App\Core\Model;

class Turno extends Model
{
    protected $table = 'turno';
    public $turno ;
  
    

    public function get()
    {
        return $this->db->selectAll($this->table);
    }
    public function getItem($item){
        return $this->db->selectItem($this->table,$item);
    }
    public function insert()
    {
       $this->turno['id']= $this->db->insert($this->table, $this->getTurno());
       return $this->getTurno();
    }

    public function delete($item){
        $this->db->delete($this->table, $item);

    }

    public function update($item){
       
        $this->db->update($this->table,$this->getTurno(), $item);

    }
    public function getTurno(){
      
        return $this->turno;
    }
    public function load(){
        //tomo la imagen subida y la convierto en string y base64
     
        $image = $_FILES['imgSubida']['tmp_name'];
        //consulto si existe el archivo
        if($image!="") {
            $imgContenido = base64_encode(file_get_contents($image));
        }else{
            $imgContenido="";
        }
        //creo un array para validar el turno
        $this->turno = [
            'id'=> $_GET["i"],//se usa el id para diferenciar entre update o insert
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
       
    }
}

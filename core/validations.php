<?php
namespace App\core;

class Validations{

private  $mesnaje;


public function __construct(){
	

}
public function getMensaje(){
	return $this->mesnaje;
}
//Validar nombre
public function ValidNombre($nombre){
	if(!isset($nombre)|| ($nombre =="")){
		$this->mesnaje = "Nombre";
		return false;
	}
	return isset($nombre);
}


//Validar email
public function ValidEmail($email){
	$valid = false;
	if (isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$valid = true;
	}else {
		$this->mesnaje = "Email";
	}
	return $valid;
}


//Validar tel
public function ValidTel($tel){
	if(!isset($tel)|| ($tel =="")){
		$this->mesnaje = "Telefono";
		return false;
	}
	return isset($tel);
}


//Validar edad
public function ValidEdad($edad){
	$valid = false;
	if (intval($edad) >= 0 && intval($edad) <= 110){
		$valid = true;
	}
	return $valid;
}


//Validar calza (talla clazado)
public function ValidCalza($calza){
	$valid = false;
	if (empty($calza)){
		$valid = true;
	} elseif (intval($calza) >= 20 && intval($calza) <= 45){
		$valid = true;
	}
	return $valid;
}


//Validar altura
public function ValidAltura($altura){
	$valid = false;
	if (empty($altura)){
		$valid = true;
	} elseif (intval($altura) >= 0 && intval($altura) <= 350){
		$valid = true; 
	}
  	return $valid;
}


//Validar nacim (fecha nacimiento)
public function ValidNacim($nacim){

	if (isset($nacim) && $nacim < date("Y-m-d")&& ($nacim!="") ){
		return true;
	
	} else {
	
		$this->mesnaje = "Fecha Nacimiento";	
		
		return false;
	}
}


//Validar cpelo (color pelo)
public function ValidCPelo($cpelo){
	$cpeloLista = array ("negro", "rubio", "pelirrojo", "blanco", "marron","");
	if (in_array($cpelo, $cpeloLista)){
		return true;
	} else {
		return false;
	}
}


//Validar fechaturno
public function ValidFechaturno($fechaturno){
	if (isset($fechaturno) && $fechaturno >= date("Y-m-d")&& ($fechaturno	!="") ){
		return true;
	} else {
		$this->mesnaje = "Fecha Turno";	
		
		return false;
	}
}


//Validar horaturno
public function ValidHoraturno($horaturno){
	$valid = false;
	if (isset($horaturno) && ($horaturno !="")){
		$arrayDate = explode(":", $horaturno);
	  	$minutes = $arrayDate[1]; 
	  	if (intval($minutes) == 00 || intval($minutes) == 15 || intval($minutes) == 30 || intval($minutes) == 45) {
	  		$valid = true;
  		} else $this->mesnaje = "Hora Turno";
	 }else{
		$this->mesnaje = "Hora Turno";	
		
	 }
	 
 	return $valid;
}

//Validar imgSubida
public function ValidImg($imgSubida){
	$valid = false;
	if ($imgSubida["error"] == 4){ 	//No es obligatorio subir una img. En caso de error #4...
		$valid = true;				//... es que no se ha subido una img; se debe continuar.
	} else {
		$imgExt = $imgSubida['type'];
		$validExt = ["image/jpeg", "image/png"];
  		if (in_array($imgExt, $validExt)) {
  			$valid = true;
  		}
  	}
  	return $valid;
}
//funcion que restringe el tamaño del archivo
public function imgSize($img){
	if($img['size']<80000000){
		return true;
	}else{
		return false;
	}

}

//Valido todos los parametros al mismo tiempo en una sola funcion
public function ValidAll($nombre, $email, $tel, $edad, $calza, $altura, $nacim, $cpelo, $fechaturno, $horaturno, $imgSubida) {
	if ($this->ValidNombre($nombre) && $this->ValidEmail($email) && $this->ValidTel($tel) && $this->ValidEdad($edad) && $this->ValidCalza($calza) && $this->ValidAltura($altura) && $this->ValidNacim($nacim) && $this->ValidCPelo($cpelo) && $this->ValidFechaturno($fechaturno) && $this->ValidHoraturno($horaturno) && $this->ValidImg($imgSubida)&& $this->imgSize($imgSubida)) {

		return true;
	} else {
		return false;
	}
}

//Almacena una img valida y devuelve el path relativo de la misma
//En el archivo README.md hay una explicacion con mayor detalle de lo que contiene cada variable
public function saveImg($imgSubida){
	 $imgFolderPath = getcwd(). '\\' . "images" . '\\'; //Path de la carpeta donde se guardan las imgs
	 $imgName = basename($imgSubida['name']); 			//nombreImg.extension
	 $imgExt = substr($imgName,strrpos($imgName,'.')+0);//Extension de la img con el punto
	 $theTime = time();
	 $hashedName = hash("sha256" , $imgSubida['tmp_name'] . $theTime . rand(1,1000000)) . $imgExt;
	 $imgFileName = $imgFolderPath . $hashedName;//Path completo a la img (con nombre hasheado)
	 $imgRelName = "";

	 if (move_uploaded_file($imgSubida['tmp_name'], $imgFileName)) {
	 	$imgRelName = "images" . '\\' . $hashedName;//path relativo a la img
	 }

	 return ($imgRelName);

	}

}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fomulario de Turnos</title>
</head>

<body>
<header>

	<?php require "navview.php" ?>

</header>

    <h1>Formulario:</h1>
	<form enctype="multipart/form-data" action="/form" method="POST">
	    <br> *Nombre: <input type="text" name="nombre" required>
	    <br> *E-mail: <input type="email" name="email" required>
	    <br> *Teléfono: <input type="tel" name="tel" required>
	    <br> Edad: <input type="number" name="edad" min="1" max="100">
	    <br>Talla de calzado: <input type="number" name="calza" step ="1" min="20" max="45">
	    <br>Altura: <input type="range" min="0" max="350" step="1" name="altura" value="0">
	    <br>*Fecha de nacimiento: <input type="date" name="nacim" required>
	    <br>Color de pelo: <input list="colorpelo" name="cpelo">
	    <datalist id="colorpelo">
	            <option value="negro">
	            <option value="rubio">
	            <option value="marron">
	            <option value="pelirrojo">
	            <option value="blanco">
	    </datalist>
	    <br>*Fecha del Turno: <input type="date" name="fechaturno" required>
	    <br>Horario del turno: <input type="time" name="horaturno" min="08:00:00" max="17:00:00" value="08:00:00" step="900"><br>

		<!-- Subir imagen -->
	    <diagnostico-img>
	        <h3>Subir imagen</h3>
			<input type="file" accept="image/jpeg, image/png" name="imgSubida"><br>
    	</diagnostico-img>

	    <input type="submit" value="Enviar">
	    <input type="reset" value="Limpiar">

    </form>
  <!-- Subir imagen   <form enctype="multipart/form-data" action="/form" method="POST">
	    <br> *Nombre: <input type="text" name="nombre"  >
	    <br> *E-mail: <input type="email" name="email"  >
	    <br> *Teléfono: <input type="tel" name="tel"  >
	    <br> Edad: <input type="number" name="edad" min="1" max="100">
	    <br>Talla de calzado: <input type="number" name="calza" step ="1" min="20" max="45">
	    <br>Altura: <input type="range" min="0" max="350" step="1" name="altura" value="0">
	    <br>*Fecha de nacimiento: <input type="date" name="nacim"  >
	    <br>Color de pelo: <input list="colorpelo" name="cpelo">
	    <datalist id="colorpelo">
	            <option value="negro">
	            <option value="rubio">
	            <option value="marron">
	            <option value="pelirrojo">
	            <option value="blanco">
	    </datalist>
	    <br>*Fecha del Turno: <input type="date" name="fechaturno"  >
	    <br>Horario del turno: <input type="time" name="horaturno" min="08:00:00" max="17:00:00" value="08:00:00" step="900"><br>

	    <diagnostico-img>
	        <h3>Subir imagen</h3>
			<input type="file" accept="image/jpeg, image/png" name="imgSubida"><br>
    	</diagnostico-img>

	    <input type="submit" value="Enviar">
	    <input type="reset" value="Limpiar">

    </form>-->	

    <p>Los campos marcados con * son obligatorios.</p>
	
</body>

</html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listados de Turnos</title>
</head>

<body>
    <header>

        <?php require "navview.php" ?>
        <h1>Ficha del paciente  <?php echo $turno->nombre   ;?> </h1>
    </header>	
   
    <main>
        <section class="imagen">
            <img class="img" src= ../<?php echo $turno->imgSubida;?>>
        </section>

        <section class="DatosTurno">
            <h2> Datos del turno </h2>
           
            <label for="fecha" ><b>Fecha: </b> <?php echo $turno->fechaturno;?> </label>
            <br>
            <label for="hora" ><b>Hora: </b> <?php echo $turno->horaturno;?> </label>

        </section>

        <section class="DatosPaciente">
            <h2> datos paciente</h2>
            <label for="nombre" ><b>Nombre: </b> <?php echo $turno->nombre;?> </label>
            <br>
            <label for="email" ><b>Email: </b> <?php echo $turno->email;?> </label>
            <br>
            <label for="tel" ><b>Telefono: </b> <?php echo $turno->tel;?> </label>
            <br>
            <label for="edad" ><b>Edad: </b> <?php echo $turno->edad;?> </label>
            <br>
            <label for="calza" ><b>Talle calzado: </b> <?php echo $turno->calza;?> </label>
            <br>
            <label for="altura" ><b>Altura: </b> <?php echo $turno->altura;?> </label>
            <br>
            <label for="nacim" ><b>Fecha nacimiento: </b> <?php echo $turno->nacim;?> </label>
            <br>
            <label for="cpelo" ><b>Color pelo: </b> <?php echo $turno->cpelo;?> </label>

        </section>

    </main>

    <aside class="volver">
        <br>
        <button type="button" onclick="location.href='/turno'">Volver</button>
   
      </aside>
</body>

</html>
